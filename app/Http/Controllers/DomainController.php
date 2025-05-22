<?php

namespace App\Http\Controllers;

use App\Services\RunCloud\RunCloud;
use App\Models\Store;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DomainController extends Controller
{
    public function index()
    {
        $user = \Auth::user()->current_store;
        $store = Store::find($user);

        return view('domains.index', compact('store'));
    }

    public function add(Request $request)
    {  
        // $request->validate([
        //     'domain' => 'required|url'
        // ]);

        $user = \Auth::user()->current_store;
        $runcloud = new RunCloud;
        $domain = $request->domain;
        $response = [];

        $domain = preg_replace('/^https?:\/\/(www\.)?/', '', $domain);

        try
        {
            $add_domain = json_decode($runcloud->addDomain($domain) ?: '{}');
            
            //if (empty($add_domain?->id)) throw new AddDomainException;

            $new_domain = Store::find($user);
            $new_domain->domains = $domain;
            $new_domain->enable_domain = 'on';
            $new_domain->save();

            $response = ["status" => "success", "message" => 'Domínio adicionado com sucesso.', "domain" => $domain];
        }

        catch(Error)
        {
            $response = ["status" => "error", "message" => "Não foi possível adicionar este domínio.", "domain" => $domain];
        }

        finally
        {
            return response()->json($response);
        }
    }

    public function destroy($domain){
        $domain = Store::find($domain);
        $domain->domains = '';
        $domain->enable_domain = 'off';
        $domain->save();

        return redirect()->back()->with('success', __('Domain deleted successfully.'));
    }
}
