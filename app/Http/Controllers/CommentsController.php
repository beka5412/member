<?php

namespace App\Http\Controllers;

use App\Models\ChapterComment;
use App\Models\ChapterReply;
use App\Models\ChapterCommentSettings;
use App\Models\Utility;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private const APPROVED = 'approved';
    private const NOT_APPROVED = 'repproved';
    private const SPAN = 'span';
    private const NOT_SPAN = '';
    private const TRUE_NUMBER = 1;
    private const FALSE_NUMBER = 0;

    public function __construct()
    {
        \App::setLocale(\Auth::user()->lang);
    }

    public function index()
    {
        $user = \Auth::user()->current_store;
        $store = Store::find($user);
        $tabs = Utility::comment_options();
        $data = $this->getCollection($user);

        return view('comments.index', compact('tabs', 'data', 'store'));
    }

    public function getCollection($user){
        $comments = ChapterComment::where('store_id', $user)->get();

        $not_reviewed = $comments->filter(function($comment){
            return $comment->approved == null && $comment->spam == null;
        });

        $approved = $comments->filter(function($comment){
            return $comment->approved == 1;
        });

        $rejected = $comments->filter(function($comment){
            return $comment->approved == 0 && $comment->approved !== null;
        });

        $spam = $comments->filter(function($comment){
            return $comment->spam == 1;
        });

        return $data = [
            'not_reviewed' => $not_reviewed,
            'approved' => $approved,
            'rejected' => $rejected,
            'spam' => $spam,
            'all' => $comments,
            'configuration' => ''
        ];
    }

    public function isApprovedAction($action)
    {
        return $action == self::APPROVED;
    }

    public function isRepprovedAction($action)
    {
        return $action == self::NOT_APPROVED;
    }

    public function isSpanAction($action)
    {
        return $action == self::SPAN;
    }

    public function getApprovalStatus($action): int{
        return $this->isApprovedAction($action) ? self::TRUE_NUMBER : self::FALSE_NUMBER;
    }

    public function getSpanStatus($action): int{
        return $this->isSpanAction($action) ? self::TRUE_NUMBER : self::FALSE_NUMBER;
    }

    public function action(Request $request, ChapterComment $comment){
        $user = \Auth::user()->current_store;
        $tabs = Utility::comment_options();

        if($this->isApprovedAction($request->action) || $this->isRepprovedAction($request->action)){
            $comment->approved = $this->getApprovalStatus($request->action);
        }

        if($this->isSpanAction($request->action)){
            $comment->span = $this->getSpanStatus($request->action);
        }
        $comment->update();

        $data = $this->getCollection($user);

        return view('comments.components.tabs', compact('tabs', 'data'))->render();
    }

    public function reply(Request $request){
        $user = \Auth::user()->current_store;
        $tabs = Utility::comment_options();
        $store = Store::find($user);

        $reply = new ChapterReply();
        $reply->parent_id = $request->id ?? null;
        $reply->user_id = \Auth::user()->id;
        $reply->comment = $request->value;
        $reply->save();

        $comment = ChapterComment::find($request->id);
        $comment->approved = 1;
        $comment->update();

        $data = $this->getCollection($user);

        return view('comments.components.tabs', compact('tabs', 'data', 'store'))->render();
    }

    public function search(Request $request){
        $user = Auth::user()->current_store;
        $search_query = $request->search_query;
        $comments = ChapterComment::where('store_id', $user)->where('comment', 'LIKE', "%{$search_query}%")->get();

        if($comments->count() >= 1){
            return view('comments.components.tabs', compact('comments'))->render();
        }
    }

    public function settings(Request $request){
        $user = \Auth::user()->current_store;
        $tabs = Utility::comment_options();
        $data = $this->getCollection($user);
        $store = Store::find($user);
        $approval_comments = $request->approval_comments ?? 0;

        $settings = Store::find($user);
        $settings->approval_comments_required = $approval_comments;
        $settings->update();

        return redirect()->back()->with('success', __('comments settings updated successfully!'));
    }
}
