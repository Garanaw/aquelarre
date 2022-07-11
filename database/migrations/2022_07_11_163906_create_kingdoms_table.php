<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Kingdom\KingdomSeeder;

return new class extends Migration
{
    protected ?string $table = 'kingdoms';

    protected array $seeders = [
        KingdomSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->boolean('peninsular')->default(false);
            $table->text('description')->nullable();
            $table->foreignId('book_id')->constrained('books');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists($this->table);
    }
};
