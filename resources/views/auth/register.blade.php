<x-layout>

    <div class="contein-l-r">
        <div class="contein-interno-l-r">
            <div class="titulo-l-r">
                <p class="text-l-r">Register</p>
            </div>
            <form action="/register" method="POST">
                @csrf
                @include('components.message')
                <div class="label-l-r">
                    <label for="">
                        <input class="input-l-r" type="text" name="username" placeholder="Username">
                    </label>
                </div>
                <div class="label-l-r">
                    <label for="">
                        <input class="input-l-r" type="email" name="email" placeholder="Email">
                    </label>
                </div>
                <div class="label-l-r">
                    <label for="">
                        <input class="input-l-r" type="password" name="password" placeholder="Password">
                    </label>
                </div>
                <div class="label-l-r">
                    <label for="">
                        <input class="input-l-r" type="password" name="password_confirmation"
                            placeholder="Confirmar password">
                    </label>
                </div>
                <div class="label-l-r-b">
                    <label for="">
                        <input class="button-l-r" type="submit" value="Registro">
                    </label>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer"></footer>
</x-layout>
