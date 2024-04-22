<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('import', function (Blueprint $table) {
            $table->string('img_alt');
            $table->string('img_src');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('import', function (Blueprint $table) {
            $table->dropColumn('img_alt');
            $table->dropColumn('img_src');
        });
    }
}
