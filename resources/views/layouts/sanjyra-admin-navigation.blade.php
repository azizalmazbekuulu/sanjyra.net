<nav x-data="{ open: false }" class=" bg-blue-100 border-b border-gray-300 shadow-xl w-full">
    <!-- Primary Navigation Menu -->
    <div class="w-full max-w-7xl mx-auto px-2 sm:px-4 lg:px-6">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a class="pl-2 font-extrabold text-base md:text-xl" href="{{ route('index') }}">
                        {{ config('app.name', 'Кыргыз санжырасы') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('Башкы бет') }}
                    </x-nav-link>
                    <x-nav-link :href="route('famous-people')" :active="request()->routeIs('famous-people')">
                        {{ __('Белгилүү инсандар') }}
                    </x-nav-link>
                    <x-nav-link :href="route('name')" :active="request()->routeIs('name')">
                        {{ __('Ысымдар') }}
                    </x-nav-link>
                    <x-nav-link :href="route('article')" :active="request()->routeIs('article')">
                        {{ __('Макалалар') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="hidden lg:flex sm:items-center sm:ml-6">
                @include('sanjyra.search.main_search')
            </div>

            @if(Auth::check())
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endif

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden bg-yellow-50">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Башкы бет') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('famous-people')" :active="request()->routeIs('famous-people')">
                {{ __('Белгилүү инсандар') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('name')" :active="request()->routeIs('name')">
                {{ __('Ысымдар') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('article')" :active="request()->routeIs('article')">
                {{ __('Макалалар') }}
            </x-responsive-nav-link>
            @include('sanjyra.search.main_search')
            <!-- Authentication -->
            @if(Auth::check())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div>{{ Auth::user()->name }}</div>
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();">
                    {{ __('Logout / Чыгуу') }}
                </x-dropdown-link>
            </form>
            @endif
        </div>
    </div>
</nav>