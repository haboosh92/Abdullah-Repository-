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
        Schema::create('research_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->index();
            $table->foreignId('research_id')->nullable()->index();

            $table->string('doi')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->text('abstract')->nullable();
            $table->string('type')->nullable();
            $table->string('journal_name')->nullable();
            $table->string('ISSN')->nullable();
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('pdf_link')->nullable();
            $table->json('authors')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_infos');
    }
};