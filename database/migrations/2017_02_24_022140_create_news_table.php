<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('cut_title');
            $table->text('description');
            $table->longText('content');
            $table->string('img');
            $table->integer('high_light')->default(0);
            $table->integer('view')->default(0);
            $table->integer('news_type_id')->unsigned();
            $table->foreign('news_type_id')->references('id')->on('news_type');
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
        Schema::drop('news');
    }
}
