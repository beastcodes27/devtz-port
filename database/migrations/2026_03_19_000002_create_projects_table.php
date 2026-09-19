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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name');
            $table->string('category'); // web, mobile, cloud, ai
            $table->string('tagline');
            $table->text('summary');
            $table->longText('challenge');
            $table->longText('solution');
            $table->string('banner_image')->nullable();
            $table->string('live_url')->nullable();
            $table->string('github_url')->nullable();
            $table->json('tech_stack');
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
