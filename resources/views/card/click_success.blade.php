<x-layout>
    <div class="container-mis-tokens">
        <h1>¡Tu tarjeta ha sido posicionada en los primeros lugares!</h1>
        <p>Gracias por interactuar con las tarjetas. Ahora tu tarjeta está visible en los primeros lugares de la
            plataforma.
        </p>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif



        <!-- Botón para regresar a la página principal de tarjetas -->

        <a href="{{ route('dashboard') }}" class="btn btn-primary">Regresar al dashboard</a>
    </div>

</x-layout>
