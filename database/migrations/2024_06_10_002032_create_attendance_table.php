<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enrollment_id');
            $table->unsignedBigInteger('class_id');
            $table->enum('attendance_status', ['present', 'absent', 'excused'])->default('absent');
            $table->timestamps(); // Adds created_at and updated_at columns

            // Define foreign key constraints
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
    }
};
