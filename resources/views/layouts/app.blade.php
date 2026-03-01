<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portal Layanan') — SMKN 1 Limboto</title>
    <meta name="description"
        content="@yield('meta_description', 'Portal Layanan Sistem Informasi Terpadu SMKN 1 Limboto — Akses E-Raport, LMS, Dapodik, dan PeKaeL dalam satu platform.')">
    <meta name="keywords" content="SMKN 1 Limboto, portal layanan, e-raport, lms, dapodik, pkl, sekolah, pendidikan">
    <meta name="author" content="SMKN 1 Limboto">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Portal Layanan') — SMKN 1 Limboto">
    <meta property="og:description"
        content="@yield('meta_description', 'Portal Layanan Sistem Informasi Terpadu SMKN 1 Limboto')">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    {{-- ======== NAVBAR ======== --}}
    <nav class="navbar" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18 lg:h-20">

                {{-- Logo —}}
                <a href="{{ route('beranda') }}" class="flex items-center gap-3 no-underline">
                    <div
                        class="w-10 h-10 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center border border-white/20">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M2 10l10-7 10 7M4 10v10a1 1 0 001 1h14a1 1 0 001-1V10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9 21v-6a1 1 0 011-1h4a1 1 0 011 1v6" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div>
                        <span
                            class="nav-logo-text text-white font-bold text-base leading-tight block transition-colors duration-300">SMKN
                            1 Limboto</span>
                        <span
                            class="text-white/50 text-[0.65rem] font-medium tracking-wider uppercase hidden sm:block">Portal
                            Layanan</span>
                    </div>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('beranda') }}"
                        class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('beranda') }}#layanan" class="nav-link">Layanan</a>
                    <a href="{{ route('beranda') }}#profil" class="nav-link">Profil</a>
                    <a href="{{ route('beranda') }}#berita" class="nav-link">Berita</a>
                    <a href="{{ route('beranda') }}#kontak" class="nav-link">Kontak</a>
                </div>

                {{-- Mobile Menu Button --}}
                <button id="mobile-menu-btn"
                    class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 border border-white/15 text-white transition-colors hover:bg-white/20"
                    aria-label="Menu">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Menu Overlay --}}
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>

    {{-- Mobile Menu Drawer --}}
    <div class="mobile-menu" id="mobile-menu">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <span class="font-bold text-gray-900">Menu Navigasi</span>
            <button id="mobile-menu-close"
                class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-gray-100 transition-colors"
                aria-label="Tutup Menu">
                <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="py-2">
            <a href="{{ route('beranda') }}" class="nav-link">Beranda</a>
            <a href="{{ route('beranda') }}#layanan" class="nav-link">Layanan</a>
            <a href="{{ route('beranda') }}#profil" class="nav-link">Profil</a>
            <a href="{{ route('beranda') }}#berita" class="nav-link">Berita</a>
            <a href="{{ route('beranda') }}#kontak" class="nav-link">Kontak</a>
        </div>
    </div>

    {{-- ======== MAIN CONTENT ======== --}}
    <main>
        @yield('content')
    </main>

    {{-- ======== FOOTER ======== --}}
    <footer class="footer" id="kontak">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Main Footer --}}
            <div class="py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                {{-- Column 1: About --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M2 10l10-7 10 7M4 10v10a1 1 0 001 1h14a1 1 0 001-1V10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9 21v-6a1 1 0 011-1h4a1 1 0 011 1v6" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-white font-bold text-sm block">SMKN 1 Limboto</span>
                            <span class="text-white/40 text-xs">Portal Layanan Digital</span>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-white/50 mb-6">
                        Portal layanan sistem informasi terpadu SMKN 1 Limboto. Menyediakan akses mudah ke seluruh
                        layanan digital sekolah.
                    </p>
                </div>

                {{-- Column 2: Quick Links --}}
                <div>
                    <h4 class="text-white font-semibold text-sm mb-5 uppercase tracking-wider">Tautan Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('beranda') }}" class="text-sm hover:text-white/100">Beranda</a></li>
                        <li><a href="{{ route('beranda') }}#layanan" class="text-sm hover:text-white/100">Layanan</a>
                        </li>
                        <li><a href="{{ route('beranda') }}#profil" class="text-sm hover:text-white/100">Profil
                                Sekolah</a></li>
                        <li><a href="{{ route('beranda') }}#berita" class="text-sm hover:text-white/100">Berita &
                                Kegiatan</a></li>
                    </ul>
                </div>

                {{-- Column 3: Services --}}
                <div>
                    <h4 class="text-white font-semibold text-sm mb-5 uppercase tracking-wider">Layanan</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('layanan.detail', 'e-raport') }}"
                                class="text-sm hover:text-white/100">E-Raport</a></li>
                        <li><a href="{{ route('layanan.detail', 'lms') }}" class="text-sm hover:text-white/100">LMS</a>
                        </li>
                        <li><a href="{{ route('layanan.detail', 'dapodik') }}"
                                class="text-sm hover:text-white/100">Dapodik</a></li>
                        <li><a href="{{ route('layanan.detail', 'pekael') }}"
                                class="text-sm hover:text-white/100">PeKaeL</a></li>
                    </ul>
                </div>

                {{-- Column 4: Contact --}}
                <div>
                    <h4 class="text-white font-semibold text-sm mb-5 uppercase tracking-wider">Kontak</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 mt-0.5 text-white/40 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Jl. Jend. Panjaitan, Limboto, Gorontalo</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 mt-0.5 text-white/40 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>info@smkn1limboto.sch.id</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 mt-0.5 text-white/40 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>(0435) 881234</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom bar --}}
            <div class="border-t border-white/10 py-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-white/40">&copy; {{ date('Y') }} SMKN 1 Limboto. Seluruh hak cipta dilindungi.
                </p>
                <div class="flex items-center gap-4">
                    <a href="#"
                        class="w-8 h-8 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 transition-colors"
                        aria-label="Facebook">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 transition-colors"
                        aria-label="Instagram">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-8 h-8 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 transition-colors"
                        aria-label="YouTube">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>