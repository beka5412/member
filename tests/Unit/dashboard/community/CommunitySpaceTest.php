<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\CommunitySpaces;

class CommunitySpaceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_community_space()
    {
        $spaces = new CommunitySpaces();
        $spaces->store_id = '1';
        $spaces->category_id = '1';
        $spaces->title = 'Test Space';
        $spaces->slug = 'test-space';
        $spaces->icon = '';
        $spaces->save();

        $this->assertTrue(true);
    }
}
