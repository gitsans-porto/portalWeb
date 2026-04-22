<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel'); ?> — SMKN 1 Limboto</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

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
            background: #F5F7FF; /* Very light indigo background */
            color: #5D5FEF; /* TwitHR purple text */
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
            color: #5D5FEF;
            padding-left: 30px;
        }

        .dropdown-link i {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #E2E8F0;
            margin-right: 12px;
        }

        .dropdown-link:hover i {
            background: #5D5FEF;
            box-shadow: 0 0 8px rgba(93, 95, 239, 0.3);
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

    
    <aside class="admin-sidebar" id="adminSidebar">
        
        <div class="px-8 py-10 flex items-center gap-3">
            <div class="w-12 h-12 bg-indigo-50 border border-indigo-100 rounded-xl flex items-center justify-center p-1.5 overflow-hidden shadow-sm">
                <img src="<?php echo e(asset('images/LogoSMKN1LimbotoNoBG.png')); ?>" alt="Logo SMKN 1 Limboto" class="w-full h-full object-contain">
            </div>
            <div>
                <h2 class="font-black text-lg leading-none text-gray-900">Admin</h2>
                <p class="text-[0.65rem] text-indigo-600 font-bold uppercase tracking-widest mt-1">Portal Layanan</p>
            </div>
        </div>

        
        <nav class="mt-4">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span>Dashboard</span>
            </a>

            <div class="px-8 py-4 text-[0.65rem] font-black uppercase tracking-[0.2em] text-slate-300">Konten Profil</div>
            
            <div class="sidebar-dropdown-wrapper">
                <a href="<?php echo e(route('admin.profiles.index')); ?>" class="sidebar-link <?php echo e(request()->is('admin/profiles*') ? 'active' : ''); ?>">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Kelola Profil</span>
                    <svg class="w-4 h-4 ml-auto opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                
                <div class="sidebar-dropdown">
                    <a href="<?php echo e(route('admin.profiles.edit', 'tentang_sekolah')); ?>" class="dropdown-link">
                        <i></i> <span>Tentang Sekolah</span>
                    </a>
                    <a href="<?php echo e(route('admin.profiles.edit', 'visi_misi')); ?>" class="dropdown-link">
                        <i></i> <span>Visi & Misi</span>
                    </a>
                    <a href="<?php echo e(route('admin.profiles.edit', 'kepala_sekolah')); ?>" class="dropdown-link">
                        <i></i> <span>Kepala Sekolah</span>
                    </a>
                </div>
            </div>

            
            <div class="absolute bottom-6 left-0 right-0 px-4">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
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

    
    <div class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" id="adminOverlay"></div>

    
    <main class="main-content">
        
        <header class="admin-topbar">
            
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
                    <span><?php echo e(date('d F, Y')); ?></span>
                </div>
                
                <div class="flex items-center gap-3 pl-6 border-l border-gray-100">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                        <p class="text-[0.65rem] text-gray-400 uppercase font-black tracking-widest">Administrator</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                        <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                    </div>
                </div>
            </div>
        </header>

        
        <?php if(session('success')): ?>
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-medium"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        
        <?php echo $__env->yieldContent('content'); ?>
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
<?php /**PATH C:\xampp\htdocs\portalWeb\portalWeb\resources\views/layouts/admin.blade.php ENDPATH**/ ?>