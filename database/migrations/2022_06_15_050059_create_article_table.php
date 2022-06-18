<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id');
            // $table->foreignId('category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author');
            // $table->unsignedBigInteger('category_id');
            $table->string('photo');
            // $table->text('excerpt');
            $table->text('body');
            $table->timestamps();
            
            // $table->foreign('category_id')
            //     ->references('id')
            //     ->on('categories')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
};
