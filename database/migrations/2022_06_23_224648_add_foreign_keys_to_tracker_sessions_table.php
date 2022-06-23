<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_sessions', function (Blueprint $table) {
            $table->foreign(['referer_id'])->references(['id'])->on('tracker_referers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['agent_id'])->references(['id'])->on('tracker_agents')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['device_id'])->references(['id'])->on('tracker_devices')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['language_id'])->references(['id'])->on('tracker_languages')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['cookie_id'])->references(['id'])->on('tracker_cookies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['geoip_id'])->references(['id'])->on('tracker_geoip')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_sessions', function (Blueprint $table) {
            $table->dropForeign('tracker_sessions_referer_id_foreign');
            $table->dropForeign('tracker_sessions_agent_id_foreign');
            $table->dropForeign('tracker_sessions_device_id_foreign');
            $table->dropForeign('tracker_sessions_language_id_foreign');
            $table->dropForeign('tracker_sessions_cookie_id_foreign');
            $table->dropForeign('tracker_sessions_geoip_id_foreign');
        });
    }
}
