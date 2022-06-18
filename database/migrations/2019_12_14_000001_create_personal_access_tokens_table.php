<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;

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
            $table->timestamps();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('personal_access_tokens');
    }
};
