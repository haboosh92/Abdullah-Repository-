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
        Schema::create('researcher_information', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->index();
            $table->string('name')->nullable();
            $table->string('certificate')->nullable();
            $table->string('scientificTitle')->nullable();
            $table->foreignId('departments_id')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researcher_information');
    }
};
