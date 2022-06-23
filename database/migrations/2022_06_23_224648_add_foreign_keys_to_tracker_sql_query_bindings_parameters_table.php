<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerSqlQueryBindingsParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_sql_query_bindings_parameters', function (Blueprint $table) {
            $table->foreign(['sql_query_bindings_id'], 'tracker_sqlqb_parameters')->references(['id'])->on('tracker_sql_query_bindings')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_sql_query_bindings_parameters', function (Blueprint $table) {
            $table->dropForeign('tracker_sqlqb_parameters');
        });
    }
}
