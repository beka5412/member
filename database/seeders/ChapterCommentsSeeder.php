<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChapterComment;

class ChapterCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChapterComment::factory()->count(10)->create();
    }
}
