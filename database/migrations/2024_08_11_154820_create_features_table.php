<?php

declare(strict_types=1);

use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $this->schema->create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scope');
            $table->text('value');
            $table->timestamps();

            $table->unique(['name', 'scope']);
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('features');
    }

    public function getTable(): string
    {
        return 'features';
    }
};
