<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('export', function (Blueprint $table) {
            $table->string('img_src');
            $table->unsignedBigInteger('customer_id');
            $table->string('confirmation')->default('None');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
