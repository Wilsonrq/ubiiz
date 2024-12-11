<x-layout>
    <div class="contein-card-public">
        <div class="contein-search">
            <label for=""></label>
            <input class="input-search" type="search" name="" id="">
        </div>
        @foreach ($cards as $card)
            <div class="contein-interno-card-public">
                <div class="contein-grid-card-public">
                    <div class="datos-img-card-public">
                        <div class="caja-mostrar-img-card-public">
                            <img class="img" src="{{ asset('storage/' . $card->Img) }}" alt="{{ $card->Titulo }}"
                                style="width: 80px; height: 80px;">
                        </div>
                    </div>
                    <div class="datos-img-card-public">
                        <div class="caja-mostrar-datos-public">{{ $card->Titulo }}</div>
                        <div class="caja-mostrar-datos-d-public">{{ $card->Descripcion }}</div>

                    </div>
                </div>
                <div class="contein-redes-public">
                    <div class="whatsapp-public">
                        <a class="icon-whatsapp" href="#"></a>
                    </div>
                    <div class="mi-web-public">
                        <a class="icon-link" href="#">Mi web</a>
                    </div>
                    <div class="megusta-public">
                        <div class="likes-section">
                            <a class="icon-basket" href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
