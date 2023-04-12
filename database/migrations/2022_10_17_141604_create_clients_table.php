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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('customer_type')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('company_name')->nullable();
            $table->string('customer_display_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('gst_treatment')->nullable();
            $table->string('pan')->nullable();

            $table->string('place_of_supply')->nullable();
            $table->string('tax_preference')->nullable();

            $table->string('currency')->nullable();
            $table->string('opening_balance')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('billing_attention')->nullable();
            $table->string('billing_country_region')->nullable();
            $table->string('billing_address_one')->nullable();
            $table->string('billing_address_two')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip_code')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_fax')->nullable();
            $table->string('shipping_attention')->nullable();
            $table->string('shipping_country_region')->nullable();
            $table->string('shipping_address_one')->nullable();
            $table->string('shipping_address_two')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_zip_code')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_fax')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
