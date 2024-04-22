<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export', function (Blueprint $table) {
            $table->id();
            $table->char('date');
            $table->char('cn');
            $table->char('booking');
            $table->char('container');
            $table->char('seal');
            $table->char('size');
            $table->char('destination');
            $table->char('scn');
            $table->char('cda');
            $table->char('vessel_name');
            $table->char('req_date');
            $table->char('gate_open');
            $table->char('clossing');
            $table->char('agent');
            $table->char('depot');
            $table->char('depot_date');
            $table->char('send_date');
            $table->char('back_date');
            $table->char('trailer');
            $table->string('status')->default('Pending');
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
        Schema::drop('export');
    }
}
