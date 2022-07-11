<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Competences\CompetenceSeeder;

return new class extends Migration
{
    protected ?string $table = 'competences';

    protected array $seeders = [
        CompetenceSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->index();
            $table->string('latin', 20)->nullable();
            $table->foreignId('characteristic_id')->constrained('characteristics');
            $table->boolean('is_weapon')->default(false);
            $table->boolean('is_language')->default(false);
            $table->boolean('initial')->default(1);
            $table->boolean('starts_with_base')->default(true);
            $table->foreignId('book_id')->nullable()->constrained('books');
            $table->foreignId('created_by')->nullable()->default(null)->constrained('users');
            $table->text('description');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists($this->table);
    }
};
