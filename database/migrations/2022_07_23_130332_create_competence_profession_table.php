<?php

declare(strict_types=1);

use Aquelarre\Core\Competences\Domain\Enum\Order;
use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Professions\CompetenceProfessionSeeder;

return new class extends Migration
{
    protected ?string $table = 'competence_profession';

    protected array $seeders = [
        CompetenceProfessionSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'profession_id')->constrained(table: 'professions');
            $table->foreignId(column: 'competence_id')->constrained(table: 'competences');
            $table->string(column: 'order', length: 10)->default(Order::PRIMARY->value);
            $table->tinyInteger(column: 'quantity')->unsigned()->default(1);
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
