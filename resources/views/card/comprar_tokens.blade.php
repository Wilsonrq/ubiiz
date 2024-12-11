<x-layout>
    <div class="container-tokens">
        <h2>¡Has acumulado {{ $tokensAcumulados }} tokens!</h2>

        <p>Usa estos tokens para posicionar tu tarjeta en los primeros lugares.</p>

        <form action="{{ route('tokens.comprar_posicionamiento') }}" method="POST">
            @csrf
            <button type="submit" class="buy-button">Comprar Posicionamiento</button>
        </form>
    </div>
</x-layout>
