<?php

declare(strict_types=1);

use Database\Seeders\Game\Core\Features\SkillsSeeder;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Enum\SeedAt;
use Garanaw\SeedableMigrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    protected ?string $table = 'skills';

    public function up(): void
    {
        $this->schema->create(table: $this->getTable(), callback: static function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->index();
            $table->string('latin', 20)->nullable();
            $table->foreignId('characteristic_id')->constrained('characteristics');
            $table->boolean('is_weapon')->default(false);
            $table->boolean('is_language')->default(false);
            $table->boolean('initial')->default(1);
            $table->boolean('starts_with_base')->default(true);
            $table->foreignId('book_id')->nullable()->constrained('books');
            $table->foreignId('created_by')->nullable()->default(null)->constrained('users');
            $table->text('description');
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
            SkillsSeeder::class,
        ]);
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->getTable());
    }
};
