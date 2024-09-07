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
        Schema::create('civil_authority_case_disposal_patraks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expire_patrak_id')->constrained()->onDelete('cascade');
            $table->integer('sr_no');
            $table->string('month_name');
            $table->integer('previous_month_pending_case');
            $table->integer('cases_of_current_month');
            $table->integer('total_of_previous_month_pending_case_and_cases_of_current_month');
            $table->integer('dispose_within_deadline_positive');
            $table->integer('dispose_within_deadline_negative');
            $table->integer('dispose_after_deadline_positive');
            $table->integer('dispose_after_deadline_negative');
            $table->integer('total_dispose');
            $table->integer('case_pending_within_deadline');
            $table->integer('case_pending_after_deadline');
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
        Schema::dropIfExists('civil_authority_case_disposal_patraks');
    }
};
