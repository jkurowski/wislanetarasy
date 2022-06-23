<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100)->unique();
            $table->string('slug', 200)->unique();
            $table->text('content_entry')->nullable();
            $table->text('content')->nullable();
            $table->string('file', 150)->nullable();
            $table->string('file_facebook')->nullable();
            $table->string('file_alt')->nullable();
            $table->string('meta_title', 150)->nullable();
            $table->string('meta_description', 150)->nullable();
            $table->string('meta_robots')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('articles');
    }
}
