<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\People\PeopleLanguagesSeeder;

return new class extends Migration
{
    protected ?string $table = 'language_people';

    protected array $seeders = [
        PeopleLanguagesSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'people_id')->constrained(table: 'people');
            $table->foreignId(column: 'competence_id')->constrained(table: 'competences');
            $table->unsignedInteger(column: 'points')->nullable();
            $table->unsignedInteger(column: 'cul')->nullable();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
