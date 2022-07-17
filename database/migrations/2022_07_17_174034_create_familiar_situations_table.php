<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\FamiliarSituation\FamiliarSituationSeeder;

return new class extends Migration
{
    protected ?string $table = 'familiar_situations';

    protected array $seeders = [
        FamiliarSituationSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name')->nullable();
            $table->string(column: 'father');
            $table->string(column: 'mother');
            $table->boolean(column: 'siblings')->comment('/* 1 = roll to set how many */');
            $table->boolean(column: 'bastard');
            $table->boolean(column: 'tutor')->comment('/* 0 = no, 1 = present if father === 0|2 */');
            $table->string(column: 'description', length: 200);
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
