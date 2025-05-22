<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CommunityPosts;

class CommunityPostsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_community_post()
    {
        $posts = new CommunityPosts();
        $posts->factory('App/Models/CommunityPosts')->create();

        $this->assertEquals(1, CommunityPosts::count());
    }
}
