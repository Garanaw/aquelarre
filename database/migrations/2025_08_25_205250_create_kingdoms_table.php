<?php

declare(strict_types=1);

use App\Books\Infrastructure\Models\Book;
use Database\Seeders\Game\Core\Features\Kingdom\KingdomSeeder;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    protected ?string $table = 'kingdoms';

    public function up(): void
    {
        $this->schema->create(table: $this->getTable(), callback: static function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->boolean('peninsular')->default(false);
            $table->text('description')->nullable();
            $table->foreignIdFor(Book::class)->constrained();
            $table->timestamps();
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
            KingdomSeeder::class,
        ]);
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
    }
};
