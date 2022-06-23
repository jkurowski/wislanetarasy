<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inlines', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_place');
            $table->string('modaltytul')->nullable();
            $table->text('modaleditor')->nullable();
            $table->text('modaleditortext')->nullable();
            $table->string('modallink')->nullable();
            $table->string('modallinkbutton')->nullable();
            $table->string('file')->nullable();
            $table->string('file_alt')->nullable();
            $table->integer('file_width')->nullable();
            $table->integer('file_height')->nullable();
            $table->integer('sort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inlines');
    }
}
