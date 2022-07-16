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
        $this->schema->create('theologies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->foreignId('book_id')->constrained('books');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    private function createSocieties(): void
    {
        $this->schema->create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->foreignId('theology_id')->constrained('theologies');
            $table->foreignId('book_id')->constrained('books');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists($this->table);
    }
};
