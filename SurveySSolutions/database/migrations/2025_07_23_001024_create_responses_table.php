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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_id');
            $table->unsignedBigInteger('question_id');

            $table->text('response_value')->nullable();
            $table->decimal('response_numeric', 15, 4)->nullable(); // Para números
            $table->boolean('response_boolean')->nullable();
            $table->date('response_date')->nullable();
            $table->timestamps();


            $table->index('survey_id');
            $table->index('question_id');
            $table->index(['survey_id', 'question_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
