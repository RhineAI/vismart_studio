<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvantageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advantage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('module_id');
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->timestamps();

            $table->foreign('service_id')
                ->references('id')
                ->on('service')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('module_id')
                ->references('id')
                ->on('module')
                ->onUpdate('cascade')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advantage');
    }
}
