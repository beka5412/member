<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(IntegrationPlatformsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(ChapterCommentsSeeder::class);
    }
}
