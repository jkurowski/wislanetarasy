<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerReferersSearchTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_referers_search_terms', function (Blueprint $table) {
            $table->foreign(['referer_id'], 'tracker_referers_referer_id_fk')->references(['id'])->on('tracker_referers')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_referers_search_terms', function (Blueprint $table) {
            $table->dropForeign('tracker_referers_referer_id_fk');
        });
    }
}
