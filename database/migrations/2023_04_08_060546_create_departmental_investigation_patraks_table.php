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
        Schema::create('departmental_investigation_patraks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expire_patrak_id')->constrained()->onDelete('cascade');
            $table->integer('sr_no');
            $table->string('month_name');
            $table->integer('initially_pending_departmental_investigation');
            $table->integer('new_departmental_investigation');
            $table->integer('total_departmental_investigation');
            $table->integer('disposed_departmental_investigation');
            $table->integer('final_pending_departmental_investigation');
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
        Schema::dropIfExists('departmental_investigation_patraks');
    }
};
