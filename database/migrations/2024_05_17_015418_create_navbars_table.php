<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('navbars', function (Blueprint $table) {
            $table->id();
            $table->string('firstManus')->nullable();
            $table->string('secondManus')->nullable();
            $table->string('thirdManus')->nullable();
            $table->string('fourthManus')->nullable();
            $table->string('fifthManus')->nullable();
            $table->string('sixthManus')->nullable();
            $table->string('seventhManus')->nullable();
            $table->string('eighthManus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbars');
    }
};
