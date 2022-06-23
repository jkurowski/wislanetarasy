<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->nullable()->default(0);
            $table->string('title', 100)->unique();
            $table->unsignedInteger('_lft');
            $table->unsignedInteger('_rgt');
            $table->string('slug', 200)->nullable()->unique();
            $table->string('uri')->nullable();
            $table->string('url')->nullable();
            $table->string('url_target', 10)->nullable();
            $table->text('content')->nullable();
            $table->string('content_header')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_robots')->nullable();
            $table->boolean('active');
            $table->integer('type')->nullable()->default(1);
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
        Schema::dropIfExists('pages');
    }
}
