<?php

declare(strict_types=1);

use Database\Seeders\Game\Core\Features\FamiliarSituation\FamiliarSituationSeeder;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    protected ?string $table = 'familiar_situations';

    public function up(): void
    {
        $this->schema->create(table: $this->getTable(), callback: static function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->char('father', 10)->comment('/* 0 = dead, 1 = alive, 2 = unknown */');
            $table->char('mother', 10)->comment('/* 0 = dead, 1 = alive, 2 = unknown */');
            $table->boolean('siblings')->comment('/* 1 = roll to set how many */');
            $table->boolean('bastard');
            $table->boolean('tutor')->comment('/* 0 = no, 1 = present if father is dead */');
//            $table->boolean('min_roll');
//            $table->boolean('max_roll');
//            $table->integer('min_roll_bastard')->nullable();
//            $table->integer('max_roll_bastard')->nullable();
            $table->string('description', 200);
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
            FamiliarSituationSeeder::class,
        ]);
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
    }
};
