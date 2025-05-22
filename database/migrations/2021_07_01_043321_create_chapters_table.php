<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->integer('header_id');
            $table->integer('course_id');
            $table->string('name');
            $table->string('thumbnail');
            $table->integer('order_by')->nullable();
            $table->string('type');
            $table->string('enable_time')->nullable();
            $table->string('time_type')->nullable();
            $table->string('time_number')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_file')->nullable();
            $table->text('text_content')->nullable();
            $table->text('chapter_description')->nullable();
            $table->text('position')->nullable();
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
        Schema::dropIfExists('chapters');
    }
}
