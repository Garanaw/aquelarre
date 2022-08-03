<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Professions\WagesSeeder;

return new class extends Migration
{
    protected ?string $table = 'wages';

    protected array $seeders = [
        WagesSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId('profession_id')->constrained('professions');
            $table->foreignId('social_position_id')->constrained('social_positions');
            $table->foreignId('title_id')->nullable()->constrained();
            $table->unsignedInteger('maravedies')->nullable();
            $table->foreignId('characteristic_id')->nullable()->constrained('characteristics');
            $table->foreignId('first_competence_id')->nullable()->constrained('competences');
            $table->foreignId('second_competence_id')->nullable()->constrained('competences');
            $table->foreignId('third_competence_id')->nullable()->constrained('competences');
            $table->string('operation')->nullable();
            $table->integer('multiplier')->nullable()->default(1);
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
