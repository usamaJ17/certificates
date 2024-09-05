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
        Schema::create('certificate_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->float('score')->default(0.0)->nullable();
            $table->unsignedBigInteger('certificate_id');
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_fields');
    }
};
