<?php

declare(strict_types=1);

use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $this->schema->create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('personal_access_tokens');
    }

    public function getTable(): string
    {
        return 'personal_access_tokens';
    }
};
