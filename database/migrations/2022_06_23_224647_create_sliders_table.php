<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('file', 191)->nullable();
            $table->string('file_alt')->nullable();
            $table->string('link', 191)->nullable();
            $table->string('link_button', 191)->nullable();
            $table->string('link_target', 7)->nullable();
            $table->decimal('opacity', 2, 1)->nullable()->default(1);
            $table->integer('sort')->default(0);
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('sliders');
    }
}
