<?php

declare(strict_types=1);

use App\Books\Infrastructure\Models\Book;
use App\Game\Core\Features\Spells\Form\Infrastructure\Models\SpellForm;
use App\Game\Core\Features\Spells\Nature\Infrastructure\Models\SpellNature;
use App\Game\Core\Features\Spells\Origin\Infrastructure\Models\SpellOrigin;
use Database\Seeders\Game\Core\Features\Spell\FormSeeder;
use Database\Seeders\Game\Core\Features\Spell\NatureSeeder;
use Database\Seeders\Game\Core\Features\Spell\OriginSeeder;
use Database\Seeders\Game\Core\Features\Spell\SpellSeeder;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    protected ?string $table = 'spells';

    public function up(): void
    {
        $this->createSpellFormsTable();
        $this->createSpellNaturesTable();
        $this->createSpellOriginsTable();
        $this->createSpellsTable();
    }

    private function createSpellFormsTable(): void
    {
        $this->schema->create(table: 'spell_forms', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 30);
            $table->string(column: 'latin', length: 20)->nullable();
            $table->text(column: 'description');
        });
    }

    private function createSpellNaturesTable(): void
    {
        $this->schema->create(table: 'spell_natures', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 30)->unique();
            $table->text(column: 'description');
        });
    }

    private function createSpellOriginsTable(): void
    {
        $this->schema->create(table: 'spell_origins', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 50)->unique();
            $table->text(column: 'description');
        });
    }

    private function createSpellsTable(): void
    {
        $this->schema->create(table: $this->getTable(), callback: function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('latin', 150)->nullable()->default(null);
            $table->unsignedTinyInteger('vis')->index();
            $table->foreignIdFor(SpellForm::class)->constrained();
            $table->foreignIdFor(SpellNature::class)->constrained();
            $table->foreignIdFor(SpellOrigin::class)->constrained();
            $table->foreignIdFor(Book::class)->constrained();
            $table->boolean('use_faith')->default(false);
            $table->string('expiration', 200)->nullable();
            $table->string('duration', 650);
            $table->string('components', 500);
            $table->string('preparation', 2000);
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
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
            FormSeeder::class,
            NatureSeeder::class,
            OriginSeeder::class,
            SpellSeeder::class,
        ]);
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
        $this->schema->dropIfExists(table: 'spell_origins');
        $this->schema->dropIfExists(table: 'spell_natures');
        $this->schema->dropIfExists(table: 'spell_forms');
    }
};
