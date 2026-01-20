<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('driver_name');
            $table->string('vehicle_type');
            $table->string('vehicle_model');
            $table->string('license_plate');
            $table->string('city');
            $table->string('service_area');
            $table->decimal('price_per_km', 8, 2);
            $table->decimal('base_price', 8, 2);
            $table->integer('capacity');
            $table->boolean('is_available')->default(1);
            $table->string('contact_phone');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transports');
    }
};