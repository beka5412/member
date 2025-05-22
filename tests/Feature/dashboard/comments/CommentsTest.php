<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\ChapterComment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Facades\Hash;

class Comments extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_can_be_is_marked_approved()
    {
        $user = User::create(
            [
                'name' => 'Teste',
                'email' => 'teste@example.com',
                'password' => Hash::make('1234'),
                'current_store' => '1',
                'type' => 'Owner',
                'lang' => 'en',
                'created_by' => '1',
            ]
        );

        $response = $this->actingAs($user)->post('/comments/4', ['tab' => 'not_reviewed', 'action' => 'approved']);
        $chapterComment = new ChapterComment();

        $this->assertEquals(2, $chapterComment->where('approved', 1)->count());
    }

    public function test_can_be_is_marked_repproved()
    {
        $user = User::create(
            [
                'name' => 'Teste',
                'email' => 'teste2@example.com',
                'password' => Hash::make('1234'),
                'current_store' => '1',
                'type' => 'Owner',
                'lang' => 'en',
                'created_by' => '1',
            ]
        );

        $response = $this->actingAs($user)->post('/comments/4', ['tab' => 'not_reviewed', 'action' => 'repproved']);
        $chapterComment = new ChapterComment();

        $this->assertEquals(2, $chapterComment->where('approved', 0)->count());
    }

    // public function test_can_be_is_marked_span()
    // {
    //     $response = $this->post('/comments/span/5');
    //     $chapterComment = new ChapterComment();

    //     $this->assertEquals(2, $chapterComment->where('span', 1)->count());
    // }
}
