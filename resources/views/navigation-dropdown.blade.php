<div id="stickNav">

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img style="height: 60px" src="/img/LaGomba_logo_transparent_bg.png" alt="">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="/products" :active="request()->routeIs('products')">
                        Products
                    </x-jet-nav-link>
                    <x-jet-nav-link href="/blog" :active="request()->routeIs('blog')">
                        About
                    </x-jet-nav-link>
                    <x-jet-nav-link href="/blog/#contact" :active="request()->routeIs('contact')">
                        Contact
                    </x-jet-nav-link>
                    <x-jet-nav-link href="/shopping-cart" :active="request()->routeIs('shoppingCart')">Shopping Cart
                        <span class="badge badge-secondary ml-2">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                    </x-jet-nav-link>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-jet-nav-link>
                    @else
                        <x-jet-nav-link href="/login" :active="request()->routeIs('login')">
                            Login
                        </x-jet-nav-link>

                        <x-jet-nav-link href="/register" :active="request()->routeIs('register')">
                            Sign Up
                        </x-jet-nav-link>
                    @endif
                </div>
            </div>

            @if(\Illuminate\Support\Facades\Auth::check())
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if(\Auth::user()->currentTeam->name == "Admin")

                            <div class="border-t border-gray-100"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Content
                            </div>

                            <x-jet-dropdown-link href="/admin/texts">
                                Header Texts
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="/admin/products">
                                Products
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="/admin/posts">
                                Blog
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="/admin/harvesting-periods">
                                Harvesting Periods
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="/admin/stocks">
                                Stock
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>
                        @if(count(\Illuminate\Support\Facades\Auth::user()->allTeams()) > 1)
                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach

                            <div class="border-t border-gray-100"></div>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>
            @endif
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-nav-link href="/products" :active="request()->routeIs('products')">
                Products
            </x-jet-nav-link>
            <x-jet-nav-link href="/blog" :active="request()->routeIs('blog')">
                About
            </x-jet-nav-link>
            <x-jet-nav-link href="/blog/#contact" :active="request()->routeIs('contact')">
                Contact
            </x-jet-nav-link>
            <x-jet-nav-link href="/shopping-cart" :active="request()->routeIs('shopping-cart')">Shopping Cart
                <span class="badge badge-secondary ml-2">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
            </x-jet-nav-link>

            @if(\Illuminate\Support\Facades\Auth::check())
                <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-jet-nav-link>
            @else
                <x-jet-nav-link href="/login" :active="request()->routeIs('login')">
                    Login
                </x-jet-nav-link>

                <x-jet-nav-link href="/register" :active="request()->routeIs('register')">
                    Sign Up
                </x-jet-nav-link>
            @endif
        </div>

    @if(\Illuminate\Support\Facades\Auth::check())
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>
                @if(\Auth::user()->currentTeam->name == "Admin")

                    <div class="border-t border-gray-100"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        Manage Content
                    </div>

                    <x-jet-dropdown-link href="/admin/texts">
                        Header Texts
                    </x-jet-dropdown-link>

                    <x-jet-dropdown-link href="/admin/products">
                        Products
                    </x-jet-dropdown-link>

                    <x-jet-dropdown-link href="/admin/posts">
                        Blog
                    </x-jet-dropdown-link>

                    <x-jet-dropdown-link href="/admin/harvesting-periods">
                        Harvesting Periods
                    </x-jet-dropdown-link>

                    <x-jet-dropdown-link href="/admin/stocks">
                        Stock
                    </x-jet-dropdown-link>
                @endif

                    <div class="border-t border-gray-200"></div>
                @if(count(\Illuminate\Support\Facades\Auth::user()->allTeams()) > 1)
                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif

            </div>
        </div>
        @endif
    </div>
</nav>

</div>