<x-layout>
    <div class="container-card-tokens">
        {{-- Mostrar la tarjeta aleatoria --}}
        <div class="card-container">
            <div class="info-tokens">
                <div class="info-tokes-interno">
                    <div class="info-titulo">
                        <h3>¡Haz que tu tarjeta brille!</h3>
                    </div>
                    <div class="info-text">
                        <p class="text">Al llegar a cinco clics, tu tarjeta se colocará en la primera posición, lo que
                            significa más
                            atención y oportunidades. ¡No pierdas tiempo, cada clic te acerca más a la cima!</p>
                    </div>
                </div>
            </div>
            @if (isset($card))
                <div class="contein-grid-tokens">
                    <div class="contein-tokens">
                        <img class="img-tokens" src="{{ asset('storage/' . $card->Img) }}" width="70px" height="70px">
                    </div>
                    <div class="contein-tokens">
                        <div class="caja.tituli-des">
                            <div class="contein-titulo-tokens">
                                <h3>{{ $card->Titulo }}</h3>
                            </div>
                            <div class="conten-descripcion-tokens">
                                <p>{{ $card->Descripcion }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="contein-tokens">
                        {{-- Botón para dar clic y sumar tokens --}}
                        <form action="{{ route('card.click', $card->id) }}" method="POST">
                            @csrf
                            <button class="button-tokens" type="submit">Clic aquí</button>
                        </form>
                    </div>
                </div>
                <div class="contein-inf-tokrns"></div>
            @else
                <p>No hay tarjetas disponibles.</p>
            @endif
        </div>
    </div>

    @if (session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif
</x-layout>
