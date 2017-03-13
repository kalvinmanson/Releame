<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('picture');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('author');
            $table->string('publisher');
            $table->string('collection');
            $table->integer('pages');
            $table->string('isbn10');
            $table->string('isbn13');
            $table->text('abstract');
            $table->text('description');
            $table->string('lang')->default('es');
            $table->integer('condition');
            $table->boolean('stock');
            $table->float('price');
            $table->string('tags');
            $table->float('rank');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
