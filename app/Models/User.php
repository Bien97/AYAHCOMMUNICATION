<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
<<<<<<< HEAD
        'firstname',
        'lastname',
        'pseudo',
=======
        'name',
>>>>>>> 757e0377e7441c5f48492a3f6de9194ff7ea16ee
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
<<<<<<< HEAD
            'password' => 'hashed',
        ];
    }
}
=======
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
>>>>>>> 757e0377e7441c5f48492a3f6de9194ff7ea16ee
