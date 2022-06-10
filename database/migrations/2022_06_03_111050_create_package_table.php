<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('feature_id');
            $table->string('name');
            $table->integer('price');
            $table->string('no_telp');
            $table->boolean('is_first');  
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
        Schema::dropIfExists('package');
    }
}
