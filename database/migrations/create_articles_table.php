<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Theme;
use App\Models\Magazine;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->String('content');
            $table->string('status')->default('pending');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Theme::class);
            $table->foreignIdFor(Magazine::class)->nullable();
            $table->string('privacy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
