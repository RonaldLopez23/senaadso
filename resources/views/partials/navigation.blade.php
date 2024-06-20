<div class="navbar bg-orange-200">
    <div class="flex-1 ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
        </svg>
        <a href="{{ route('inicio') }}" class="btn btn-ghost btn-sm no-underline">
            Inicio
        </a>
    </div>
    <div class="flex-none">
        @auth
        <ul class="menu menu-horizontal px-1 mr-6 space-x-2">
            <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
            <li><a href="{{ route('productos.index') }}">Productos</a></li>
            @if (auth()->user()->rol == 'admin')
            <li><a href="{{ route('categorias.index') }}">Categorías</a></li>
            @endif
        </ul>
        <div class="dropdown dropdown-end mr-4">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 h-10 rounded-full overflow-hidden">
                    <img src="https://source.unsplash.com/random/100x100" alt="Avatar">
                </div>
            </label>
            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-rounded bg-base-100">
                <li class="font-semibold">
                    {{ auth()->user()->name }}
                </li>
                @if (auth()->user()->rol == 'admin')
                <li><a href="#" class="link link-hover">Usuarios</a></li>
                @endif
                <li><a href="{{ route('perfil') }}" class="link link-hover">Perfil</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="link link-hover">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
        @else
        <ul class="menu menu-horizontal px-1 mr-6 space-x-4">
            <li><a href="{{ route('login') }}" class="btn btn-sm btn-primary">Ingresar</a></li>
            <li><a href="{{ route('registro') }}" class="btn btn-sm btn-secondary">Registrarse</a></li>
        </ul>
        @endauth
    </div>
</div>
