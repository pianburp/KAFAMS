<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enrollment_id');
            $table->decimal('amount', 10, 2); 
            $table->enum('payment_method', ['cash', 'online', 'check', 'other']); // Adjust as needed
            $table->date('payment_date');
            $table->timestamps(); // Adds created_at and updated_at columns

            // Define foreign key constraint
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
