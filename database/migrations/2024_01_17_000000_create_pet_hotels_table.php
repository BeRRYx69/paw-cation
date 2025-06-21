<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('pet_hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('pet_name');
            $table->enum('pet_type', ['dog', 'cat']);
            $table->string('pet_breed')->nullable();
            $table->integer('pet_age');
            $table->text('special_notes')->nullable();
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->enum('room_type', ['standard', 'deluxe', 'premium']);
            $table->enum('status', ['pending', 'confirmed', 'checked_in', 'checked_out', 'cancelled'])->default('pending');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pet_hotels');
    }
} 