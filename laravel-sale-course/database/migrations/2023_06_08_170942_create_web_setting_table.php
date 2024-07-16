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
        Schema::create('web_setting', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->text('logo')->after('telegram_link')->nullable();
            $table->text('home_image')->after('telegram_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_setting');
    }
};
