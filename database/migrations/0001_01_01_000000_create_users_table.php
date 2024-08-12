<?php

declare(strict_types=1);

use App\User\Infrastructure\Models\User;
use Garanaw\SeedableMigrations\Blueprint;
use Garanaw\SeedableMigrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        $this->schema->create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        $this->schema->create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignIdFor(User::class)->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        $this->schema->create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id');
            $table->text('bio')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('user_profiles');
        $this->schema->dropIfExists('users');
        $this->schema->dropIfExists('password_reset_tokens');
        $this->schema->dropIfExists('sessions');
    }

    public function getTable(): string
    {
        return 'users';
    }
};
