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
        Schema::create('visual_migrator_entries', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('key'); // table name or other keys
            $table->string('type')->default('layout'); // layout, meta, etc.
            $table->json('content');
            $table->timestamps();

            $table->unique(['key', 'type']);
            $table->index(['key', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visual_migrator_entries');
    }
};
