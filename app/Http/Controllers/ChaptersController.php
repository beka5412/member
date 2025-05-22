<?php

namespace App\Http\Controllers;

use App\Models\ChapterFiles;
use App\Models\ChapterLinks;
use App\Models\Chapters;
use App\Models\Header;
use App\Models\Utility;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChaptersController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id,$header_id)
    {
        $chapter_type = Utility::chapter_type();
        return view('chapters.create',compact('header_id','chapter_type','course_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$course_id,$header_id)
    {
        $chapters = new Chapters();
        $chapters->header_id = $header_id;
        $chapters->name = $request->name;
        $chapters->course_id = Crypt::decrypt($course_id);
        $chapters->chapter_description = $request->chapter_description;
        $chapters->type = $request->type;

        if($request->enable_time == 'on'){
            $chapters->time_type = $request->time_type;
            $chapters->time_number = $request->time_number;
        }

        if(!empty($request->thumbnail) && count($request->thumbnail) > 0)
        {
            foreach($request->thumbnail as $thumb) {
                $filenameWithExt  = $thumb->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::rand_string(16, "lower");
                $extension = $thumb->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir = storage_path('uploads/chapter/thumbnail/');
                $image_path = $dir . $chapters->thumbnail;
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $chapters->thumbnail = $fileNameToStores;
                $path = $thumb->storeAs('uploads/chapter/thumbnail/', $fileNameToStores);
            }
        }

        $file_name = [];
        if(!empty($request->multiple_files) && count($request->multiple_files) > 0)
        {
            $validator = \Validator::make($request->all(), [
                'multiple_files' => 'max:40000',
            ]);
            if($validator->fails())
            {
                $msg = $validator->getMessageBag()->first();
                return $msg;
            }
            foreach($request->multiple_files as $file)
            {
                $filenameWithExt = $file->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::removeAccents($filename);
                $extension       = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $file_name[]     = $fileNameToStore;
                $dir             = storage_path('uploads/chapter/files/');
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $file->storeAs('uploads/chapter/files/', $fileNameToStore);
            }
        }

        if(!empty($request->video_url)){
            $chapters->video_url = $request->video_url;
        }
        if(!empty($request->text_content)){
            $chapters->text_content = $request->text_content;
        }

        $chapters->save();

        if(!in_array(null, $request->chapter_link) && !in_array(null, $request->link_label_link)){
            $links = $request->chapter_link;
            $links_label = $request->link_label_link;

            $links = explode(',', $links['0']);
            $links_label = explode(',', $links_label['0']);

            $links_count = 0;
            foreach ($links as $link) {
                $objLink = ChapterLinks::create(
                    [
                        'chapter_id' => $chapters->id,
                        'chapter_label' => $links_label[$links_count],
                        'chapter_link' => $link
                    ]
                );
                $links_count++;
            }
        }
        
        $file_label = $request->file_name;
        $files_count = 0;
        foreach($file_name as $file)
        {
            $objStore = ChapterFiles::create(
                [
                    'chapter_id' => $chapters->id,
                    'chapter_label' => $file,
                    'chapter_files' => $file,
                ]
            );

            $files_count ++;
        }
        
        if(!empty($chapters))
        {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Content Created Successfully');
        }
        else
        {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Content Failed to Create');
        }

        return $msg;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapters  $chapters
     * @return \Illuminate\Http\Response
     */
    public function show(Chapters $chapters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapters  $chapters
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id,$id,$header_id)
    {
        $chapters = Chapters::find($id);
        $chapter_type = Utility::chapter_type();
        $files = ChapterFiles::where('chapter_id',$id)->get();
        $links = ChapterLinks::where('chapter_id', $id)->get();
        $headers = Header::where('course', Crypt::decrypt($course_id))->get();


        $attachments_merge = $files->merge($links);
        $attachments_result = $attachments_merge->all();

        $standarized_attachments = array_map(function($item) {
            return [
                'id' => $item['id'],
                'label' => $item['chapter_label'],
                'type' => ($item['chapter_files']) ? 'Anexo' : 'Link',
            ];
        }, $attachments_result);

        return view('chapters.edit',compact('chapters','chapter_type', 'headers', 'header_id','course_id', 'files', 'links', 'standarized_attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapters  $chapters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapters $chapters,$header_id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapters  $chapters
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$course_id,$header_id)
    {
        $chapters = Chapters::find($id);
        if(!empty($chapters->video_file))
        {
            asset(Storage::delete('uploads/chapters/' . $chapters->video_file));
        }
        $contents = ChapterFiles::where('chapter_id',$id)->get();
        foreach($contents as $content){
            $dir = storage_path('uploads/chapters/'.$content->chapter_files);
            if(file_exists($dir)){
                unlink($dir);
            }
        }
        ChapterFiles::where('chapter_id',$id)->delete();
        $chapters->delete();
        return redirect()->back()->with('success', __('Chapter deleted successfully.'));
    }

    public function fileDelete($id)
    {
        $img_id = ChapterFiles::find($id);
        $dir = storage_path('uploads/chapter/files/');
        if(!empty($img_id->chapter_files))
        {
            if(!file_exists($dir . $img_id->chapter_files))
            {
                $content = ChapterFiles::where('id', $id)->delete();
                return redirect()->back()->with('success', __('File deleted successfully.'));
            }
            else
            {
                unlink($dir.$img_id->chapter_files);
                ChapterFiles::where('id', $id)->delete();
                return redirect()->back()->with('success', __('File deleted successfully.'));
            }
        }
    }

    public function attachmentDelete($type, $id)
    {
        if($type == 'Link'){
            $link = ChapterLinks::find($id)->delete();
            return redirect()->back()->with('success', __('Link deleted successfully.'));
        }else{
            $img_id = ChapterFiles::find($id);
            $dir = storage_path('uploads/chapter/files/');
            if(!empty($img_id->chapter_files))
            {
                if(!file_exists($dir . $img_id->chapter_files))
                {
                    $content = ChapterFiles::where('id', $id)->delete();
                    return redirect()->back()->with('success', __('File deleted successfully.'));
                }
                else
                {
                    unlink($dir.$img_id->chapter_files);
                    ChapterFiles::where('id', $id)->delete();
                    return redirect()->back()->with('success', __('File deleted successfully.'));
                }
            }
        }
    }

    public function ContentsUpdate(Request $request, $id)
    {
        $chapters = Chapters::find($id);
        $chapters->name = $request->name;
        $chapters->chapter_description = $request->chapter_description;
        $chapters->type = $request->type;
        $chapters->time_type = $request->time_type;
        $chapters->time_number = $request->time_number;
        $chapters->header_id = $request->header_id;
        
        if($request->enable_time !== 'on'){
            $chapters->time_type = '';
            $chapters->time_number = '';
        }
        
        if(!empty($request->video_url))
        {
            $chapters->video_url = $request->video_url;
        }
        if(!empty($request->text_content))
        {
            $chapters->text_content = $request->text_content;
        }

        if(!empty($request->thumbnail) && count($request->thumbnail) > 0)
        {
            foreach($request->thumbnail as $thumb) {
                $filenameWithExt  = $thumb->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::rand_string(16, "lower");
                $extension = $thumb->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir = storage_path('uploads/chapter/thumbnail/');
                $image_path = $dir . $chapters->thumbnail;
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $chapters->thumbnail = $fileNameToStores;
                $path = $thumb->storeAs('uploads/chapter/thumbnail/', $fileNameToStores);
            }
        }

        $file_name = [];

        if(!empty($request->multiple_files) && count($request->multiple_files) > 0)
        {
            $validator = \Validator::make($request->all(), [
                'multiple_files' => 'max:40000',
            ]);
            if($validator->fails())
            {
                $msg = $validator->getMessageBag()->first();
                return $msg;
            }
            foreach($request->multiple_files as $file)
            {
                $filenameWithExt = $file->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::rand_string(16, "lower");
                $extension       = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $file_name[]     = $fileNameToStore;
                $dir             = storage_path('uploads/chapter/files');
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $file->storeAs('uploads/chapter/files', $fileNameToStore);
            }
        }
        
        $chapters->update();

        if(!in_array(null, $request->chapter_link) && !in_array(null, $request->link_label_link)){

            $links = $request->chapter_link;
            $links_label = $request->link_label_link;

            $links = explode(',', $links['0']);
            $links_label = explode(',', $links_label['0']);

            $links_count = 0;
            foreach ($links as $link) {
                $objLink = ChapterLinks::create(
                    [
                        'chapter_id' => $chapters->id,
                        'chapter_label' => $links_label[$links_count],
                        'chapter_link' => $link
                    ]
                );
                $links_count++;
            }
        }

        $file_label = $request->file_name;
        $files_count = 0;
        foreach($file_name as $file) {
            $objStore = ChapterFiles::create(
                [
                    'chapter_id' => $chapters->id,
                    'chapter_label' => $file,
                    'chapter_files' => $file,
                ]
            );

            $files_count ++;
        }

        // return redirect()->back()->with('success', __('Chapter update successfully.'));

        if(!empty($chapters))
        {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Content Updated Successfully');
        }
        else
        {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Content Failed to Update');
        }

        return $msg;
    }

    public function ContentCreate($header_id,$course_id)
    {
        $chapter_type = Utility::chapter_type();
        return view('chapters.create',compact('header_id','chapter_type','course_id'));
    }

    public function orderUpdate(Request $request){
        $orders = $request->chapterOrder;

        try {
            DB::beginTransaction();
            
            foreach ($orders as $order) {
                $chapterId = $order['id'];
                $newOrder = $order['order'];
                
                $chapter = Chapters::find($chapterId);
                $chapter->position = $newOrder;
                $chapter->update();
            }
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        if(!empty($chapter))
        {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Category Updated Successfully');
        }
        else
        {
            $msg['flag'] = 'error';
            $msg['msg']  = __('category Failed to Update');
        }

        return $msg;
    }
}
