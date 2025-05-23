<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Utility;
use App\Models\User;
use App\Models\Plan;
use App\Providers\RouteServiceProvider;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function __construct()
    {
        if(!file_exists(storage_path() . "/installed"))
        {
            header('location:install');
            die;
        }
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->delete_status == 1)
        {
            auth()->logout();
        }

        return redirect('/check');
    }

    public function store(LoginRequest $request)
    {
        if(env('RECAPTCHA_MODULE') == 'yes')
        {
            $validation['g-recaptcha-response'] = 'required|captcha';
        }else
        {
            $validation=[];
        }
        $this->validate($request, $validation);

        $request->authenticate();
        $request->session()->regenerate();
        $user = Auth::user();

        if($user->delete_status == 1)
        {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        $user = Auth::user();
        if($user->type == 'Owner')
        {
            $plan = Plan::find($user->plan);
            if($plan)
            {
                if($plan->duration != 'Unlimited')
                {
                    $datetime1 = $user->plan_expire_date;
                    $datetime2 = date('Y-m-d');
                    if(!empty($datetime1) && $datetime1 < $datetime2)
                    {
                        $user->assignPlan(1);
                        return redirect()->intended(RouteServiceProvider::HOME)->with('error', __('Your Plan is expired.'));
                    }
                }

            }
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function showLoginForm($lang = '')
    {
        $lang = session()->get('lang');
        \App::setLocale(isset($lang) ? $lang : 'pt');

        $url = $_SERVER['HTTP_HOST'];
        $url = explode('.', $url);

        if ($url[1] == 'app') {
            header('location:https://painel.rocketleads.com.br/user/platform/2/login');
            die;
        } else {
            return view('auth.login', compact('lang'));
        }
    }

    // public function showLinkRequestForm($lang = '')
    // {
    //     if(empty($lang))
    //     {
    //         $lang = Utility::getValByName('default_language');
    //     }

    //     \App::setLocale($lang);
    //    return view('auth.passwords.email', compact('lang'));
    // }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

