<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\People\PeopleSocialPositionSeeder;

return new class extends Migration
{
    protected ?string $table = 'people_social_position';

    protected array $seeders = [
        PeopleSocialPositionSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId('people_id')->constrained('people');
            $table->foreignId('social_position_id')->constrained('social_positions');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
