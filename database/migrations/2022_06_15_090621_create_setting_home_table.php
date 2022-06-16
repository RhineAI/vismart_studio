<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_home', function (Blueprint $table) {
            $table->id();
            $table->boolean('landing_page');
            $table->boolean('info');
            $table->boolean('logo_branding');
            $table->boolean('design_feed');
            $table->boolean('digital_marketing');
            $table->boolean('smm');
            $table->boolean('marketing_communications');
            $table->boolean('client');
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
        Schema::dropIfExists('setting_home');
    }
};
