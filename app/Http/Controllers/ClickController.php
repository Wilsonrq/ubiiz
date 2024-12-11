<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardClick;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Asegúrate de agregar esta línea



class ClickController extends Controller
{
    //
    public function clickOnCard(Request $request, $cardId)
    {
        $user = auth()->user();

        // Verificar si el usuario está bloqueado
        if ($user->blocked_until && $user->blocked_until->isFuture()) {
            return redirect()->back()->with('message', 'No puedes hacer clic por un minuto.');
        }

        // Guardar el clic en la base de datos
        CardClick::create([
            'user_id' => $user->id,
            'card_id' => $cardId,
            'created_at' => Carbon::now(),
        ]);

        // Contar los clics que el usuario ha hecho en el último minuto
        $clicksCount = CardClick::where('user_id', $user->id)
            ->where('created_at', '>=', Carbon::now()->subMinute())
            ->count();

        Log::info('Cantidad de clics en el último minuto: ' . $clicksCount);

        if ($clicksCount >= 5) {
            // Verificar si el usuario tiene una tarjeta
            $userCard = $user->card;
            if (!$userCard) {
                return redirect()->back()->with('message', 'El usuario no tiene una tarjeta asociada.');
            }

            // Incrementar la posición de otras tarjetas
            Card::where('id', '!=', $userCard->id)->increment('position');

            // Actualizar la posición de la tarjeta del usuario
            $userCard->update(['position' => 1]);

            // Bloquear al usuario por un minuto
            $user->update(['blocked_until' => Carbon::now()->addMinute()]);

            // Eliminar clics antiguos para no sobrecargar la base de datos
            CardClick::where('user_id', $user->id)->where('created_at', '<', Carbon::now()->subMinute())->delete();

            // Redirigir a la vista de límite alcanzado
            return view('card.limit_reached')->with('message', 'Ya has realizado los 5 clics permitidos.'); // Vista para el límite de clics
        }

        // Si el usuario ha hecho clic pero no ha alcanzado el límite
        if ($clicksCount === 5) {
            // Solo mostrar el mensaje de éxito si es el primer clic
            return view('card.click_success')->with('message', 'Tu tarjeta está ahora en los primeros lugares.'); // Vista de éxito
        }

        // Si el clic es exitoso pero no se ha alcanzado el límite
        return redirect()->back()->with('message', 'Has hecho clic en una tarjeta.'); // Mensaje para clics normales
    }
}
