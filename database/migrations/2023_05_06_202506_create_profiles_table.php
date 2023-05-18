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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

//            $table->unsignedBigInteger('user_id')->unique();
//            $table->string('name');
//            $table->string('email')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('username');
            $table->string('location');
            $table->text('short_intro');
            $table->text('bio');
            $table->string('profile_image');
            $table->string('social_github');
            $table->string('social_linkedin');
            $table->string('social_twitter');
            $table->string('social_youtube');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
