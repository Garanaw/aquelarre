<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Infrastructure\Models;

use Aquelarre\Core\Books\Infrastructure\ModelRelations\BelongsToManyBooks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property UserProfile $profile
 * @property \Illuminate\Database\Eloquent\Collection $books
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;
    use BelongsToManyBooks;

    /** @var array<int, string> */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint -- baseline
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    /** @var array<int, string> */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint -- baseline
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint -- baseline
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(related: UserProfile::class);
    }

    public function isAuthorized(): bool
    {
        return $this->hasRole(roles: 'admin');
    }
}
