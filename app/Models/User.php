<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'birth_date',
        'address',
        'city',
        'state',
        'zip_code',
        'google_id',
        'avatar',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'phone' => 'encrypted',
            'address' => 'encrypted',
            'zip_code' => 'encrypted',
        ];
    }

    /**
     * Get the wishlist items for the user.
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Procurar utilizador por telefone encriptado
     */
    public static function findByPhone($phone)
    {
        return static::all()->filter(function ($user) use ($phone) {
            return $user->phone === $phone;
        })->first();
    }

    /**
     * Procurar utilizadores por cidade
     */
    public static function findByCity($city)
    {
        return static::whereNotNull('address')->get()->filter(function ($user) use ($city) {
            return stripos($user->address, $city) !== false;
        });
    }

    /**
     * Verificar se o utilizador tem dados sensíveis completos
     */
    public function hasSensitiveData()
    {
        return !empty($this->phone) || !empty($this->address) || !empty($this->zip_code);
    }
}
