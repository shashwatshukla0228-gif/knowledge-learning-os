<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->enum('type', [
                'article',
                'youtube',
                'pdf',
                'note',
            ]);

            $table->string('source_url')->nullable();

            $table->text('description')->nullable();

            $table->longText('content')->nullable();

            $table->enum('status', [
                'unread',
                'reading',
                'completed',
            ])->default('unread');

            $table->boolean('is_favorite')->default(false);

            $table->softDeletes();

            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
