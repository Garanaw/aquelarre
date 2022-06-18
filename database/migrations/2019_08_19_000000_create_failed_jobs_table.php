<?php

declare(strict_types=1);

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint;
use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $this->schema->create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('failed_jobs');
    }
};
