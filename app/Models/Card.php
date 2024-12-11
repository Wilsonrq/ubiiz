<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    //-----------------------------------
    public function clicks()
    {
    return $this->hasMany(CardClick::class);
    }
    //-----------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id', 'Titulo', 'Descripcion', 'Img','qr_code', 'position'
    ];
}
