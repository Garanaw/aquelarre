<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Society\SocietiesSeeder;
use Database\Seeders\Core\Society\TheologiesSeeder;

return new class extends Migration
{
    protected ?string $table = 'societies';

    protected array $seeders = [
        TheologiesSeeder::class,
        SocietiesSeeder::class,
    ];

    public function up(): void
    {
        $this->createTheologies();
        $this->createSocieties();
    }

    private function createTheologies(): void
    {
        $this->schema->create(table: 'theologies', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name')->index();
            $table->text(column: 'description')->nullable();
            $table->foreignId(column: 'book_id')->constrained(table: 'books');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    private function createSocieties(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name')->index();
            $table->text(column: 'description')->nullable();
            $table->foreignId(column: 'theology_id')->constrained(table: 'theologies');
            $table->foreignId(column: 'book_id')->constrained(table: 'books');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
