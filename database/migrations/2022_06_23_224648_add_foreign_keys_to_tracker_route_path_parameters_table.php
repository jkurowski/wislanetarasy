<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerRoutePathParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_route_path_parameters', function (Blueprint $table) {
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
        Schema::table('tracker_route_path_parameters', function (Blueprint $table) {
            $table->dropForeign('tracker_route_path_parameters_route_path_id_foreign');
        });
    }
}
