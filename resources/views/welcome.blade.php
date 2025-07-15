<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>ZeCuRe by Groware Global | Secure Password Vault</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

  <style>
    * {
      box-sizing: border-box;
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('{{ asset('images/welcome1.png') }}') no-repeat center center;
      background-size: cover;
    }

    /* Navbar Styles */
    .navbar {
      position: sticky;
      top: 0;
      background-color: white;
      padding: 1rem 2rem;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar .logo {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 1.4rem;
      font-weight: 700;
      color: #111827;
      text-decoration: none;
    }

    .navbar nav a {
      position: relative;
      color: #2d2d2d;
      font-weight: 600;
      margin-left: 1.5rem;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .navbar nav a::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0%;
      height: 2px;
      background: linear-gradient(to right, #3b82f6, #6366f1);
      transition: width 0.3s ease;
    }

    .navbar nav a:hover {
      color: #1f2937;
    }

    .navbar nav a:hover::after {
      width: 100%;
    }

    #hero {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      min-height: 100vh;
      padding: 2rem;
      background: linear-gradient(to bottom, rgba(255, 255, 255, 0.85), transparent);
    }

    .glass-box {
      background: white;
      color: #111827;
      border-radius: 1.5rem;
      padding: 3rem 2rem;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
      max-width: 600px;
      width: 100%;
      animation: fadeIn 1.2s ease-out;
      text-align: center;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .btn {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      margin: 0.5rem;
      font-weight: 600;
      border-radius: 0.5rem;
      text-decoration: none;
      transition: all 0.3s ease-in-out;
    }

    .btn-login {
      background: #3b82f6;
      color: white;
    }

    .btn-login:hover {
      background: #2563eb;
    }

    .btn-register {
      background: transparent;
      border: 2px solid #3b82f6;
      color: #3b82f6;
    }

    .btn-register:hover {
      background: rgba(59, 130, 246, 0.1);
    }

    section {
      padding: 4rem 2rem;
      text-align: center;
    }

    footer {
      padding: 2rem;
      text-align: center;
      color: #111827;
      font-size: 0.9rem;
      
    }

    iframe {
      width: 100%;
      height: 350px;
      border: 0;
    }

    @media (max-width: 768px) {
      iframe {
        height: 300px;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <header class="navbar">
    <a href="{{ url('/') }}" class="logo">
      <img src="{{ asset('images/logo.svg') }}" alt="Zecure Logo" style="height: 32px;">
      
    </a>
    <nav>
      <a href="#hero">Home</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section id="hero">
    <div class="glass-box">
      <img src="{{ asset('images/logo.svg') }}" alt="Zecure Logo" style="height: 48px;" class="mb-3">
      <h1 class="text-2xl font-extrabold mb-4">ZeCuRe by Groware Global</h1>
      <p class="text-gray-700 text-lg mb-6">Your Encrypted Digital Vault for Passwords</p>
      <a href="{{ route('login') }}" class="btn btn-login">Login</a>
      <a href="{{ route('register') }}" class="btn btn-register">Register</a>
    </div>
  </section>

<!-- About Section -->
<section id="about" style="background-color: white; padding: 4rem 2rem; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb;">
  <div style="max-width: 960px; margin: auto;">
    <h2 style="font-size: 2rem; font-weight: 700; text-align: center; margin-bottom: 2rem; color: #1f2937;">About ZeCuRe by Groware Global</h2>
    <p style="font-size: 1.125rem; color: #374151; text-align: justify; line-height: 1.75;">
      ZeCuRe by Groware Global is your personal encrypted vault to store credentials. Built with privacy-first technology, ZeCuRe never stores your passwords in plain text — only you can access your data.
    </p>
    <p style="font-size: 1.125rem; color: #374151; text-align: justify; line-height: 1.75; margin-top: 1rem;">
      Our mission is to deliver powerful yet user-friendly tools that help you secure and manage your digital life, effortlessly. Whether on desktop or mobile, ZeCuRe gives you secure access to your passwords wherever you go.
    </p>
  </div>
</section>

<!-- Contact + Map Section -->
<section id="contact" style="background-color: white; padding: 4rem 2rem; border-bottom: 1px solid #e5e7eb;">
  <div style="max-width: 1140px; margin: auto; display: flex; flex-wrap: wrap; gap: 2rem;">

    <!-- Contact Info -->
    <div style="flex: 1; min-width: 300px; padding-right: 2rem; border-right: 1px solid #e5e7eb;">
      <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 2rem; color: #1f2937;">Contact</h2>
      <p style="font-size: 1.125rem; color: #374151; margin-bottom: 1.25rem;">
        <strong>Email:</strong> 
        <a href="mailto:info@growareglobal.com" style="color: #3b82f6; text-decoration: underline;">info@growareglobal.com</a>
      </p>
      <p style="font-size: 1.125rem; color: #374151; margin-bottom: 1.25rem;">
        <strong>Phone:</strong> +91 7592 091 994
      </p>
      <p style="font-size: 1.125rem; color: #374151;">
        <strong>Location:</strong><br>
        Groware Global, Mankuzhi Junction, Pangappara,<br>
        Thiruvananthapuram, Kerala 695581
      </p>
    </div>

    <!-- Map -->
    <div style="flex: 1; min-width: 300px;">
      <div style="border-radius: 1rem; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1); border: 1px solid #e5e7eb;">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7890.873675395178!2d76.90489959523822!3d8.55392378775937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05bfa9d9e5c5a5%3A0x408e20165c8994a!2sGroware!5e0!3m2!1sen!2sin!4v1752122645988!5m2!1sen!2sin" 
          allowfullscreen 
          loading="lazy" 
          style="width: 100%; height: 100%; min-height: 300px; border: 0;">
        </iframe>
      </div>
    </div>

  </div>
</section>


<footer>
    &copy; {{ date('Y') }} ZeCuRe. All rights reserved.
  </footer>
</body>


</body>
</html>