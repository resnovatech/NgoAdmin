<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ngo_name_change_daks', function (Blueprint $table) {
            $table->id();
            $table->string('sender_admin_id')->nullable();
            $table->string('receiver_admin_id')->nullable();
            $table->string('name_change_status_id')->nullable();
            $table->string('original_recipient')->nullable();
            $table->string('copy_of_work')->nullable();
            $table->string('informational_purposes')->nullable();
            $table->string('attraction_attention')->nullable();
            $table->string('dak_detail_id')->nullable();
            $table->string('status',100)->nullable();
            $table->string('nothi_jat_id',100)->nullable();
            $table->string('nothi_jat_status',100)->nullable();
            $table->string('sent_status',100)->nullable();
            $table->string('present_status',100)->nullable();
            $table->string('amPmValue',200)->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngo_name_change_daks');
    }
};
