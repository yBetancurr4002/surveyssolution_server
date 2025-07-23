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
        Schema::create('response_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('response_id')->nullable(); // Relación con responses


            $table->string('option_key');
            $table->string('option_value');

            $table->integer('order_index')->default(0);

            $table->timestamps();

            $table->index('response_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('response_options');
    }
};
