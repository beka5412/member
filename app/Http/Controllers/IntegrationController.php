<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\IntegrationPlatform;
use App\Models\IntegrationProduct;
use App\Models\Integration;
use App\Models\User;
use App\Models\UserStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class IntegrationController extends Controller
{
    public function __construct()
    {
        \App::setLocale(\Auth::user()->lang);
    }

    public function index() {
        $integrationPlatforms = IntegrationPlatform::all();
        return view('integrations.index', compact('integrationPlatforms'));
    }

    public function create($platform_id) {
        $user = Auth::user()->current_store;
        $courses = Course::where('store_id', $user)->get();
        $platform = IntegrationPlatform::where('id', $platform_id)->first();
        $hash_url = substr(hash('sha256', random_bytes(10)), 0, 10);

        return view('integrations.create', compact('courses', 'platform_id', 'platform', 'hash_url'));
    }

    public function edit($slug, $integrationId ) {
        $user = Auth::user()->current_store;
        $integrationPlatforms = IntegrationPlatform::where('slug', $slug)->first();
        $integration = Integration::where('id', $integrationId)->where('user_id', $user)->first();
        $integrationProducts = IntegrationProduct::where('integration_id', $integrationId)->get();

        return 'teste';

        //return view('integrations.edit', compact('integrationPlatforms', 'integration', 'integrationProducts'));
    }

    public function createProduct($id){
        $user = Auth::user()->current_store;
        $integration = Integration::where('id', $id)->where('user_id', $user)->first();
        $integrationPlatforms = IntegrationPlatform::where('id', $integration->integration_platform_id)->first();
        $courses = Course::where('store_id', $user)->get();

        return view('integrations.product.create', compact('id', 'integrationPlatforms', 'courses'));
    }

    public function editProduct($id){
        $user = Auth::user()->current_store;
        $integrationProducts = IntegrationProduct::where('id', $id)->first();
        $integration = Integration::where('id', $integrationProducts->integration_id)->where('user_id', $user)->first();
        $integrationPlatforms = IntegrationPlatform::where('id', $integration->integration_platform_id)->first();
        $courses = Course::where('store_id', $user)->get();
        $products = IntegrationProduct::where('integration_id', $integrationProducts->integration_id)->get();

        return view('integrations.product.edit', compact('integrationPlatforms', 'integrationProducts', 'courses', 'id', 'products', 'integration'));
    }

    public function platform_integrations($slug) {
        $user = Auth::user()->current_store;
        $integrationPlatforms = IntegrationPlatform::where('slug', $slug)->first();
        $integrations = Integration::where('user_id', $user)->where('integration_platform_id', $integrationPlatforms->id)->get();

        return view('integrations.platform_integrations', compact('integrationPlatforms', 'integrations'));
    }

    public function store(Request $request, $id) {
        $user = Auth::user()->current_store;

        $integration = new Integration;
        $integrationPlatforms = IntegrationPlatform::where('id', $id)->first();
        $integration->name = $request->name;
        $integration->user_id = $user;
        $integration->keys = Crypt::encryptString($request->token);
        $integration->integration_platform_id = $id;
        $integration->hash = $request->url;
        $integration->save();

        return redirect()->route('integrations.edit', array($integrationPlatforms->slug, $integration->id))->with('success', __('integration created with success!'));
    }

    public function storeProduct(Request $request, $id) {
        $user = Auth::user()->current_store;
        $integration = Integration::where('id', $id)->where('user_id', $user)->first();
        $integrationPlatforms = IntegrationPlatform::where('id', $integration->integration_platform_id)->first();
        $courses = $request->courses;

        if(in_array('all', $request->courses)){
            $courses = "all";
        }

        $product = new IntegrationProduct;
        $product->integration_id = $id;
        $product->name = $request->name;
        $product->platform_product_id = $request->productId;
        $product->courses = $courses;
        $product->save();

        return redirect()->route('integrations.edit', array($integrationPlatforms->slug, $id))->with('success', __('integration updated with success!'));
    }

    public function updateProduct(Request $request, $id){
        $user = Auth::user()->current_store;

        $courses = $request->courses;

        if(in_array('all', $request->courses)){
            $courses = "all";
        }

        $product = IntegrationProduct::find($id);
        $product->name = $request->name;
        $product->platform_product_id = $request->productId;
        $product->courses = $courses;
        $product->update();

        return redirect()->back()->with('success', __('Integration updated successfully!'));
    }

    public function destroyProduct($id) {
        IntegrationProduct::where('id', $id)->delete();

        return redirect()->back()->with('success', __('Product deleted successfully!'));
    }

    public function destroyIntegration($id) {
        Integration::where('id', $id)->delete();
        IntegrationProduct::where('integration_id', $id)->delete();

        return redirect()->back()->with('success', __('Product deleted successfully!'));
    }
}
