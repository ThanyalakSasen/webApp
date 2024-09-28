<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->id();
            $table->string("shippingType");
            $table->string("vehicleType");
            $table->string('license_plate');
            $table->dateTime("dateEntry");
            $table->dateTime("dateExit");
            $table->integer('duration'); 
        
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboards'); // Drop the dashboards table
        // No need to drop soft deletes here
    }
};
