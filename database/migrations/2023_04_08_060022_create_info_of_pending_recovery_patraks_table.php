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
        Schema::create('info_of_pending_recovery_patraks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expire_patrak_id')->constrained()->onDelete('cascade');
            $table->integer('sr_no');
            $table->string('month_name'); 
            $table->integer('recovery_left'); 
            $table->integer('current_year_borrowed'); 
            $table->integer('total_recovery_left'); 
            $table->integer('recovey_upto_last_month'); 
            $table->integer('current_month_recovery'); 
            $table->integer('total_recovey_during_year'); 
            $table->integer('pending_recoverable_amount_after_each_month'); 
            $table->integer('pending_litigation_after_each_month'); 
            $table->integer('pending_unrecoverable_amount_after_each_month'); 
            $table->integer('total_recovery_left_after_each_month');
            $table->string('remarks'); 
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
        Schema::dropIfExists('info_of_pending_recovery_patraks');
    }
};
