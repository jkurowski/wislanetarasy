<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrackerReferersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracker_referers', function (Blueprint $table) {
            $table->foreign(['domain_id'])->references(['id'])->on('tracker_domains')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracker_referers', function (Blueprint $table) {
            $table->dropForeign('tracker_referers_domain_id_foreign');
        });
    }
}
