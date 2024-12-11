<x-layout>
    <div class="contein-index">
        @foreach ($cards as $card)
            <div class="contein-interno-card">
                <div class="caja-mostrar-datos-img">
                    <div class="caja-contact-derecha">
                        <div class="contact-i-d">
                            <a class="icon-phone-1" href=""></a>
                        </div>
                    </div>
                    <div class="caja-contact-izquierda">
                        <div class="contact-i-d">
                            <a class="icon-whatsapp" href="{{ $card->whatsapp }}"></a>
                        </div>
                    </div>
                    <div class="caja-mostrar-img">
                        <img class="img" src="{{ asset('storage') . '/' . $card->Img }}" alt=""
                            style="width: 100px" height="100px">
                    </div>
                </div>
                <div class="contein-mostrar-datos">
                    <div class="caja-mostrar-datos">{{ $card->Titulo }}</div>
                </div>
                <div class="contein-mostrar-datos">
                    <div class="caja-mostrar-datos-d">{{ $card->Descripcion }}</div>
                </div>
                <div class="caja-mostrar-contacto">
                    <div class="caja-contacto">
                        <a class="icon-facebook-squared" href=""></a>
                    </div>
                    <div class="caja-contacto">
                        <a class="icon-cancel-outline" href=""></a>
                    </div>
                    <div class="caja-contacto">
                        <a class="icon-instagram-filled" href=""></a>
                    </div>
                    <div class="caja-contacto">
                        <a class="icon-linkedin-rect" href=""></a>
                    </div>
                </div>
                <div class="caja-mostrar-qr">
                    <div class="caja-qr">
                        <img src="{{ url('storage/' . $card->qr_code) }}" width="100%" height="100%" alt="Código QR">
                    </div>
                </div>
                <div class="contein-web">
                    <div class="caja-web">
                        <a class="icon-link" href="#">Mi web</a>
                    </div>
                </div>

                <div class="caja-mascontactos">
                    <div class="caja-mascontactos-int">
                        <a class="icon-share-1" href="#"></a>
                        <a class="icon-comment-2" href="#"></a>
                        <a class="icon-at" href="#"></a>
                        <a class="icon-address" href="#"></a>
                    </div>
                </div>

                <div class="caja-card-view ">
                    <div class="caja-button-card">
                        <div class="caja-button-e-b">
                            <a class="button-card-view" href="{{ url('/card/' . $card->id . '/edit') }}">Editar</a>
                            <a class="button-card-view" href="{{ url('/dashboard') }}">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</x-layout>
