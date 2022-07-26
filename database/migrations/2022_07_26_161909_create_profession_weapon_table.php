<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Professions\WeaponProfessionSeeder;

return new class extends Migration
{
    protected ?string $table = 'profession_weapon';

    protected array $seeders = [
        WeaponProfessionSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'profession_id')->constrained(table: 'professions');
            $table->unsignedSmallInteger(column: 'quantity');
            $table->string(column: 'order');
            $table->boolean(column: 'villain')->default(false);
            $table->boolean(column: 'soldier')->default(false);
            $table->boolean(column: 'noble')->default(false);
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
