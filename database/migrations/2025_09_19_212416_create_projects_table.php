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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('task');
            $table->string('url')->unique();
            $table->string('cover_url');
            $table->string('thumbnail_url');
            $table->string('full_site_url');
            $table->text('description');
            $table->string('client');
            $table->string('website');
            $table->string('github_url')->nullable();
            $table->string('color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
