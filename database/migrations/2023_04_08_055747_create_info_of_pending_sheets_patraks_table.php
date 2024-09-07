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
        Schema::create('info_of_pending_sheets_patraks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expire_patrak_id')->constrained()->onDelete('cascade');
            $table->integer('sr_no');
            $table->string('month_name');
            $table->integer('sheets_pending_at_start_of_month');
            $table->integer('new_sheets_received_during_month');
            $table->integer('total_sheets_to_be_disposed');
            $table->integer('sheets_disposed_during_month');
            $table->integer('sheets_pending_at_end_of_month');
            $table->integer('sheets_pending_above_15_days');
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
        Schema::dropIfExists('info_of_pending_sheets_patraks');
    }
};
