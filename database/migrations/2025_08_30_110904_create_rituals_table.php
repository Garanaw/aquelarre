<?php

declare(strict_types=1);

use App\Books\Infrastructure\Models\Book;
use Database\Seeders\Game\Core\Features\Ritual\RitualsSeeder;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    protected ?string $table = 'rituals';

    public function up(): void
    {
        $this->schema->create(table: $this->getTable(), callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 25);
            $table->string(column: 'latin', length: 25)->nullable();
            $table->text(column: 'ceremony');
            $table->string(column: 'duration', length: 100);
            $table->unsignedSmallInteger(column: 'ordo');
            $table->string(column: 'effects', length: 4500);
            $table->foreignIdFor(Book::class)->constrained();
        });
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function seedAt(): SeedAt
    {
        return SeedAt::EACH;
    }

    public function upSeeders(): Collection
    {
        return collect([
            RitualsSeeder::class,
        ]);
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
    }
};
