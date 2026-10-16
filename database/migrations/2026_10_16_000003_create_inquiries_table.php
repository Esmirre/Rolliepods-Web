<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id('inquiry_id');
            $table->unsignedBigInteger('tenant_id');
            $table->string('subject', 200);
            $table->text('message');
            $table->string('inquiry_type', 50);
            $table->string('status', 30)->default('pending');
            $table->text('admin_response')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();

            $table->foreign('tenant_id')
                ->references('user_id')
                ->on('users')
                ->cascadeOnDelete();
            $table->index('status');
            $table->index('inquiry_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
