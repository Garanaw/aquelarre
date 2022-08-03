<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\SocialPosition\ExpensesSeeder;

return new class extends Migration
{
    protected ?string $table = 'expenses';

    protected array $seeders = [
        ExpensesSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'social_position_id')->constrained(table: 'social_positions');
            $table->unsignedSmallInteger(column: 'week_spense');
            $table->unsignedSmallInteger(column: 'spense_per_kid');
            $table->unsignedSmallInteger(column: 'average_monthly_incoming');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
