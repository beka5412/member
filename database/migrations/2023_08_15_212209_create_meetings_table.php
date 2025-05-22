<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->string('title');
            $table->string('meeting_id');
            $table->string('media')->nullable();
            $table->string('course_id');
            $table->string('student_id');
            $table->string('start_date');
            $table->string('duration');
            $table->string('start_url');
            $table->string('password')->nullable();
            $table->string('join_url');
            $table->string('status');
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
        Schema::dropIfExists('meetings');
    }
}
