<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Professions\CharacteristicProfessionSeeder;

return new class extends Migration
{
    protected ?string $table = 'characteristic_profession';

    protected array $seeders = [
        CharacteristicProfessionSeeder::class
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'profession_id')->constrained(table: 'professions');
            $table->foreignId(column: 'characteristic_id')->constrained(table: 'characteristics');
            $table->smallInteger(column: 'min_value')->unsigned();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
