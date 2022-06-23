<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_log', function (Blueprint $table) {
            $table->foreign(['error_id'])->references(['id'])->on('tracker_errors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['query_id'])->references(['id'])->on('tracker_queries')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['session_id'])->references(['id'])->on('tracker_sessions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['path_id'])->references(['id'])->on('tracker_paths')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['route_path_id'])->references(['id'])->on('tracker_route_paths')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_log', function (Blueprint $table) {
            $table->dropForeign('tracker_log_error_id_foreign');
            $table->dropForeign('tracker_log_query_id_foreign');
            $table->dropForeign('tracker_log_session_id_foreign');
            $table->dropForeign('tracker_log_path_id_foreign');
            $table->dropForeign('tracker_log_route_path_id_foreign');
        });
    }
}
