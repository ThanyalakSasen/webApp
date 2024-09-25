<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->id();
            $table->string('parking_type');
            $table->string('vehicle_type');
            $table->string('parking_spot');
            $table->date('parking_date_in')->nullable();
            $table->date('parking_date_out')->nullable();
            $table->time('parking_time_in')->nullable();
            $table->time('parking_time_out')->nullable();
            $table->integer('parking_duration_monthly')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropSoftDeletes();
        //
    }
};
