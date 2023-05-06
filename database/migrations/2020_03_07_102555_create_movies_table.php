<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('vie_name');
            $table->string('eng_name');
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade');
            $table->unsignedBigInteger('nation_id');
            $table->foreign('nation_id')->references('id')->on('nations')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->string('poster_image');
            $table->longText('information');
            $table->string('trailer');
            $table->string('director');
            $table->string('actor');
            $table->string('quality');
            $table->string('point');
            $table->string('time');
            $table->decimal('price',11,3);
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
        Schema::dropIfExists('movies');
    }
}
