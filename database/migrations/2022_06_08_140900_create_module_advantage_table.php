<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleAdvantageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_advantage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('advantage_id');
            $table->timestamps();

            $table->foreign('module_id')
                  ->references('id')
                  ->on('module')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('advantage_id')
                  ->references('id')
                  ->on('advantage')
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
        Schema::dropIfExists('module_advantage');
    }
}
