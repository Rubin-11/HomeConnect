<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * Атрибуты, которые можно массово присваивать.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firs_name',
        'last_name',
        'patronymic',
        'email',
        'password',
    ];

    /**
     * Атрибуты, которые должны быть скрыты для сериализации.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Атрибуты, которые должны быть приведены в действие.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Связь с типом пользователя.
    public function categoryUser(): HasOne
    {
        return $this->hasOne(CategoryUser::class);
    }

    // Связь с квартирами, один пользователь может иметь несколько квартир.
    public function flat(): HasMany
    {
        return $this->hasMany(Flat::class);
    }

    // Связь с заявками от пользователя, один пользователь имеет много заявок. 
    public function applicationFromUser(): HasMany
    {
        return $this->hasMany(ApplicationFromUser::class);
    }
}
