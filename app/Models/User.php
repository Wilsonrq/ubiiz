<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Asegúrate de importar el modelo Card
use App\Models\Card;

class User extends Authenticatable
{
     //-----------------------------------
    use HasFactory, Notifiable;

    public function clicks()
    {
    return $this->hasMany(CardClick::class);
    }
     //-----------------------------------
  
    public function card()
    {
       return $this->hasOne(Card::class);
    }

    protected $casts = [
        'last_token_time' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        
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
        ];
    }

    public function setPasswordAttribute($value){
        $this->attributes["password"] = bcrypt($value);
    }
}
