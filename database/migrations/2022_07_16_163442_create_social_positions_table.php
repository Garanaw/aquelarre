<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\SocialPosition\SocialPositionSeeder;

return new class extends Migration
{
    protected ?string $table = 'social_positions';

    protected array $seeders = [
        SocialPositionSeeder::class
    ];

    public function up(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->foreignId(column: 'society_id')->constrained(table: 'societies');
            $table->boolean(column: 'has_title')->default(false);
            $table->text(column: 'description');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: $this->table);
    }
};
