<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Professions\ProfessionSocialPositionSeeder;

return new class extends Migration
{
    protected ?string $table = 'profession_social_position';

    protected array $seeders = [
        ProfessionSocialPositionSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'profession_id')->constrained(table: 'professions');
            $table->foreignId(column: 'society_id')->constrained(table: 'societies');
            $table->foreignId(column: 'social_position_id')->constrained(table: 'social_positions');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
