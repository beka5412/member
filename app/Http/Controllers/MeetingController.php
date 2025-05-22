<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingConfig;
use App\Models\Meetings;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Traits\ZoomMeetingTrait;

class MeetingController extends Controller
{
    use ZoomMeetingTrait;
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
    const MEETING_URL="https://api.zoom.us/v2/";


    public function index($platform){
        $store = \Auth::user()->current_store;
        $meeting_config = MeetingConfig::where('name', $platform)->where('store_id', $store)->first();
        $meetings = Meetings::where('created_by', $store)->where('platform', $platform)->get();

        return view('meetings.index', compact('platform','meeting_config', 'meetings'));
    }

    public function create($platform){
        $store = \Auth::user()->current_store;
        $students = Student::where('store_id', $store)->get();
        $courses = Course::where('store_id', $store)->get();

        return view('meetings.create', compact('platform', 'students', 'courses'));
    }

    public function store($platform, Request $request){
        $store = Auth::user()->current_store;

        $validatedData = $request->validate([
            'client_id' => 'required',
            'client_secret' => 'required',
            'account_id' => 'required',
        ]);

        $ci = $validatedData['client_id'];
        $cs = $validatedData['client_secret'];
        $ai = $validatedData['account_id'];

        $keys = $ci . ':' . $cs. ':' . $ai;

        $encryptedKeys = Crypt::encryptString($keys);

        $meeting = new MeetingConfig();
        $meeting->name = $platform;
        $meeting->keys = $encryptedKeys;
        $meeting->store_id = $store;
        $meeting->updateOrInsert(
            ['name' => $platform, 'store_id' => $store, 'keys' => $meeting->keys],
            ['keys' => $meeting->keys]
        );

        return redirect()->route('meeting.index', $platform)->with('success', 'Meeting keys saved successfully!');
    }

    public function storeMeeting(Request $request){
        $store_id= \Auth::user()->current_store;
        
        $data['topic'] = $request->title;
        $data['start_time'] = date('Y-m-d H:i:s', strtotime($request->start_date . ' ' . $request->start_time));
        $data['duration'] = (int)$request->duration;
        $data['password'] = $request->password;
        $data['host_video'] = 0; 
        $data['participant_video'] = 0;
        $meeting_create = $this->createMeeting($data);

        if(isset($meeting_create['success']) &&  $meeting_create['success'] == true){
            $meeting_id = isset($meeting_create['data']['id'])?$meeting_create['data']['id']:0;
            $start_url = isset($meeting_create['data']['start_url'])?$meeting_create['data']['start_url']:'';
            $join_url = isset($meeting_create['data']['join_url'])?$meeting_create['data']['join_url']:'';
            $status = isset($meeting_create['data']['status'])?$meeting_create['data']['status']:'';

            $new = new Meetings();

            if(!empty($request->thumbnail))
            {
                $filenameWithExt  = $request->File('thumbnail')->getClientOriginalName();
                $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension        = $request->file('thumbnail')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/thumbnail/');
                $image_path      = $dir . $new->media;
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $new->media = $fileNameToStores;
                $path = $request->file('thumbnail')->storeAs('uploads/meetings/', $fileNameToStores);
            }

            $new->title = $request->title;
            $new->platform = 'zoom';
            $new->meeting_id = $meeting_id;
            $new->course_id = implode(',', $request->courses);      
            $new->student_id = implode(',', $request->students);  
            $new->start_date = date('Y-m-d H:i:s', strtotime($request->start_date . ' ' . $request->start_time));
            $new->duration = $request->duration;
            $new->start_url = $start_url;
            $new->password = $request->password;
            $new->join_url = $join_url;
            $new->status = $status;
            $new->created_by = \Auth::user()->current_store;
            $new->save();

            return redirect()->route('meeting.index', 'zoom')->with('success', 'Meeting keys saved successfully!');
        }else{
            return redirect()->back()->with('error', __('Meeting not created.'));
        } 
    }
}
