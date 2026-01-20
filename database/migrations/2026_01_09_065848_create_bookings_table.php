<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accommodation_id')->nullable();
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->date('booking_date');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->foreign('accommodation_id')->references('id')->on('accommodations')->onDelete('cascade');
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};