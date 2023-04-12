<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('brand')->nullable();
            $table->string('unit')->nullable();
            $table->string('unit_measure')->nullable();
            $table->string('quantity')->nullable();

            $table->string('stock_unit')->nullable();
            $table->string('alert-quantity')->nullable();

            $table->string('ware_house')->nullable();
            $table->string('buying_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('whole_sale_price')->nullable();
            $table->string('tax')->nullable();
            $table->string('sku')->nullable();
            $table->string('vendor')->nullable();
            $table->string('des')->nullable();

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
        Schema::dropIfExists('products');
    }
};
