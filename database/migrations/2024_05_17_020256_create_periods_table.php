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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('No');
            $table->string('position');
            $table->string('firstPeriod');
            $table->string('secondPeriod');
            $table->string('thirdPeriod');
            $table->string('fourthPeriod');
            $table->string('fifthPeriod');
            $table->string('sixthPeriod');
            $table->string('seventhPeriod');
            $table->string('eighthPeriod');
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};
