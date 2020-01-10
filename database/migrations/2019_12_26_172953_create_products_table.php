<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('img_thumbnail')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->boolean('status');
            $table->integer('order')->unique();
            $table->timestamps();

            $table->foreign('parent_id')->on('categories')->references('id')->onDelete('cascade');
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('website');
            $table->string('img-thumbnail');
            $table->timestamps();
        });
        Schema::create('brand_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('brand_id')->on('brands')->references('id')->onDelete('cascade');
            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('details');
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('price');
            $table->bigInteger('count');
            $table->string('img_thumbnail')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->integer('brand_id')->unsigned();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
            $table->foreign('brand_id')->on('brands')->references('id')->onDelete('cascade');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('brand_category');
        Schema::dropIfExists('products');
    }
}
