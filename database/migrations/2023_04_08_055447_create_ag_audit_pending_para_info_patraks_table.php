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
        Schema::create('ag_audit_pending_para_info_patraks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expire_patrak_id')->constrained()->onDelete('cascade');
            $table->integer('sr_no');
            $table->string('month_name');
            $table->integer('final_pending_para');
            $table->integer('new_received_para_during_month');
            $table->integer('total_para');
            $table->integer('disposal_of_para_execution_during_month');
            $table->integer('disposal_of_para_receiving_during_month');
            $table->integer('disposed_cases_at_end_of_month');
            $table->integer('pending_execution_of_para_at_end_of_month');
            $table->integer('pending_to_receive_para_at_end_of_month');
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
        Schema::dropIfExists('ag_audit_pending_para_info_patraks');
    }
};
