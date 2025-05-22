<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory()->count(15)->create();
    }
}
