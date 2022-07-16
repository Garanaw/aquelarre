<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\SocialPosition\TitleSeeder;

return new class extends Migration
{
    protected ?string $table = 'titles';

    protected array $seeders = [
        TitleSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'social_position_id')->constrained(table: 'social_positions');
            $table->string(column: 'name', length: 30);
            $table->string(column: 'description', length: 255);
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
