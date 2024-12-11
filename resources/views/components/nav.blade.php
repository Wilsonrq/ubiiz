<div class="contein-nav">
    <div class="nav-grid">
        <div class="logo-nav">
            <p><span class="logo1">ubi</span><span class="logo2">iz</span></p>
        </div>
        <div class="logo-nav">
            @guest
                <!-- Mostrar solo si el usuario NO está logueado -->
                <a href="/home" class="icon-home-outline"></a>
                <a href="#" class="icon-bullhorn"></a>
                <a href="{{ route('cards.public') }}" class="icon-address-card-o"></a>
                <a href="/login" class="icon-user-outline"></a>
                <a href="/register" class="icon-user-add-outline"></a>
            @endguest

            @auth
                <!-- Mostrar solo si el usuario está logueado -->
                <a class="icon-logout" href="/logout">logout</a>
            @endauth

        </div>
    </div>
</div>
