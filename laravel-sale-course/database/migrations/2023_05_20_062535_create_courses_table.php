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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->string('author');
            $table->string('price');
            $table->string('sale_price')->nullable();
            $table->text('image');
            $table->string('category');
            $table->text('description');
            $table->enum('status' , [0,1]);
            $table->enum('course_status' , [0,1]);
            $table->enum('type' , ['نقدی' , 'رایگان']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
