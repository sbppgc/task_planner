<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePerformerIdColumnInTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Rename dont works, readd column
            $table->dropColumn('id_performer');
            $table->bigInteger('performer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Rename dont works, readd column
            $table->dropColumn('performer_id');
            $table->bigInteger('id_performer');
        });
    }
}
