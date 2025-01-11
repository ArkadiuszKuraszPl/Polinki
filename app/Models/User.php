<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
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
        'name_changed_at' => 'datetime',
    ];

        /**
     * Automatyczne ustawianie sluga przy tworzeniu użytkownika.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->slug = Str::slug($user->name); // Tworzenie sluga przy rejestracji
        });
    }

    /**
     * Ustawianie nowej nazwy użytkownika z ograniczeniem czasu.
     */
    public function updateName(string $newName): void
    {
        if ($this->canChangeName()) {
            $this->name = $newName;
            $this->slug = Str::slug($newName); // Aktualizacja sluga
            $this->name_changed_at = now();   // Aktualizacja czasu zmiany
            $this->save();
        } else {
            throw new \Exception('Name can only be changed once every 1 days.');
        }
    }

    /**
     * Sprawdza, czy można zmienić nazwę użytkownika.
     */
    public function canChangeName(): bool
    {
        return is_null($this->name_changed_at) || $this->name_changed_at->diffInDays(now()) >= 1;
    }
}
