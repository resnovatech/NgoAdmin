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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id')->nullable();
            $table->string('request_number')->nullable();
            $table->string('request_date')->nullable();
            $table->string('request_note')->nullable();
            $table->string('total_product')->nullable();
            $table->string('total_quantity')->nullable();
            $table->string('urgent')->nullable();
            $table->string('request_delivery_date')->nullable();
            $table->string('term')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('purchases');
    }
};
