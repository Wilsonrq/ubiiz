<x-layout>
    <div class="contein-edit">
        <div class="contein-text-edit-s"></div>
        <form action="{{ url('/card/' . $card->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="caja-input-create-img">
                <div class="caja-mostrar-img">
                    <img src="{{ asset('storage') . '/' . $card->Img }}" alt="" style="width: 100px"
                        height="100px">
                </div>
                <div class="input-file-img">
                    <input type="file" name="Img" value="">
                </div>
            </div>
            <div class="caja-input-create-e">
                <div class="caja-interna-input">
                    <input class="input-edit" type="text" name="Titulo" value="{{ $card->Titulo }}">
                </div>
            </div>
            <div class="caja-input-create-e">
                <div class="caja-interna-input">
                    <input class="input-edit" type="text" name="Descripcion" value="{{ $card->Descripcion }}">
                </div>
            </div>
            <div class="caja-input-create-e">
                <div class="caja-interna-input">
                    <input class="input-create" type="text" name="whatsapp" value="{{ $card->whatsapp }}"
                        placeholder="Número de WhatsApp (ej. +34123456789)">
                </div>
            </div>
            <div class="caja-input-create-e-button">
                <div class="caja-interna-input-button">
                    <input type="submit" value="Guardar cambios">
                    <a href="/card">regresar</a>
                </div>
            </div>

        </form>
    </div>
</x-layout>
