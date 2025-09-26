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
        Schema::create('clampings', function (Blueprint $table) {
        $table->id();
        $table->string('ticket_no')->unique();
        $table->string('plate_no');
        $table->string('reason');
        $table->string('location');
        $table->dateTime('date_clamped');
        $table->string('status')->default('Active'); // Active / Released
        $table->string('photo')->nullable(); // store image path
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clampings');
    }
};
