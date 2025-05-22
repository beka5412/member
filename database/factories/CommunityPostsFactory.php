<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityPostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'space_id' => '1',
            'user_id' => '1',
            'store_id' => '1',
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'author' => '1',
        ];
    }
}
