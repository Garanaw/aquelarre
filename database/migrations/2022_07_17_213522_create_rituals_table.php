<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Rituals\RitualSeeder;

return new class extends Migration
{
    protected ?string $table = 'rituals';

    protected array $seeders = [
        RitualSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 25);
            $table->string(column: 'latin', length: 25)->nullable();
            $table->text(column: 'ceremony');
            $table->string(column: 'duration', length: 100);
            $table->unsignedSmallInteger(column: 'ordo');
            $table->string(column: 'effects', length: 4500);
            $table->foreignId(column: 'book_id')->constrained(table: 'books');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
