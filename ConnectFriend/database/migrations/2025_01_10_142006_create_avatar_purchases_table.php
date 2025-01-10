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
        Schema::create('avatar_purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('AvatarID');
            $table->unsignedBigInteger('FriendID');
            $table->foreign('AvatarID')->references('id')->on('avatars');
            $table->foreign('FriendID')->references('id')->on('friends');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatar_purchases');
    }
};
