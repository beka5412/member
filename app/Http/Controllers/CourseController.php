<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChapterFiles;
use App\Models\Course;
use App\Models\CourseAccessRules;
use App\Models\CourseBanner;
use App\Models\CourseThemeSettings;
use App\Models\Faq;
use App\Models\PracticesFiles;
use App\Models\QuizSettings;
use App\Models\Subcategory;
use App\Models\Student;
use App\Models\Utility;
use App\Exports\CoursesExport;
use App\Models\Header;
use App\Models\Store;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\RocketMember\ImageService;


class CourseController extends Controller
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
        $user = \Auth::user()->current_store;
        $courses = Course::where('store_id',$user)->where('created_by', \Auth::user()->creatorId())->paginate(15);
        $category = Category::where('store_id',$user)->where('created_by', \Auth::user()->creatorId())->get()->pluck('name','id');
        return view('course.index',compact('courses','category', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user()->current_store;
        $category = Category::where('store_id',$user)->where('created_by', \Auth::user()->creatorId())->get();
        return view('course.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), 
            ['title' => 'required|max:120',]
        );  
        $course                      = new Course();
        $course->title               = $request->title;
        $course->course_description	 = $request->course_description;
        $course->external_link = $request->external_link;
        $course->per_row = $request->per_row;

        if(isset($request->category))
        {
            $course->type = "Course";            
            $course->category = $request->category;
        }

        if($request->type == 'Quiz'){
            if(!empty($request->quiz))
            {
                $course['quiz'] = implode(',', $request->quiz);
            }
            else
            {
                $course['quiz'] = $request->quiz;
            }
        }

        if(!empty($request->thumbnail))
        {
            $fileNameToStores = ImageService::handleImageUpload($request->thumbnail, 1280, 800, 'uploads/thumbnail/');
            $course->thumbnail = $fileNameToStores;
        }

        $course->status = 'on';
        $course->store_id =  \Auth::user()->current_store;
        $course->created_by = \Auth:: user()->creatorId();
        $course->free = $request->free == 'on' ? 'on' : null;

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages );
        }

        $course->save();

        if($request->free == 'on'){
            $students = Student::where('store_id', \Auth::user()->current_store)->with('purchasedCourses')->get();
            foreach($students as $student){
                $student->purchasedCourses()->firstOrCreate(
                    ['student_id' => $student->id, 'course_id' => $course->id],
                    ['order_id' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
                );
            }
        }

        $course_id = Crypt::encrypt($course->id);

        if(!empty($request->external_link_switch) && $request->external_link !== null){
            $user = \Auth::user()->current_store;
            $courses = Course::where('store_id',$user)->where('created_by', \Auth::user()->creatorId())->get();
            $category = Category::where('store_id',$user)->where('created_by', \Auth::user()->creatorId())->get()->pluck('name','id');
            return view('course.index',compact('courses','category', 'user'));
        }

        return redirect()->route('course.edit',$course_id)->with('success', __('Course created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $quiz_id = explode(',',$course->quiz);
        $sub_id = explode(',',$course->sub_category);
        $quiz = QuizSettings::whereIn('id',$quiz_id)->get()->pluck('title')->toArray();
        $sub = Subcategory::whereIn('id',$sub_id)->get()->pluck('name')->toArray();
        return view('course.view',compact('course','quiz','sub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Auth::user()->current_store;
        $course = Course::find(Crypt::decrypt($id));
        $courses = Course::where('store_id',$user)->get();
        $category = Category::where('store_id',$user)->where('created_by', \Auth::user()->creatorId())->get()->pluck('name','id');
        $sub_category = Subcategory::where('category',$course->category)->get()->pluck('name','id');
        $status = Utility::status();
        $quiz = QuizSettings::where('created_by', \Auth::user()->creatorId())->get()->pluck('title','id');
        $course_id = $id;
        $headers = Header::where('course',Crypt::decrypt($id))->get();
        $course_settings = Utility::getCourseThemeSetting($course->id);
        $banners = CourseBanner::where('course_id', $course->id)->get();

        return view('course.edit',compact('sub_category','course','category','status','quiz','course_id','headers', 'course_settings', 'banners', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validator = \Validator::make(
            $request->all(), ['title' => 'required|max:120']
        );
        $course->title = $request->title;
        $course->course_description	 = $request->course_description;
        $course->external_link = $request->external_link;

        if(isset($request->category))
        {
            $validator = \Validator::make($request->all(), [
                'subcategory' => 'required',
            ]);
            $course->type = "Course";
            $course->category = $request->category;
        }
        if(!empty($request->thumbnail))
        {
            $fileNameToStores = ImageService::handleImageUpload($request->thumbnail, 1280, 800, 'uploads/thumbnail/');
            $course->thumbnail = $fileNameToStores;

        } 
        $course->status = 'on';
        $course->created_by = \Auth:: user()->creatorId();
        $course->free = $request->free == 'on' ? 'on' : null;
        
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();
        }
        $course->update();



        return redirect()->back()->with('success', __('Course updated successfully!'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Course  $course
    * @return \Illuminate\Http\Response
    */
    public function updateDiscussion(Request $request, Course $course)
    {
        $course->comments = $request->allow_comments;
        $course->reviews = $request->allow_reviews;
        $course->gamification = $request->gamification;
        $course->update();
        return redirect()->back()->with('success', __('Course updated successfully!'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  \App\Course $course
    * @return \Illuminate\Http\Response
    */
    public function updateGeneral(Request $request, Course $course)
    {

        $course->visible = $request->visible_incourses;
        $course->linear_progress = $request->linear_progress;
        $course->link = $request->link;
        $course->police = $request->police;
        $course->skip_modules = $request->skip_modules;
        $course->per_row = $request->per_row;

        if($request->access_duration == 'limited') {
            $course->duration = $request->duration_time;
        }else {
            $course->duration = '';
        };

        $course->update();

        if($request->conditions){
            $type = $request->condition_type;
            $type_value = $type == 'time' ? $request->time_rule : $request->percentage_rule;
            $course_progress_id = $request->course_progress_id == '' ? null : $request->course_progress_id;

            if($type_value != ''){
                $course_access_rules = CourseAccessRules::updateOrCreate(
                    ['course_id' =>  $course->id],
                    ['type' => $type, 'value' => $type_value, 'course_progress_id' => $course_progress_id]
                );
            }
        }else{
            $course_access_rules = CourseAccessRules::where('course_id', $course->id)->first();
            if($course_access_rules){
                $course_access_rules->delete();
            }
        }

        return redirect()->back()->with('success', __('Course updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back()->with('success', __('Course deleted successfully.'));
    }

    public function getsubcategory(Request $request)
    {
        $user = \Auth::user()->current_store;
        $subcategory = Subcategory::where('store_id',$user)->where('created_by', '=', \Auth::user()->creatorId())->where('category', $request->category_id)->get()->pluck('name', 'id')->toArray();
        return response()->json($subcategory);
    }

    public function practicesFiles(Request $request,$id)
    {
        $course_id = Crypt::decrypt($id);
        $file_name = [];
        if(!empty($request->file) && count($request->file) > 0)
        {
            $validator = \Validator::make($request->all(), [
                'multiple_files' => 'max:40000',
            ]);
            foreach($request->file as $file)
            {
                $filenameWithExt = $file->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::removeAccents($filename);
                $extension       = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $file_name[]     = $fileNameToStore;
                $dir             = storage_path('uploads/practices/');
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $file->storeAs('uploads/practices/', $fileNameToStore);
            }
        }
        foreach($file_name as $file)
        {
            $uploded_files =
                PracticesFiles::create(
                [
                    'course_id' => $course_id,
                    'file_name' => $filename,
                    'files' => $file,
                ]
            );
        }
        if($validator->fails())
        {
            $msg = $validator->getMessageBag()->first();
            return $msg;
        }
        return response()->json([
                'status' => 'success',
                'success' =>  __('Successfully added!'),
            ]
        );

    }

    public function fileDelete($id)
    {
        $img_id = PracticesFiles::find($id);
        $dir = storage_path('uploads/practices/');
        if(!empty($img_id->files))
        {
            if(!file_exists($dir . $img_id->files))
            {
                $content = DB::table('practices_files')->where('id ', '=', $id)->delete();
                return response()->json(
                    [
                        'error' => __('File not exists in folder!'),
                        'id' => $id,
                    ]
                );
            }
            else
            {
                unlink($dir.$img_id->files);
                DB::table('practices_files')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'success' => __('Record deleted successfully!'),
                        'id' => $id,
                    ]
                );
            }
        }
    }

    public function editFileName($id)
    {
        $file_name = PracticesFiles::find($id);
        return view('course.editFileName',compact('file_name'));
    }

    public function updateFileName(Request $request,$id)
    {
        $file = PracticesFiles::find($id);
        $file->file_name = $request->file_name;
        $file->update();
        return redirect()->back()->with('success', __('Filename updated successfully') );
    }

    public function export()
    {
        $name = 'course_' . date('Y-m-d i:h:s');
        $data = Excel::download(new CoursesExport(), $name . '.xlsx');ob_end_clean();

        return $data;
    }

    public function updateTheme(Request $request, $id){
        $course_settings = new CourseThemeSettings();
        $user = \Auth::user();
        $post = $request->all();
        unset($post['_token']);

        if($request->cust_theme){
            $cust_theme = $request->cust_theme;
            DB::table('course_theme_settings')
                ->updateOrInsert(
                    ['course_id' => $id, 'store_id' => \Auth::user()->current_store, 'name' => 'cust_theme'],
                    ['value' => $cust_theme]
                );
        }

        if($request->cust_enable_banner == null || $request->cust_enable_banner == 'on'){
            $enable_banner = $request->cust_enable_banner;
            if($request->cust_enable_banner == null){
                $enable_banner = '';
            }

            DB::table('course_theme_settings')
                ->updateOrInsert(
                    ['course_id' => $id, 'store_id' => \Auth::user()->current_store, 'name' => 'cust_enable_banner'],
                    ['value' => $enable_banner]
                );
        }

        if($request->cust_type_banner){
            $type_banner = $request->cust_type_banner;

            DB::table('course_theme_settings')
                ->updateOrInsert(
                    ['course_id' => $id, 'store_id' => \Auth::user()->current_store, 'name' => 'cust_type_banner'],
                    ['value' => $type_banner]
                );
        }

        if($request->cust_enable_chapter_name == null || $request->cust_enable_chapter_name == 'on'){
            $enable_chapter_name = $request->cust_enable_chapter_name;
            if($request->cust_enable_chapter_name == null){
                $enable_chapter_name = '';
            }

            DB::table('course_theme_settings')
                ->updateOrInsert(
                    ['course_id' => $id, 'store_id' => \Auth::user()->current_store, 'name' => 'cust_enable_chapter_name'],
                    ['value' => $enable_chapter_name]
                );
        }

        if($request->cust_enable_banner == null || $request->cust_enable_banner == 'on'){
            $enable_banner = $request->cust_enable_banner;
            if($request->cust_enable_banner == null){
                $enable_banner = '';
            }

            DB::table('course_theme_settings')
                ->updateOrInsert(
                    ['course_id' => $id, 'store_id' => \Auth::user()->current_store, 'name' => 'cust_enable_banner'],
                    ['value' => $enable_banner]
                );
        }

        return redirect()->back()->with('success', __('Course settings succefully updated.'));
    }

    public function storeBanners($course_id, Request $request){

        $banner = new CourseBanner();
        $banner->course_id = $course_id;
        $banner->type = $request->modal_banner_type;
        $banner->title = $request->modal_banner_title;
        $banner->link = $request->modal_banner_link;
        $banner->description = $request->modal_banner_description;
        $banner->video = $request->modal_video_url;
        $banner->btn_bg = $request->modal_banner_bg_color;
        $banner->btn_color = $request->modal_banner_text_color;

        if(!empty($request->images) && count($request->images) > 0)
        {
            foreach($request->images as $image) {
                $filenameWithExt  = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::rand_string(16, "lower");
                $extension = $image->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir = storage_path('uploads/course_banners/');
                $image_path = $dir . $banner->image;
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $banner->image = $fileNameToStores;
                $path = $image->storeAs('uploads/course_banners/', $fileNameToStores);
            }
        }

        if(!empty($request->mobile_images) && count($request->mobile_images) > 0)
        {
            foreach($request->mobile_images as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::rand_string(16, "lower");
                $extension = $image->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir = storage_path('uploads/course_banners/');
                $image_path = $dir . $banner->image;
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $banner->image_mobile = $fileNameToStores;
                $path = $image->storeAs('uploads/course_banners/', $fileNameToStores);
            }
        }

        if($request->type == 'video'){
            $banner->type = $request->type;
            $banner->video = $request->video;
        }

        $banner->save();

        if(!empty($banner))
        {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Banner Created Successfully');
            $msg['row'] = $banner;
        }
        else
        {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Banner Failed to Create');
        }

        return $msg;
    }

    public function destroyBanners($type, $id){
        $banner_id = CourseBanner::find($id);
        $dir = storage_path('app/public/uploads/course_banners/');
        
        if($type == 'image' && $banner_id->image !== null){
            unlink($dir.$banner_id->image);
        }
        CourseBanner::where('id', $id)->delete();
        
        $msg['flag'] = 'success';
        $msg['msg']  = __('Banner deleted Successfully');

        return $msg;
    }
    
}
