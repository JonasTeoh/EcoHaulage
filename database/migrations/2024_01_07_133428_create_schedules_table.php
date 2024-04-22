<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('import_id');
            $table->unsignedBigInteger('export_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            // Add any other schedule-related columns you need
            $table->timestamps();

            // Define foreign key constraint to connect with drivers table
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('import_id')->references('id')->on('import')->onDelete('cascade');
            $table->foreign('export_id')->references('id')->on('export')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}