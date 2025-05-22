<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_notes', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('course_id');
            $table->string('header_id');
            $table->string('chapter_id');
            $table->string('image');
            $table->string('description');
            $table->string('current_time');
            $table->string('store_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_notes');
    }
}
