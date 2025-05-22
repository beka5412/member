<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrationPlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integration_platforms', function (Blueprint $table) {
            $table->id();
            $table->integer('enabled')->nullable()->default(0);
            $table->string('company')->nullable();
            $table->string('name')->nullable();
            $table->string('description', 2000)->nullable();
            $table->text('logo_url')->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('integration_platforms');
    }
}
