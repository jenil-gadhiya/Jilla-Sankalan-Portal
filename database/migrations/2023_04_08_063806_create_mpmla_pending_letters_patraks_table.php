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
        Schema::create('mpmla_pending_letters_patraks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expire_patrak_id')->constrained()->onDelete('cascade');
            $table->integer('sr_no');
            $table->string('district');
            $table->integer('letters_pending');
            $table->integer('letters_received');
            $table->integer('disposed');
            $table->integer('pending_upto_15_days');
            $table->integer('pending_above_1_month');
            $table->integer('pending_upto_3_month');
            $table->integer('pending_upto_6_month');
            $table->integer('pending_above_6_month');
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
        Schema::dropIfExists('mpmla_pending_letters_patraks');
    }
};
