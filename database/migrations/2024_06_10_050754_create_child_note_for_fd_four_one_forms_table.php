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
        Schema::create('child_note_for_fd_four_one_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pnote_fd_four_one_form')->unsigned();
            $table->foreign('pnote_fd_four_one_form')->references('id')->on('parent_note_for_fd_four_one_forms')->onDelete('cascade');
            $table->string('serial_number');
            $table->longText('description');
            $table->string('admin_id',11);
            $table->string('receiver_id',11)->nullable();
            $table->string('sent_status',11)->nullable();
            $table->string('sender_id',11)->nullable();
            $table->string('view_status',11)->nullable();
            $table->string('back_sign_status',11)->nullable();
            $table->string('amPmValue',200)->nullable();
            $table->string('amPmValueUpdate',200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_note_for_fd_four_one_forms');
    }
};
