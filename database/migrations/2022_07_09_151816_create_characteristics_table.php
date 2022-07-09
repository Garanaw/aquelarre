<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Characteristic\CharacteristicSeeder;

return new class extends Migration
{
    protected array $seeders = [
        CharacteristicSeeder::class,
    ];

    protected ?string $table = 'characteristics';

    public function up(): void
    {
        $this->schema->create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->char('prefix', 3);
            $table->string('latin', 15)->nullable();
            $table->boolean('primary')->index('index_characteristic_primary');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists($this->table);
    }
};
