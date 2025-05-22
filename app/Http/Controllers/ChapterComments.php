<?php

namespace App\Http\Controllers;
use App\Models\ChapterComment;
use App\Models\ChapterCommentLikes;
use App\Models\Chapters;
use App\Models\Store;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ChapterComment as ChapterCommentNotification;

class ChapterComments extends Controller
{
    public function create(Request $request, $chapter_id, $student_id){
        $student = Student::find($student_id);
        $store = Store::where('id', $student->store_id)->first();
        $chapter = Chapters::find($chapter_id);

        $comment = new ChapterComment();
        $comment->chapter_id = $chapter_id;
        $comment->user_id = $student_id;
        $comment->comment = $request->comment;
        $comment->store_id = $student->store_id;
        $comment->save();

        $message = $student->name . ' adicionou um novo comentário na aula ' . $chapter->name;

        Notification::send($store, new ChapterCommentNotification($store->id, $student_id, $comment->id, $message));

        if(!empty($comment))
        {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Comment Created Successfully');
            $msg['data'] = $comment;
            $msg['student'] = $comment->student;
            $msg['message'] = $message;
        }
        else
        {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Comment Failed to Create');
        }

        return $msg;
    }

    public function update(Request $request, $id){
        $comment = chapterComment::find($id);
        $comment->comment = $request->comment;
        $comment->update();
    }

    public function delete($id){
        $comment = ChapterComment::find($id);
        $comment->delete();

        return $msg = [
            'message' => __('Comment deleted sucessfuly')
        ];
    }

    public function commentLike(Request $request, $student_id, $comment_id){
        $like = new ChapterCommentLikes();
        $like->user_id = $student_id;
        $like->like = true;

        if($request->type == 'comment'){
            $like->comment_id = $comment_id;
        }else{
            $like->reply_id = $comment_id;
        }

        $like->save();

        return $msg = [
            'success' => __('Like created successfully')
        ];
    }

    public function commentReply(Request $request, $student_id, $comment_id){
        $reply = new ChapterReply;
        $reply->parent_id = $comment_id;
        $reply->user_id = $student_id;
        $reply->comment = $request->comment;

        $reply->save();

        return $msg = [
            'success' => __('Reply created successfully')
        ];
    }
}
