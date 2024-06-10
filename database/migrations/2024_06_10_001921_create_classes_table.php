<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('instructor_id');
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Allow null for ongoing classes
            $table->string('location');
            $table->timestamps(); // Adds created_at and updated_at columns

            // Define foreign key constraints
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
