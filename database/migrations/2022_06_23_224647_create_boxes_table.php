<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('place_id')->default(0);
            $table->string('title');
            $table->string('text');
            $table->string('file')->nullable();
            $table->string('file_alt')->nullable();
            $table->string('link')->nullable();
            $table->string('link_button', 20)->nullable();
            $table->string('link_target', 10)->nullable();
            $table->string('aos_animation', 20)->nullable();
            $table->integer('aos_duration')->default(3000);
            $table->integer('aos_delay')->default(0);
            $table->integer('aos_offset')->default(0);
            $table->integer('sort')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxes');
    }
}
