<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_landing_page');  
            $table->boolean('is_info');  
            $table->boolean('is_previllege');  
            $table->boolean('is_jasa');  
            $table->boolean('is_portofolio');  
            $table->boolean('is_testimonial');  
            $table->boolean('is_package');  
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
        Schema::dropIfExists('setting');
    }
};
