<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id('announcement_id');
            $table->string('title', 255);
            $table->text('content');
            $table->string('image')->nullable();
            $table->enum('card_color', ['orange', 'blue', 'green'])->default('orange');
            $table->unsignedBigInteger('author_id');
            $table->boolean('is_published')->default(false);
            $table->timestamps();

            $table->foreign('author_id')
                ->references('user_id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
