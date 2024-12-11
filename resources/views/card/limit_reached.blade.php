<x-layout>
    <div class="container-mis-tokens">
        <div class="caja-tokens-iterno">
            <div class="tokens-titulo">
                <h3>¡Límite de Clics Alcanzado!</h3>
            </div>
            <div class="tokens-cantidad">
                <p>{{ $message }}</p>
            </div>
            <div class="tokens-text">
                <p class="text-token">Has llegado al límite de clics. Para garantizar una experiencia
                    justa para todos,
                    deberás esperar un minuto antes de poder hacer clic nuevamente.

                    ¡Gracias por tu comprensión! Vuelve en un momento y sigue participando.</p>
            </div>
            <!-- Botón para regresar a la página principal de tarjetas -->
            <div class="tokens-button">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Regresar al dashboard</a>
            </div>
        </div>
    </div>

</x-layout>
