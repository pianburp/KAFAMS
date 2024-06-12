<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->enum('assessment_type', ['exam', 'project', 'quiz', 'assignment', 'presentation']); // Adjust types as needed
            $table->text('description');
            $table->date('due_date');
            $table->timestamps(); // Adds created_at and updated_at columns

            // Define foreign key constraint
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assessments');
    }
};
