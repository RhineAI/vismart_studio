<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailServiceJasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_service_jasa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_service_id')->nullable();
            $table->unsignedBigInteger('jasa_id')->nullable();
            $table->timestamps();

            $table->foreign('detail_service_id')
            ->references('id')
            ->on('detail_service')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('jasa_id')
                ->references('id')
                ->on('jasa')
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
        Schema::dropIfExists('detail_service_jasa');
    }
}
