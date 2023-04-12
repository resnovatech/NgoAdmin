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
        Schema::create('selldetails', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->string('client_slug')->nullable();
            $table->string('order_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('qty')->default('0');
            $table->string('price')->default('0');
            $table->string('total_price')->default('0');
            $table->string('tax')->default('0');
            $table->string('tax_price')->default('0');
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
        Schema::dropIfExists('selldetails');
    }
};
