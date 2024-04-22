<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('cn')->nullable();
            $table->string('container_no')->nullable();
            $table->string('ata')->nullable();
            $table->string('skp')->nullable();
            $table->string('expired')->nullable();
            $table->string('size')->nullable();
            $table->string('destination')->nullable();
            $table->string('agent')->nullable();
            $table->string('depot')->nullable();
            $table->string('kb_date')->nullable();
            $table->string('send_date')->nullable();
            $table->string('eco')->nullable();
            $table->string('back_date')->nullable();
            $table->string('trailer')->nullable();
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
        Schema::dropIfExists('import');
    }
}
