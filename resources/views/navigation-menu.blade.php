<nav x-data="{ open: false }" class="bg-purple-300 border-b border-purple-300">
    <!-- Menú principal de navegación -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="flex items-center">
                            <img src="img/ANDF_Tracking_LogoS.png" class="h-9 w-10.5 mr-3" alt="" />
                            <span class="self-center text-xl font-bold">Tracking By ANDF</span>
                        </div>
                        {{-- <x-application-mark class="block h-9 w-auto" /> --}}
                    </a>
                </div>

                <!-- Links de navegación -->
                <div class="hidden space-x-5 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-nav-link>

                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 pl-3 text-custom-linksmenu hover:text-slate-900 md:p-0 md:w-auto">Gerenciamiento
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdownNavbar" class="z-10 hidden font-bold bg-custom-header rounded-lg w-40">
                        <ul class="py-2 text-sm text-custom-linksmenu hover:text-slate-900"
                            aria-labelledby="dropdownLargeButton">

                            <li>
                                <x-nav-link href="{{ route('equipo') }}" :active="request()->routeIs('equipo')">
                                    {{ __('Estructura del equipo') }}
                                </x-nav-link>
                            </li>

                            <li aria-labelledby="dropdownNavbarLink">
                                <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                                    data-dropdown-placement="right-start" type="button"
                                    class="flex items-center justify-between w-full px-4 py-2">
                                    Autorizaciones
                                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="doubleDropdown" class="z-10 hidden bg-custom-header rounded-lg w-52">
                                    <ul class="py-2 text-sm text-custom-linksmenu hover:text-slate-900"
                                        aria-labelledby="doubleDropdownButton">
                                        <li>
                                            <x-nav-link href="{{ route('autContactos') }}" :active="request()->routeIs('autContactos')">
                                                {{ __('Autorizar Contactos') }}
                                            </x-nav-link>
                                        </li>
                                        <li>
                                            <x-nav-link href="{{ route('autCitas') }}" :active="request()->routeIs('autCitas')">
                                                {{ __('Autorizar Citas') }}
                                            </x-nav-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <x-nav-link href="{{ route('desempeño') }}" :active="request()->routeIs('desempeño')">
                                    {{ __('Desempeño') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('ranking') }}" :active="request()->routeIs('ranking')">
                                    {{ __('Ranking') }}
                                </x-nav-link>
                            </li>
                        </ul>
                    </div>

                    <x-nav-link href="{{ route('contactos') }}" :active="request()->routeIs('contactos')">
                        {{ __('Contactos') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('ventas') }}" :active="request()->routeIs('ventas')">
                        {{ __('Ventas') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('cotizaciones') }}" :active="request()->routeIs('cotizaciones')">
                        {{ __('Cotizaciones') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('citas') }}" :active="request()->routeIs('citas')">
                        {{ __('Citas') }}
                    </x-nav-link>

                    <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2"
                        class="flex items-center justify-between w-full py-2 pl-3 text-custom-linksmenu hover:text-slate-900 md:p-0 md:w-auto">Catalogos
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdownNavbar2" class="z-10 hidden font-bold bg-custom-header rounded-lg w-40">
                        <ul class="py-2 text-sm text-custom-linksmenu hover:text-slate-900"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <x-nav-link href="{{ route('colonias') }}" :active="request()->routeIs('colonias')">
                                    {{ __('Colonias') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('empresas') }}" :active="request()->routeIs('empresas')">
                                    {{ __('Empresas') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('origenes') }}" :active="request()->routeIs('origenes')">
                                    {{ __('Origenes') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('preferencias') }}" :active="request()->routeIs('preferencias')">
                                    {{ __('Preferencias') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('tipoCita') }}" :active="request()->routeIs('tipoCita')">
                                    {{ __('Tipo de cita') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('productos') }}" :active="request()->routeIs('productos')">
                                    {{ __('Productos') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ 'tipoCausa' }}" :active="request()->routeIs('tipoCausa')">
                                    {{ __('Tipo de causa(descarte)') }}
                                </x-nav-link>
                            </li>
                        </ul>
                    </div>

                    <button id="dropdownNavbarLink3" data-dropdown-toggle="dropdownNavbar3"
                        class="flex items-center justify-between w-full py-2 pl-3 text-custom-linksmenu hover:text-slate-900 md:p-0 md:w-auto">Reportes
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdownNavbar3" class="z-10 hidden font-bold bg-custom-header rounded-lg w-40">
                        <ul class="py-2 text-sm text-custom-linksmenu hover:text-slate-900"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <x-nav-link href="{{ route('reporteCitas') }}" :active="request()->routeIs('reporteCitas')">
                                    {{ __('Reporte citas') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('reporteAnual') }}" :active="request()->routeIs('reporteAnual')">
                                    {{ __('Reporte Anual') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('reporteAsesores') }}" :active="request()->routeIs('reporteAsesores')">
                                    {{ __('Reporte Asesores') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('reporteDescartados') }}" :active="request()->routeIs('reporteDescartados')">
                                    {{ __('Reporte Descartados') }}
                                </x-nav-link>
                            </li>
                        </ul>
                    </div>


                    <button id="dropdownNavbarLink4" data-dropdown-toggle="dropdownNavbar4"
                        class="flex items-center justify-between w-full py-2 pl-3 text-custom-linksmenu hover:text-slate-900 md:p-0 md:w-auto">Administración
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdownNavbar4" class="z-10 hidden font-bold bg-custom-header rounded-lg w-40">
                        <ul class="py-2 text-sm text-custom-linksmenu hover:text-slate-900"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <x-nav-link href="{{ route('adminContactos') }}" :active="request()->routeIs('adminContactos')">
                                    {{ __('Administrar Contactos') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('adminUsuarios') }}" :active="request()->routeIs('adminUsuarios')">
                                    {{ __('Administrar Usuarios') }}
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('adminDescartados') }}" :active="request()->routeIs('adminDescartados')">
                                    {{ __('Administrar Descartados') }}
                                </x-nav-link>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">


                <!-- Menú de configuración -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Administración de cuenta -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Administrar cuenta') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="" :active="request()->routeIs('blog')">
                Gerenciamiento
            </x-responsive-nav-link>

            <x-responsive-nav-link href="" :active="request()->routeIs('blog')">
                Contactos
            </x-responsive-nav-link>

            <x-responsive-nav-link href="" :active="request()->routeIs('blog')">
                Ventas
            </x-responsive-nav-link>

            <x-responsive-nav-link href="" :active="request()->routeIs('blog')">
                Cotizaciones
            </x-responsive-nav-link>

            <x-responsive-nav-link href="" :active="request()->routeIs('blog')">
                Citas
            </x-responsive-nav-link>

            <x-responsive-nav-link href="" :active="request()->routeIs('blog')">
                Catálogos
            </x-responsive-nav-link>

            <x-responsive-nav-link href="" :active="request()->routeIs('blog')">
                Reportes
            </x-responsive-nav-link>
        </div>

        <!-- Opciones de configuración menú responsivo -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Administración de cuenta -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
