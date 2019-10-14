<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('book_name',120)->charset('utf8');
            $table->longText('description',250)->nullable()->charset('utf8');
            $table->string('book_image')->nullable()->charset('utf8');
            $table->date('published_date');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->integer('publisher_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('author_id')->references('id')->on('authors');
        });
        // Schema::table('books', function($table) {
            // $table->engine = 'InnoDB';
            // $table->integer('user_id')->unsigned();
            // $table->integer('language_id')->unsigned();
            // $table->integer('publisher_id')->unsigned();
            // $table->integer('author_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->index();
            // $table->foreign('language_id')->references('id')->on('languages')->index();
            // $table->foreign('publisher_id')->references('id')->on('publishers')->index();
            // $table->foreign('author_id')->references('id')->on('authors')->index();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
