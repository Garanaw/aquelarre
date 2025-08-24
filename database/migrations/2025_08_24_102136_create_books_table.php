<?php

declare(strict_types=1);

use Database\Seeders\Book\BookSeeder;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    protected ?string $table = 'books';

    public function up(): void
    {
        $this->schema->create(table: $this->getTable(), callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 200)->index();
            $table->string(column: 'type');
            $table->unsignedInteger(column: 'edition');
            $table->string(column: 'editorial', length: 100)->nullable();
            $table->string(column: 'isbn10')->nullable();
            $table->string(column: 'isbn13')->nullable();
            $table->string(column: 'editorial_code')->nullable();
            $table->date(column: 'published_at')->nullable();
            $table->string(column: 'url', length: 250)->nullable();
            $table->text(column: 'comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function upSeeders(): Collection
    {
        return collect([
            BookSeeder::class,
        ]);
    }

    public function seedAt(): SeedAt
    {
        return SeedAt::EACH;
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
    }
};
