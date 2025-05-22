<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CommunityCategories;

class CommunityCategory extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_community_category()
    {
        $communityCategory = new CommunityCategories();

        $response = $this->post('/community/create-category', [
            'store_id' => 1,
            'name' => 'test 2',
        ]);

        $this->assertEquals(1, CommunityCategories::count());
    }
}
