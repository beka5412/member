<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Models\CommunityCategories;

class CommunityCategoryTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_community_category()
    {
        $communityCategory = new CommunityCategories();
        $communityCategory->factory('App/Models/CommunityCategories')->create();

        $this->assertEquals(1, CommunityCategories::count());
    }
}
