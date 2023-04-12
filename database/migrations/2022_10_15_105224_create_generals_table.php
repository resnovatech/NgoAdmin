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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('decimal_separator')->nullable();
            $table->string('thousand_separator')->nullable();
            $table->string('number_off_padding_zero')->nullable();
            $table->string('show_tax_per_item')->nullable();
            $table->string('remove_tax_from_item_table_row')->nullable();
            $table->string('exclude_cur_symbol_from_item_table_amount')->nullable();
            $table->string('default_tax')->nullable();
            $table->string('remove_dec_on_numbermoney')->nullable();
            $table->string('output_total_number_in_es_pro')->nullable();
            $table->string('number_word_in_lowercase')->nullable();
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
        Schema::dropIfExists('generals');
    }
};
