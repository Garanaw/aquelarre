<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Spell\SpellFormsSeeder;
use Database\Seeders\Spell\SpellNaturesSeeder;
use Database\Seeders\Spell\SpellOriginsSeeder;
use Database\Seeders\Spell\SpellsSeeder;

return new class extends Migration
{
    protected ?string $table = 'spells';

    protected array $seeders = [
        SpellFormsSeeder::class,
        SpellNaturesSeeder::class,
        SpellOriginsSeeder::class,
        SpellsSeeder::class,
    ];

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
        $this->schema->create(table: $this->table, callback: function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('latin', 150)->nullable()->default(null);
            $table->unsignedTinyInteger('vis')->index();
            $table->foreignId('spell_form_id')->constrained('spell_forms');
            $table->foreignId('spell_nature_id')->constrained('spell_natures');
            $table->foreignId('spell_origin_id')->constrained('spell_origins');
            $table->foreignId('book_id')->constrained('books');
            $table->boolean('use_faith')->default(false);
            $table->string('expiration', 200)->nullable();
            $table->string('duration', 650);
            $table->string('components', 500);
            $table->string('preparation', 2000);
            $table->text('description');

        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
        $this->schema->dropIfExists(table: 'spell_origins');
        $this->schema->dropIfExists(table: 'spell_natures');
        $this->schema->dropIfExists(table: 'spell_forms');
    }
};
