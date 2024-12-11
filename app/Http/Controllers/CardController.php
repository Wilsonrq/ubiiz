<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class CardController extends Controller
{

    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
   
    //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

       // Método para mostrar todas las tarjetas al público
    public function publicIndex()
    {   
        //$cards = card::all(); // Obtener todas las tarjetas
        // Obtener todas las tarjetas, ordenadas por la posición (1 = primero)
        $cards = Card::orderBy('position', 'asc')->get();
        return view('card.public_index', compact('cards'));
    }


    public function view($id)
    {
        $card = Card::findOrFail($id);
        return view("card.view", compact("card"));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $cardExist = $user->card()->exists(); // Verifica si el usuario ya tiene una card

        //Esta linea es muy inportante ya que me relaciona los usuarios uno a uno
        $datos["cards"] = Card::where('user_id', auth()->id())->paginate(1);
       
        return view("card.index",$datos);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
         // 
         return view("card.create");
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {   
        // Ajusta según el formato que necesites
        $request->validate([
            'whatsapp' => 'nullable|string|max:20', 
        ]);
        //
        $datosCard = request()->except("_token");
        // para obtener el ID del usuario actual
        $datosCard['user_id'] = auth()->id();
        if($request->hasFile('Img')){
            $datosCard ["Img"]=$request->file("Img")->Store("uploads","public");
        }
        //card::insert($datosCard);

         // Generate the QR code for the card data
          // Generar el código QR
           // Insertar la tarjeta y obtener el ID
        $card = Card::create($datosCard);
        $this->generateQrCode($card);
    
        return redirect()->route('card.index'); // O cualquier otra ruta que desees

    } 
    
   // Método para generar el código QR
   private function generateQrCode(Card $card)
{
    // Generar el código QR con la URL de la vista qr.blade.php
    $qrCodeData = route('qr.show', ['id' => $card->id]);
    $qrCodeImage = QrCode::format('png')->size(300)->generate($qrCodeData);

    // Guardar el código QR como un archivo
    $qrCodePath = 'uploads/qrcodes/' . $card->id . '.png';
    Storage::disk('public')->put($qrCodePath, $qrCodeImage);

    // Actualizar la tarjeta con la ruta del código QR en la base de datos
    $card->update(['qr_code' => $qrCodePath]); // Solo guardamos la ruta
}


    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    // Mostrar el QR de la tarjeta
    public function showQr($id)
    {
        $card = Card::findOrFail($id);
        return view('qr', compact('card'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $card = Card::findOrFail($id);
        return view("card.edit",compact("card"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosCard = request()->except("_token","_method");

        if($request->hasFile('Img')){
            $card=Card::findOrFail($id);
            Storage::delete("public/".$card->Img);
            $datosCard ["Img"]=$request->file("Img")->Store("uploads","public");
        }
        Card::where("id","=",$id)->update($datosCard);

        $card=Card::findOrFail($id);
        return view("card.edit",compact("card"));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Card::destroy($id);
        return redirect("card");
    }

}