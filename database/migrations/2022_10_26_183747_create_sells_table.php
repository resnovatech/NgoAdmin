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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->string('client_slug')->nullable();
            $table->string('order_id')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('pay_date')->nullable();
            $table->string('Due_date')->nullable();
            $table->string('warehouse')->nullable();
            $table->string('order_from')->nullable();
            $table->string('total_net_price')->default('0');
            $table->string('total_discount')->default('0');
            $table->string('total_vat_tax')->default('0');
            $table->string('delivery_charge')->default('0');
            $table->string('grand_total')->default('0');
            $table->string('total_pay')->default('0');
            $table->string('cod')->default('0');
            $table->string('due')->default('0');
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
        Schema::dropIfExists('sells');
    }
};
