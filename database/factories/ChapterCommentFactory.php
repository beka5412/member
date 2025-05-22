<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChapterComment;

class ChapterCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'chapter_id' => '1',
            'user_id' => '1',
            'comment' => $this->faker->text(100),
            'approved' => null,
            'spam' => null,
            'store_id' => '1'
        ];
    }
}
