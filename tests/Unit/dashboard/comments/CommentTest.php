<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ChapterComment;

// use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_can_be_list_not_reviewed_comments()
    {
        $not_reviewed = ChapterComment::where('approved', null)->where('span', null)->get();
        $this->assertEquals(10, $not_reviewed->count());
    }

    public function test_can_be_is_marked_approved(){
        $comment = ChapterComment::find(1);
        $comment->approved = 1;
        $comment->save();
        $this->assertEquals(1, $comment->approved);
    }

    public function test_can_be_is_marked_repproved(){
        $comment = ChapterComment::find(2);
        $comment->approved = 0;
        $comment->save();
        $this->assertEquals(0, $comment->approved);
    }

    public function test_can_be_is_marked_span(){
        $comment = ChapterComment::find(3);
        $comment->span = 1;
        $comment->save();
        $this->assertEquals(1, $comment->span);
    }

    public function test_can_be_list_approved(){
        $comment = ChapterComment::where('approved', 1)->get();
        $this->assertEquals(1, $comment->count());
    }

    public function test_can_be_list_repproved(){
        $comment = ChapterComment::where('approved', 0)->get();
        $this->assertEquals(1, $comment->count());
    }

    public function test_can_be_list_span(){
        $comment = ChapterComment::where('span', 1)->get();
        $this->assertEquals(1, $comment->count());
    }

    public function test_can_be_list_all(){
        $comment = ChapterComment::all();
        $this->assertEquals(10, $comment->count());
    }
}
