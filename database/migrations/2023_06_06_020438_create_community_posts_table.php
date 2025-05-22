<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();
            $table->string('space_id')->nullable();
            $table->string('user_id');
            $table->string('store_id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('author');
            $table->string('pinned')->default('0');
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
        Schema::dropIfExists('community_posts');
    }
}
