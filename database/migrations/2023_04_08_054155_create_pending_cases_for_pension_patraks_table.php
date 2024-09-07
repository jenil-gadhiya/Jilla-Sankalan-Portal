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
        Schema::create('pending_cases_for_pension_patraks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expire_patrak_id')->constrained()->onDelete('cascade');
            $table->integer('sr_no');
            $table->string('month_name');
            $table->integer('pending_cases_at_start_of_month');
            $table->integer('cases_during_month');
            $table->integer('total_cases');
            $table->integer('disposed_cases_at_end_of_month');
            $table->integer('pending_cases_after_one_month');
            $table->integer('pending_cases_after_two_month');
            $table->integer('pending_cases_after_three_month');
            $table->integer('pending_cases_above_three_month');
            $table->integer('total_pending_cases');
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
        Schema::dropIfExists('pending_cases_for_pension_patraks');
    }
};
