<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\People\PeopleSeeder;

return new class extends Migration
{
    protected ?string $table = 'people';

    protected array $seeders = [
        PeopleSeeder::class
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name')->index();
            $table->foreignId(column: 'book_id')->constrained(table: 'books');
            $table->text(column: 'description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
