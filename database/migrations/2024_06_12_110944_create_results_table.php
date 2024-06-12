<?php

// database/migrations/xxxx_xx_xx_create_results_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('assessment_id')->constrained()->onDelete('cascade');
            $table->float('score');
            $table->enum('grade', ['A', 'B', 'C', 'D', 'F']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['assessment_id']);
        });
        Schema::dropIfExists('results');
    }
}
