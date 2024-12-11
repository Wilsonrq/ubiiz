<x-layout>
    <div class="contein-l-r">
        <div class="contein-interno-l-r">
            <div class="titulo-l-r">
                <p class="text-l-r">login</p>
            </div>
            <form action="/login" method="POST">
                @csrf
                @include('components.message')
                <div class="label-login-r">
                    <label for="">
                        <input class="input-l-r" type="text" name="username" placeholder="Email / Usernema">
                    </label>
                </div>
                <div class="label-login-r">
                    <label for="">
                        <input class="input-l-r" type="password" name="password" id="" placeholder="Password">
                    </label>
                </div>
                <div class="label-login-r">
                    <label for="">
                        <input class="button-l-r" type="submit" value="Iniciar">
                    </label>
                </div>
                <div class="label-recuperar-contraseña">
                    <label for="">
                        <div class="recuperar-contraseña-interna">
                            <div>
                                <a class="icon-users" href="#"></a>
                                <a class="text-registro-recuperar" href="/register">¿Aun no estas registrado?</a>
                            </div>
                            <div>
                                <a class="icon-emo-unhappy" href="#"></a>
                                <a class="text-registro-recuperar" href="#">Olvidaste tu contraseña</a>
                            </div>
                        </div>
                    </label>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer"></footer>
</x-layout>
