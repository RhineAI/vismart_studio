<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInfoServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_info_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_service_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();
            
            $table->foreign('detail_service_id')
                ->references('id')
                ->on('detail_service')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('service_id')
                ->references('id')
                ->on('service')
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
        Schema::dropIfExists('detail_info_service');
    }
}
