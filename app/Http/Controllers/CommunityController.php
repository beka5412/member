<?php

namespace App\Http\Controllers;
use App\Models\CommunityCategories;
use App\Models\CommunitySpaces;
use App\Models\CommunityPosts;
use App\Models\Utility;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommunityController extends Controller
{
    public function __construct()
    {
        \App::setLocale(\Auth::user()->lang);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function edit()
    {
        
    }

    public function showCategories()
    {
        $user = \Auth::user()->current_store;
        $settings = Utility::settings();
        $categories = CommunityCategories::where('store_id', $user)->get();

        return view('community.categories.index', compact('settings', 'categories'));
    }

    public function showSpaces()
    {
        $user = \Auth::user()->current_store;
        $settings = Utility::settings();
        $spaces = CommunitySpaces::where('store_id', $user)->get();

        return view('community.spaces.index', compact('settings', 'spaces'));
    }

    public function createCategory()
    {
        $user = \Auth::user()->current_store;
        $settings = Utility::settings();
        $categories = CommunityCategories::where('store_id', $user)->get();

        return view('community.categories.create', compact('settings', 'categories'));
    }

    public function createSpaces()
    {
        $user = \Auth::user()->current_store;
        $settings = Utility::settings();
        $spaces = CommunitySpaces::where('store_id', $user)->get();
        $categories = CommunityCategories::where('store_id', $user)->get();

        return view('community.spaces.create', compact('settings', 'spaces', 'categories'));
    }

    public function storeCategory(Request $request){
        $store_id = \Auth::user()->current_store;

        $request->validate([
            'name' => 'required',
        ]);

        $community = new CommunityCategories();
        $community->store_id = $store_id;
        $community->name = $request->name;
        $community->slug = Str::slug($request->name, '-');
        $community->save();

        return redirect()->route('community.categories')->with('success', 'Community Category created successfully.');
    }

    public function storeSpace(Request $request){
        $store_id = \Auth::user()->current_store;

        $request->validate([
            'title' => 'required',
        ]);

        $community = new CommunitySpaces();
        $community->store_id = $store_id;
        $community->category_id = $request->category_id;
        $community->title = $request->title;
        $community->icon = $request->icon ?? 'fa-icon';
        $community->slug = Str::slug($request->title, '-');
        $community->save();

        return redirect()->route('community.spaces')->with('success', 'Community Space created successfully.');
    }
}
