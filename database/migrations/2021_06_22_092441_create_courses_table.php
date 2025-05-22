<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id');
            $table->string('title');
            $table->string('type')->nullable();
            $table->text('course_requirements')->nullable();
            $table->text('course_description')->nullable();
            $table->text('status')->nullable();
            $table->string('free')->nullable();
            $table->string('category')->nullable();
            $table->string('quiz')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('duration')->nullable();
            $table->string('comments')->nullable();
            $table->string('reviews')->nullable();
            $table->string('gamification')->nullable();
            $table->string('visible')->nullable();
            $table->string('linear_progress')->nullable();
            $table->string('skip_modules')->default('off');
            $table->integer('per_row')->default(5)->nullable();
            $table->string('link')->nullable();
            $table->string('external_link')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('police')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('courses');
    }
}
