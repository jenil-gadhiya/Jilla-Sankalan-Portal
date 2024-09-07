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
        Schema::create('rti_application_patraks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expire_patrak_id')->constrained()->onDelete('cascade');
            $table->integer('sr_no');
            $table->string('month_name');
            $table->integer('application_pending_at_beginning_of_month');
            $table->integer('application_received_during_month');
            $table->integer('total_pending_and_receive_application');
            $table->integer('partially_transfered');
            $table->integer('fully_transfered');
            $table->integer('approved_disposed_application');
            $table->integer('unapproved_disposed_application');
            $table->integer('total_approved_and_unapproved_disposed_application');
            $table->integer('disposed_within_deadline');
            $table->integer('disposed_after_deadline');
            $table->integer('application_pending_within_time_limit_at_the_end_of_month');
            $table->integer('application_pending_out_of_time_limit_at_the_end_of_month');
            $table->integer('total_pending_application');
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
        Schema::dropIfExists('rti_application_patraks');
    }
};
