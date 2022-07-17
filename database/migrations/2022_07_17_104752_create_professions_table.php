<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Professions\ProfessionSeeder;

return new class extends Migration
{
    protected ?string $table = 'professions';

    protected array $seeders = [
        ProfessionSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 75);
            $table->boolean(column: 'man');
            $table->boolean(column: 'woman');
            $table->boolean(column: 'has_faith')->default(false);
            $table->boolean(column: 'only_secondary')->default(false);
            $table->foreignId(column: 'book_id')->constrained(table: 'books');
            $table->text(column: 'description');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
