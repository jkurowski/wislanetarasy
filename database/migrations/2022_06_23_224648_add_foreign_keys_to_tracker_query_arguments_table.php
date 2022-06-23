<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerQueryArgumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_query_arguments', function (Blueprint $table) {
            $table->foreign(['query_id'])->references(['id'])->on('tracker_queries')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_query_arguments', function (Blueprint $table) {
            $table->dropForeign('tracker_query_arguments_query_id_foreign');
        });
    }
}
