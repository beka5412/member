<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('course_id');
            $table->integer('order_id');
            $table->text('product_id');
            $table->string('payment_status');
            $table->string('payment_type');
            $table->timestamp('start_date')->default(now());
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('purchased_courses');
    }
}
