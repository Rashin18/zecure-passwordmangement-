<style>
  .custom-navbar {
    position: sticky;
    top: 0;
    background-color: white;
    padding: 1rem 2rem;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  .custom-navbar a {
    position: relative;
    color: #2d2d2d;
    font-weight: 600;
    margin-left: 1.5rem;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .custom-navbar a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 0%;
    height: 2px;
    background: linear-gradient(to right, #3b82f6, #6366f1);
    transition: width 0.3s ease;
  }

  .custom-navbar a:hover {
    color: #1f2937;
  }

  .custom-navbar a:hover::after {
    width: 100%;
  }

  .mobile-toggle-btn {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
  }

  .mobile-menu {
    display: none;
    flex-direction: column;
    padding: 1rem 2rem;
    background-color: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  .mobile-menu a,
  .mobile-menu span,
  .mobile-menu form {
    margin: 0.5rem 0;
  }

  @media (max-width: 768px) {
    .custom-navbar .desktop-menu {
      display: none;
    }

    .mobile-menu {
      display: block;
    }
  }
</style>

<nav x-data="{ open: false }" class="custom-navbar">
  <!-- Logo -->
  <div class="flex items-center space-x-4">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center gap-2">
      <img src="{{ asset('images/logo.png') }}" alt="Zecure Logo" style="height: 32px;">
      <span class="fw-bold fs-5 text-dark">ZeCuRe</span>
    </a>
  </div>

  <!-- Desktop Menu -->
  <div class="desktop-menu d-flex align-items-center">
    <a href="{{ route('credentials.index') }}">Passwords</a>

    @auth
      <span class="ms-3 fw-semibold text-dark">{{ Auth::user()->name }}</span>
      <form method="POST" action="{{ route('logout') }}" class="ms-3">
        @csrf
        <button type="submit" style="background: none; border: none; color: #dc2626; font-weight: 600;">Logout</button>
      </form>
    @else
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    @endauth
  </div>

  <!-- Mobile Toggle Button -->
  <div class="d-md-none">
    <button @click="open = !open" class="mobile-toggle-btn">
      <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
        <path :class="{ 'hidden': open }" class="inline-flex" d="M4 6h16M4 12h16M4 18h16" />
        <path :class="{ 'hidden': !open }" class="hidden" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
</nav>

<!-- Mobile Menu -->
<div x-show="open" class="mobile-menu d-md-none">
  <a href="{{ route('credentials.index') }}">Passwords</a>

  @auth
    <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" style="background: none; border: none; color: #dc2626; font-weight: 600;">Logout</button>
    </form>
  @else
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
  @endauth
</div>