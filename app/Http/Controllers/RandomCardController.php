<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardClick;
use Illuminate\Http\Request;

class RandomCardController extends Controller
{
    //

    // Método para mostrar 5 tarjetas aleatorias
    public function showRandomCards()
    {
        // Obtener una tarjeta aleatoria
        $card = Card::inRandomOrder()->first();
        // Si no hay tarjetas, devolver la vista con un mensaje de error
        if (!$card) {
            return view('card.random')->with('error', 'No hay tarjetas disponibles.');
        }
    
        // Devolver la vista con la tarjeta obtenida
        return view('card.random', compact('card'));
    }
}
