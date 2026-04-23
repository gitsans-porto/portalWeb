<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') — SMKN 1 Limboto</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Sidebar specific styles to ensure TwitHR look regardless of Tailwind version */
        .admin-sidebar {
            width: 260px;
            background: #FFFFFF; /* Pure white sidebar */
            color: #1E293B; /* Dark text */
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 50;
            transition: all 0.3s ease;
            border-right: 1px solid rgba(0,0,0,0.06); /* Subtle border instead of color contrast */
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            margin: 4px 16px;
            border-radius: 12px;
            color: #64748B; /* Soft gray-500 text */
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover, .sidebar-link.active {
            background: #FEF2F2; /* Very light red background */
            color: #FE0002; /* School red text */
        }

        /* Dropdown Styles */
        .sidebar-dropdown-wrapper {
            position: relative;
        }

        .sidebar-dropdown {
            max-height: 0;
            overflow: hidden;
            background: #FBFBFE; /* Lighter than main sidebar */
            margin: 0 16px;
            border-radius: 12px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
        }

        .sidebar-dropdown-wrapper:hover .sidebar-dropdown {
            max-height: 200px;
            opacity: 1;
            margin-top: 4px;
            margin-bottom: 8px;
            padding: 8px 0;
            border: 1px solid #F0F2F9;
        }

        .dropdown-link {
            display: flex;
            align-items: center;
            padding: 10px 24px;
            font-size: 0.8rem;
            color: #94A3B8; /* Slate-400 */
            text-decoration: none;
            transition: all 0.2s ease;
            font-weight: 600;
        }

        .dropdown-link:hover {
            color: #FE0002;
            padding-left: 30px;
        }
        
        .section-tag {
            color: #94A3B8;
            font-weight: 800;
            background: #F8FAFC;
            border-radius: 6px;
            padding: 2px 8px;
        }

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            background: #F8F9FC;
            padding: 24px 40px;
        }

        .admin-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .card-twit {
            background: white;
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.03);
            border: 1px solid rgba(0,0,0,0.02);
        }

        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 24px 20px;
            }
        }
    </style>
</head>

<body class="antialiased font-sans bg-gray-50">

    {{-- Sidebar --}}
    <aside class="admin-sidebar" id="adminSidebar">
        {{-- Logo Area --}}
        <div class="px-8 py-10 flex items-center gap-3">
            <div class="w-12 h-12 bg-red-50 border border-red-100 rounded-xl flex items-center justify-center p-1.5 overflow-hidden shadow-sm">
                <img src="{{ asset('images/LogoSMKN1LimbotoNoBG.png') }}" alt="Logo SMKN 1 Limboto" class="w-full h-full object-contain">
            </div>
            <div>
                <h2 class="font-black text-lg leading-none text-gray-900">Admin</h2>
                <p class="text-[0.65rem] text-red-600 font-bold uppercase tracking-widest mt-1">Portal Layanan</p>
            </div>
        </div>

        {{-- Nav Links --}}
        <nav class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span>Dashboard</span>
            </a>

            
            <div class="sidebar-dropdown-wrapper">
                <a href="javascript:void(0)" class="sidebar-link {{ request()->is('admin/profiles*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Kelola Profil</span>
                    <svg class="w-4 h-4 ml-auto opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                
                <div class="sidebar-dropdown">
                    <a href="{{ route('admin.profiles.edit', 'tentang_sekolah') }}" class="dropdown-link">
                        <span>Tentang Sekolah</span>
                    </a>
                    <a href="{{ route('admin.profiles.edit', 'visi_misi') }}" class="dropdown-link">
                        <span>Visi & Misi</span>
                    </a>
                    <a href="{{ route('admin.profiles.edit', 'kepala_sekolah') }}" class="dropdown-link">
                        <span>Kepala Sekolah</span>
                    </a>
                </div>
            </div>


            <a href="{{ route('admin.news.index') }}" class="sidebar-link {{ request()->is('admin/news*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <span>Kelola Berita</span>
            </a>
            <div class="sidebar-dropdown-wrapper">
                <a href="javascript:void(0)" class="sidebar-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span>Kelola Layanan</span>
                    <svg class="w-4 h-4 ml-auto dropdown-arrow transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                
                <div class="sidebar-dropdown">
                    @php $sidebarServices = \App\Models\Service::all(); @endphp
                    @foreach($sidebarServices as $service)
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="dropdown-link">
                            <span>{{ $service->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('admin.reports.index') }}" class="sidebar-link {{ request()->is('admin/reports*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>Laporan Masalah</span>
            </a>

            {{-- Logout --}}
            <div class="absolute bottom-6 left-0 right-0 px-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="sidebar-link w-[calc(100%-32px)] border-none bg-transparent cursor-pointer">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    {{-- Overlay for mobile --}}
    <div class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" id="adminOverlay"></div>

    {{-- Main --}}
    <main class="main-content">
        {{-- Top Bar --}}
        <header class="admin-topbar">
            {{-- Mobile Menu Trigger --}}
            <button class="lg:hidden p-2 text-gray-500" id="adminMenuBtn">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <h2 class="text-2xl font-bold text-gray-900 hidden sm:block">Dashboard</h2>
            
            <div class="flex items-center gap-6">
                <div class="hidden md:flex items-center gap-2 text-gray-400 text-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ date('d F, Y') }}</span>
                </div>
                
                <div class="flex items-center gap-3 pl-6 border-l border-gray-100">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</p>
                        <p class="text-[0.65rem] text-gray-400 uppercase font-black tracking-widest">Administrator</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')
    </main>

    <script>
        // Simple sidebar toggle for mobile
        const menuBtn = document.getElementById('adminMenuBtn');
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('adminOverlay');

        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('hidden');
            });
        }

        if (overlay) {
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                overlay.classList.add('hidden');
            });
        }
    </script>
</body>

</html>
