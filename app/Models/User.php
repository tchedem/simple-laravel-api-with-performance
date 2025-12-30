<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    const PER_PAGE = 100;

    protected $guarded = [];

    public const ADMIN_CORE_ROLES = 'admin';
    public const USER_CORE_ROLES = 'user';
    public const EDITOR_CORE_ROLES = 'editor';
    public const VIEWER_CORE_ROLES = 'viewer';

    public const CORE_ROLES = [
        self::ADMIN_CORE_ROLES,
        self::USER_CORE_ROLES,
        self::EDITOR_CORE_ROLES,
        self::VIEWER_CORE_ROLES,
    ];

    protected $table = 'users';

    // protected $primaryKey = 'id';

    // protected $keyType = 'string';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'id',
        // 'email',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id', 'posts');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

}
