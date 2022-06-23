<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerEventsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_events_log', function (Blueprint $table) {
            $table->foreign(['class_id'])->references(['id'])->on('tracker_system_classes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['log_id'])->references(['id'])->on('tracker_log')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['event_id'])->references(['id'])->on('tracker_events')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_events_log', function (Blueprint $table) {
            $table->dropForeign('tracker_events_log_class_id_foreign');
            $table->dropForeign('tracker_events_log_log_id_foreign');
            $table->dropForeign('tracker_events_log_event_id_foreign');
        });
    }
}
