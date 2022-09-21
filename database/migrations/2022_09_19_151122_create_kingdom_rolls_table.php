<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Kingdom\RollsSeeder;

return new class extends Migration
{
    protected ?string $table = 'kingdom_rolls';

    protected array $seeders = [
        RollsSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'kingdom_id')->constrained();
            $table->smallInteger(column: 'min_roll');
            $table->smallInteger(column: 'max_roll');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
