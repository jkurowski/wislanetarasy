<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerRoutePathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_route_paths', function (Blueprint $table) {
            $table->foreign(['route_id'])->references(['id'])->on('tracker_routes')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_route_paths', function (Blueprint $table) {
            $table->dropForeign('tracker_route_paths_route_id_foreign');
        });
    }
}
