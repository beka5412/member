<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('course_id');
            $table->string('type');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->string('image_mobile')->nullable();
            $table->string('video')->nullable();
            $table->string('btn_bg')->nullable();
            $table->string('btn_color')->nullable();
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
        Schema::dropIfExists('course_banners');
    }
}
