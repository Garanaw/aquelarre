<?php

declare(strict_types=1);

use App\Books\Infrastructure\Models\Book;
use Database\Seeders\Game\Core\Features\Profession\ProfessionsSeeder;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    protected ?string $table = 'professions';

    public function up(): void
    {
        $this->schema->create(table: $this->getTable(), callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 75);
            $table->boolean(column: 'man');
            $table->boolean(column: 'woman');
            $table->boolean(column: 'has_faith')->default(false);
            $table->boolean(column: 'only_secondary')->default(false);
            $table->foreignIdFor(Book::class)->constrained();
            $table->text(column: 'description');
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
            ProfessionsSeeder::class,
        ]);
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
    }
};
