<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Utility;
use File;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\Null_;
use App\Services\RocketMember\ImageService;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = Crypt::decrypt($id);
        return view('headers.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), 
            ['title' => 'required|max:120',]
        );  

        $header = new Header();
        $header->store_id = \Auth::user()->current_store;
        $header->course = $id;
        $header->title = $request->title;
        $header->description = $request->description;
        $header->hide = isset($request->hide_module) ? 'on' : 'off';

        if(!empty($request->preview_image))
        {
            $fileNameToStores = ImageService::handleImageUpload($request->preview_image, 700, 1200, 'uploads/modules/preview_image/');
            $header->thumbnail = $fileNameToStores;
        }
            
        $header->save();
        return redirect()->back()->with('success', __('Module created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$course_id)
    {

        $header = Header::find($id);
        return view('headers.edit',compact('header','course_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$course_id)
    {
        $header = Header::find($id);
        $header->title = $request->title;
        $header->description = $request->description;
        $header->hide = isset($request->hide_module) ? 'on' : 'off';

        if(!empty($request->thumbnail))
        {
            $fileNameToStores = ImageService::handleImageUpload($request->thumbnail, 700, 1200, 'uploads/modules/preview_image/');
            $header->thumbnail = $fileNameToStores;
        }

        $header->save();
        return redirect()->back()->with('success', __('Module updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$course_id)
    {
        $header = Header::find($id);
        $header->delete();
        return redirect()->back()->with('success', __('Module deleted successfully!'));
    }

}
