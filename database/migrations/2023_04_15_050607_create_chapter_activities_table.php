<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_activities', function (Blueprint $table) {
            $table->id();
            $table->string('store_id');
            $table->string('course_id');
            $table->string('chapter_id');
            $table->string('student_id');
            $table->string('type')->nullable();
            $table->string('current_time')->nullable();
            $table->string('total_time')->nullable();
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
        Schema::dropIfExists('chapter_activities');
    }
}
