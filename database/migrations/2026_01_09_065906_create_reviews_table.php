<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accommodation_id')->nullable();
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->string('reviewer_name');
            $table->integer('rating');
            $table->text('comment');
            $table->timestamps();
            
            $table->foreign('accommodation_id')->references('id')->on('accommodations')->onDelete('cascade');
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};