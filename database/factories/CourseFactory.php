<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
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
            'title' => $this->faker->text(15),
            'type' => 'Course',
            'course_requirements' => $this->faker->text(30),
            'course_description' => $this->faker->text(100),
            'status' => 'on',
            'category' => '',
            'quiz' => '',
            'sub_category' => '',
            'duration' => '',
            'link' => '',
            'thumbnail' => '',
            'created_by' => '2'
        ];
    }
}
