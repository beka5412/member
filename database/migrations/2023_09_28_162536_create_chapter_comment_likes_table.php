<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterCommentLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_comment_likes', function (Blueprint $table) {
            $table->id();
            $table->integer('comment_id')->nullable();
            $table->integer('reply_id')->nullable();
            $table->integer('user_id');
            $table->boolean('like')->nullable();
            $table->boolean('dislike')->nullable();
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
        Schema::dropIfExists('chapter_comment_likes');
    }
}
