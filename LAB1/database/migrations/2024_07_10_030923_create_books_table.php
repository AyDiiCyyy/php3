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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('thumbnail',2000);
            $table->string('author',200);
            $table->string('publisher',200);
            $table->dateTime('Publication');
            $table->double('Price',8,2);
            $table->integer('Quantity')->unsigned();
            $table->unsignedInteger('Category_id');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
