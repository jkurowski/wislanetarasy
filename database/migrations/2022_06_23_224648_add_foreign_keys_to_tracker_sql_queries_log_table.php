<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerSqlQueriesLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_sql_queries_log', function (Blueprint $table) {
            $table->foreign(['log_id'])->references(['id'])->on('tracker_log')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['sql_query_id'])->references(['id'])->on('tracker_sql_queries')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_sql_queries_log', function (Blueprint $table) {
            $table->dropForeign('tracker_sql_queries_log_log_id_foreign');
            $table->dropForeign('tracker_sql_queries_log_sql_query_id_foreign');
        });
    }
}
