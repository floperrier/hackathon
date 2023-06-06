<?php

use App\Enums\YearsExperienceEnum;
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
        Schema::create('languages_ranks', function (Blueprint $table) {
            $table->id();
            $table->string('language_name')->nullable();
            $table->string('rank_name')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('score')->nullable();
            $table->enum('years_of_experience', YearsExperienceEnum::values())->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('codewars_username')->nullable();
            $table->integer('codewars_score')->nullable();
            $table->boolean('initiated')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages_ranks');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('codewars_username');
            $table->dropColumn('codewars_score');
        });
    }
};
