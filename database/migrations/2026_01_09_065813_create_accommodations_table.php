<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->string('city');
            $table->string('district');
            $table->text('address');
            $table->decimal('price_monthly', 10, 2);
            $table->integer('capacity');
            $table->boolean('is_available')->default(1);
            $table->string('contact_phone');
            $table->string('contact_email')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accommodations');
    }
};