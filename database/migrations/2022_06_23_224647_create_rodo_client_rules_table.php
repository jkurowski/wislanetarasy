<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRodoClientRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rodo_client_rules', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('rodo_rule_id');
            $table->integer('rodo_client_id');
            $table->integer('duration');
            $table->integer('months');
            $table->string('url')->nullable();
            $table->string('ip', 15);
            $table->integer('status');
            $table->dateTime('created_at')->nullable();
            $table->string('canceled_at', 24)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rodo_client_rules');
    }
}
