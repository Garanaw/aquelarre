<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Database\Seeders\Core\Book\BooksTableSeeder;

return new class extends Migration
{
    protected array $seeders = [
        BooksTableSeeder::class,
    ];

    public function up(): void
    {
        $this->schema->create(table: 'books', callback: static function (Blueprint $table): void {
            $table->id();
            $table->string(column: 'name', length: 200)->index();
            $table->string(column: 'type');
            $table->unsignedInteger(column: 'edition');
            $table->string(column: 'editorial', length: 100)->nullable();
            $table->string(column: 'isbn10')->nullable();
            $table->string(column: 'isbn13')->nullable();
            $table->string(column: 'editorial_code')->nullable();
            $table->date(column: 'published_at')->nullable();
            $table->string(column: 'url', length: 250)->nullable();
            $table->text(column: 'comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists(table: 'books');
    }
};
