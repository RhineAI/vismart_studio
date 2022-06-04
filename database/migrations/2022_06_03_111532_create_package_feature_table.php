<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_feature', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('feature_id');
            $table->timestamps();

            $table->foreign('package_id')
                  ->references('id')
                  ->on('package')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('feature_id')
                  ->references('id')
                  ->on('package')
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
        Schema::dropIfExists('package_feature');
    }
}
