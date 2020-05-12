<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Devotionais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devotionais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_br');
            $table->string('title_es');
            $table->text('description_br');
            $table->text('description_es');
            $table->string('day');
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
        Schema::table('devotionais', function (Blueprint $table) {
            //
        });
    }
}
