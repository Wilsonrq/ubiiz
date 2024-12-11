<x-layout>
    <div class="contein-codigo-qr">
        <h1>{{ $card->Titulo }}</h1>
        <p>{{ $card->Descripcion }}</p>
        <img src="{{ $qrCodeUrl }}" alt="Código QR">
    </div>
</x-layout>
