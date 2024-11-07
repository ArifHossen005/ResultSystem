<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calculate_marks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger(column: 'result_id')->nullable();
            $table->foreign('result_id')->references('id')->on('results')
            ->restrictOnDelete()
            ->cascadeOnUpdate();

            $table->unsignedBigInteger(column: 'course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            
            $table->string(column: 'marks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculate_marks');
    }
};
