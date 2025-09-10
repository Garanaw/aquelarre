<?php

declare(strict_types=1);

use App\Game\Core\Features\Kingdom\Infrastructure\Models\Kingdom;
use Database\Seeders\Game\Roll\KingdomRolls;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    protected ?string $table = 'kingdom_rolls';

    public function up(): void
    {
        $this->schema->create(table: $this->getTable(), callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kingdom::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->smallInteger(column: 'min_roll');
            $table->smallInteger(column: 'max_roll');
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
            KingdomRolls::class,
        ]);
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
    }
};
