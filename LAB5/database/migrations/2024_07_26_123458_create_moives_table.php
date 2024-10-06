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
        Schema::create('moives', function (Blueprint $table) {
            $table->id();
            $table->string('title',225);
            $table->string('poster',225)->nullable();
            $table->string('intro',225);
            $table->date('release_date');
            $table->foreignId('genre_id')->constrained('genes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moives');
    }
};
