<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrationProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integration_products', function (Blueprint $table) {
            $table->id();
            $table->integer('integration_id')->nullable()->default(0);
            $table->string('name')->nullable();
            $table->text('platform_product_id')->nullable();
            $table->text('courses')->nullable();
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
        Schema::dropIfExists('integration_products');
    }
}
