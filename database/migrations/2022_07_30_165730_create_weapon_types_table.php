<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Weapons\WeaponTypesSeeder;

return new class extends Migration
{
    protected ?string $table = 'weapon_types';

    protected array $seeders = [
        WeaponTypesSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId('competence_id')->constrained('competences');
            $table->boolean('villain');
            $table->boolean('soldier');
            $table->boolean('noble');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
