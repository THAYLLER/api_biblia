<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Glossaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glossaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('words_br');
            $table->string('words_es');
            $table->text('description_br');
            $table->text('description_es');
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
        Schema::table('glossaries', function (Blueprint $table) {
            //
        });
    }
}
