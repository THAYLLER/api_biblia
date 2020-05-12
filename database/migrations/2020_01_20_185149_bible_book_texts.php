<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BibleBookTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bible_book_texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bible_books_id');
            $table->foreign('bible_books_id')->references('id')->on('bible_books')->onDelete('cascade');
            $table->integer('chapter');
            $table->integer('verse');
            $table->text('text_br');
            $table->text('text_es');
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
        Schema::table('bible_book_texts', function (Blueprint $table) {
            //
        });
    }
}
