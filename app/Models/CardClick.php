<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardClick extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'card_id'];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Card
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
