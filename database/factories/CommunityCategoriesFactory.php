<?php

namespace Database\Factories;

use App\Models\CommunityCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityCategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store_id' => '1',
            'name' => 'Test Category',
            'slug' => 'test-category',
        ];
    }
}
