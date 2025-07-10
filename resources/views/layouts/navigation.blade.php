<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo + Name -->
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.svg') }}" alt="Zecure Logo" class="h-8 w-auto">
                    <span class="text-xl font-extrabold text-black"></span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('credentials.index') }}" class="text-sm font-bold text-black hover:text-indigo-600 transition">Passwords</a>
                
                @auth
                    <span class="text-sm font-bold text-gray-800">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-600 hover:text-red-800 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-black hover:text-indigo-600">Login</a>
                    <a href="{{ route('register') }}" class="text-sm font-bold text-black hover:text-indigo-600">Register</a>
                @endauth
            </div>

            <!-- Mobile Toggle -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-black hover:text-indigo-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path :class="{ 'hidden': open }" class="inline-flex" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open }" class="hidden" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="md:hidden hidden px-4 pb-4">
        <div class="space-y-2 pt-2">
            <a href="{{ route('credentials.index') }}" class="block font-bold text-black hover:text-indigo-600">Passwords</a>

            @auth
                <span class="block text-sm font-bold text-gray-800 pt-2">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-bold mt-1">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block font-bold text-black hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}" class="block font-bold text-black hover:text-indigo-600">Register</a>
            @endauth
        </div>
    </div>
</nav>
