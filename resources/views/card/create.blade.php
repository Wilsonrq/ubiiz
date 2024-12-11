<x-layout>
    <div class="contein-create">
        <div class="contein-text-create-s"></div>
        <form action="{{ url('/card') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="caja-input-create">
                <div class="caja-interna-input">
                    <input class="input-create" type="file" name="Img">
                </div>
            </div>
            <div class="caja-input-create">
                <div class="caja-interna-input">
                    <input class="input-create" type="text" name="Titulo">
                </div>
            </div>
            <div class="caja-input-create">
                <div class="caja-interna-input">
                    <input class="input-create" type="text" name="Descripcion">
                </div>
            </div>
            <div class="caja-input-create">
                <div class="caja-interna-input">
                    <input class="input-create" type="text" name="whatsapp"
                        placeholder="WhatsApp (ej. +34123456789)">
                </div>
            </div>

            <div class="caja-input-create-button">
                <input type="submit" value="Guardar datos">

            </div>
        </form>
    </div>
</x-layout>
