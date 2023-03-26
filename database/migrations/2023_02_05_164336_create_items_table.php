<?php

declare(strict_types=1);

use Aquelarre\Commerce\Enum\Currency;
use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Commerce\EquipablesSeeder;
use Database\Seeders\Commerce\ItemsSeeder;
use Database\Seeders\Commerce\PoisonsSeeder;
use Database\Seeders\Commerce\PricesSeeder;

return new class extends Migration
{
    protected array $seeders = [
        ItemsSeeder::class,
        EquipablesSeeder::class,
        PoisonsSeeder::class,
        PricesSeeder::class,
    ];

    protected ?string $table = 'items';

    public function up(): void
    {
        $this->createItems();
        $this->createWeapons();
        $this->createArmors();
        $this->createShields();
        $this->createPoisons();
        $this->createPrices();
    }

    private function createItems(): void
    {
        $this->schema->create(table: $this->table, callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'type');
            $table->string(column: 'family')->nullable();
            $table->string(column: 'origin')->nullable();
            $table->string(column: 'material')->nullable();
            $table->unsignedMediumInteger(column: 'weight')->nullable()->default(null);
            $table->boolean(column: 'is_wearable')->default(false);
            $table->boolean(column: 'is_consumable')->default(false);
            $table->boolean(column: 'is_storable')->default(false);
            $table->boolean(column: 'is_container')->default(false);
            $table->foreignId(column: 'book_id')->nullable()->constrained();
            $table->foreignId(column: 'created_by')->nullable()->default(null)->constrained(table: 'users');
            $table->bigInteger(column: 'created_for')
                ->nullable()
                ->default(null)
                ->comment('Will refer to Modules when implemented');
            $table->text(column: 'description');
        });
    }

    private function createWeapons(): void
    {
        $this->schema->create(table: 'weapons', callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'item_id')->constrained(table: 'items');
            $table->foreignId(column: 'weapon_type_id')->constrained(table: 'weapon_types');
            $table->unsignedSmallInteger(column: 'strength')
                ->comment('the required strength to brandish the weapon');
            $table->string(column: 'size');
            $table->unsignedSmallInteger(column: 'assaults_to_reload')->nullable()->default(null);
            $table->string(column: 'damage', length: 10)->nullable()->default(null);
            $table->unsignedSmallInteger(column: 'bonus')->default(0);
            $table->string(column: 'range', length: 15)->nullable()->default(null);
            $table->foreignId(column: 'created_by')->nullable()
                ->comment('this will be private for the creator/party. To make it public, set this to null')
                ->default(null)
                ->constrained(table: 'users');
        });
    }

    private function createArmors(): void
    {
        $this->schema->create(table: 'armors', callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'item_id')->constrained(table: 'items');
            $table->string(column: 'type', length: 15)->default('blando');
            $table->smallInteger(column: 'protection')->unsigned();
            $table->smallInteger(column: 'resistance')->unsigned();
            $table->smallInteger(column: 'strength')->unsigned()->nullable();
            $table->foreignId(column: 'created_by')->nullable()->constrained(table: 'users');
        });
    }

    private function createShields(): void
    {
        $this->schema->create(table: 'shields', callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'item_id')->constrained(table: 'items');
            $table->unsignedSmallInteger(column: 'resistance');
            $table->unsignedSmallInteger(column: 'strength');
            $table->string(column: 'max_absorbed_damage', length: 10)->nullable();
            $table->foreignId(column: 'created_by')->nullable()->constrained(table: 'users');
        });
    }

    private function createPoisons(): void
    {
        $this->schema->create(table: 'poisons', callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'item_id')->constrained(table: 'items');
            $table->unsignedSmallInteger(column: 'resistance_roll');
            $table->unsignedSmallInteger(column: 'damage')->nullable();
            $table->unsignedSmallInteger(column: 'rollover_time')->nullable();
            $table->string(column: 'rollover_time_unit')->nullable();
            $table->unsignedSmallInteger(column: 'death_time')->nullable();
            $table->string(column: 'death_unit')->nullable();
            $table->text(column: 'effects');
        });
    }

    private function createPrices(): void
    {
        $this->schema->create(table: 'prices', callback: static function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'item_id')->constrained(table: 'items');
            $table->unsignedInteger(column: 'amount');
            $table->string(column: 'currency')->default(Currency::MARAVEDI->value);
            $table->text(column: 'description')->nullable();

            $table->unique('item_id');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: 'prices');
        $this->schema->dropIfExists(table: 'poisons');
        $this->schema->dropIfExists(table: 'shields');
        $this->schema->dropIfExists(table: 'armors');
        $this->schema->dropIfExists(table: 'weapons');
        $this->schema->dropIfExists(table: $this->table);
    }
};
