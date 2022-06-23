<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('investment_id')->nullable();
            $table->integer('building_id')->nullable();
            $table->integer('floor_id')->nullable();
            $table->char('name');
            $table->string('name_list');
            $table->string('number', 20);
            $table->integer('number_order');
            $table->integer('rooms')->nullable();
            $table->decimal('price', 12)->nullable();
            $table->string('area', 7)->nullable();
            $table->string('garden_area', 10)->nullable();
            $table->string('balcony_area', 10)->nullable();
            $table->string('terrace_area', 10)->nullable();
            $table->string('loggia_area', 10)->nullable();
            $table->integer('comercial_area')->default(0);
            $table->string('parking_space')->nullable();
            $table->string('garage')->nullable();
            $table->boolean('type')->default(false);
            $table->boolean('status')->default(false);
            $table->string('file')->nullable();
            $table->string('file_pdf')->nullable();
            $table->integer('gallery_id')->nullable();
            $table->text('html')->nullable();
            $table->text('cords')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();

            $table->index(['investment_id', 'building_id', 'floor_id'], 'investment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
