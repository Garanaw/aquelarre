<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\FamiliarSituation\MarriageSeeder;

return new class extends Migration
{
    protected ?string $table = 'marriages';

    protected array $seeders = [
        MarriageSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'status');
            $table->boolean(column: 'dead');
            $table->boolean(column: 'missing');
            $table->string(column: 'description', length: 255);
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
