<?php

declare(strict_types=1);

use App\Books\Infrastructure\Models\Book;
use App\User\Infrastructure\Models\User;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;

return new class extends Migration
{
    protected ?string $table = 'book_user';

    public function up(): void
    {
        $this->schema->create(table: $this->getTable(), callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();

            $table->unique(columns: ['book_id', 'user_id']);
        });
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function seedAt(): SeedAt
    {
        return SeedAt::NEVER;
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
    }
};
