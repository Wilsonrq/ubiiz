<x-layout>
    <div class="contein-dashboard">

        @auth
            <div class="contein-superior-d">
                <div class="text-bienvenida">
                    <p>Bienvenido(a) {{ auth()->user()->name ?? auth()->user()->username }} estas autenticado</p>
                </div>
            </div>
            <div class="contein-interno-d">
                <div class="interno-d">
                    <div class="contein-links">
                        <div class="cajas-link">
                            @if ($cardExist)
                                <a class="link-dashboard" href="#">Ya tienes una card</a>
                            @else
                                <a class="link-dashboard" href="{{ url('card/create') }}">Crear Card</a>
                            @endif
                        </div>
                        <div class="cajas-link">
                            @if ($cardExist)
                                <a class="link-dashboard" href="{{ url('card') }}">Editar Card</a>
                            @else
                                <a class="link-dashboard" href="#">No hay card</a>
                            @endif
                        </div>
                        <div class="cajas-link">
                            @if ($cardExist)
                                <a class="link-dashboard" href="{{ url('card/' . auth()->user()->card->id . '/view') }}">Mi
                                    Card</a>
                            @else
                                <a class="link-dashboard" href="#">No hay card</a>
                            @endif
                        </div>
                        <div class="cajas-link">
                            @if ($cardExist)
                                <a class="link-dashboard" href="{{ route('card.random') }}">Pisiciona card</a>
                            @else
                                <a class="link-dashboard" href="#">No hay card</a>
                            @endif

                        </div>
                        <div class="cajas-link">
                            <a class="link-dashboard" href="">En construccion</a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
        <footer class="footer"></footer>
        <div class="contein-interno-dashboard">
            @guest
                <p>Para ver el contenido <a href="/login">inicia secion</a></p>
            @endguest
        </div>
    </div>
</x-layout>
