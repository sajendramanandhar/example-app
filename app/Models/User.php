<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'image'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }

    public function getImageUrl(): string
    {
        return $this->image
            ? '/storage/'.$this->image
            : '/images/no-preview-image.png';
    }

    public function getEditUrl(): string
    {
        return route('users.edit', ['user' => $this]);
    }

    public function getUpdateUrl(): string
    {
        return route('users.update', ['user' => $this]);
    }

    public function getImagePath(): string
    {
        return public_path('storage/').$this->image;
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'max:255', 'string', 'email'],
            'image' => ['nullable', 'image', 'max:15360'],
        ];
    }
}
