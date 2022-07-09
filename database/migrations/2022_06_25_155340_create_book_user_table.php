<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $this->schema->create(table: 'book_user', callback: function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'book_id')->constrained(table: 'books');
            $table->foreignId(column: 'user_id')->constrained(table: 'users');
            $table->timestamps();

            $table->unique(columns: ['book_id', 'user_id']);
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('book_user');
    }
};
