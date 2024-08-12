<?php

declare(strict_types=1);

use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $this->schema->create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        $this->schema->create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('cache');
        $this->schema->dropIfExists('cache_locks');
    }

    public function getTable(): string
    {
        return 'cache';
    }
};
