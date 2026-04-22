<?php $__env->startSection('title', 'Dashboard Administrator'); ?>

<?php $__env->startSection('content'); ?>
    <div class="reveal">
        
        <div class="relative overflow-hidden mb-10 rounded-[3rem] bg-white p-10 md:p-14 shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-gray-100">
            <div class="relative z-10 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 text-xs font-black uppercase tracking-widest mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                    </span>
                    Sistem Profil Terpusat
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-6 tracking-tight leading-tight">
                    Selamat Datang, <span class="text-indigo-600"><?php echo e(Auth::user()->name); ?></span>!
                </h1>
                <p class="text-gray-500 text-lg leading-relaxed mb-10">
                    Kelola seluruh konten profil sekolah, visi misi, dan informasi pimpinan melalui panel kontrol ini dengan mudah, cepat, dan terorganisir.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo e(route('admin.profiles.index')); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Mulai Edit Profil
                    </a>
                </div>
            </div>
            
            
            <div class="absolute top-0 right-0 h-full w-1/3 opacity-5 pointer-events-none hidden lg:block">
                <svg class="h-full w-full p-10" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M400 200C400 310.457 310.457 400 200 400C89.543 400 0 310.457 0 200C0 89.543 89.543 0 200 0C310.457 0 400 89.543 400 200Z" fill="url(#paint0_linear)" />
                    <defs>
                        <linearGradient id="paint0_linear" x1="200" y1="0" x2="200" y2="400" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#4F46E5" />
                            <stop offset="1" stop-color="#818CF8" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-blue-50 text-blue-600 mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">1,280+</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Kunjungan</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-indigo-50 text-indigo-600 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">3</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Modul Profil</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-emerald-50 text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">Aktif</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Status Sistem</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-amber-50 text-amber-600 mb-6 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1"><?php echo e(\App\Models\User::count()); ?></div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Administrator</div>
            </div>
        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-2 admin-card">
                <div class="admin-card-header">
                    <h3 class="text-xl font-black text-gray-900 tracking-tight">Manajemen Konten Profil</h3>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Update Terakhir</span>
                        <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php $__currentLoopData = ['tentang_sekolah' => ['Tentang Sekolah', 'bg-blue-50', 'text-blue-600', 'informasi riwayat dan profil sekolah'], 'visi_misi' => ['Visi & Misi', 'bg-indigo-50', 'text-indigo-600', 'pedoman arah dan tujuan sekolah'], 'kepala_sekolah' => ['Kepala Sekolah', 'bg-amber-50', 'text-amber-600', 'sambutan dan profil pimpinan']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col p-6 bg-gray-50 rounded-3xl border border-gray-100 hover:border-indigo-200 transition-all group">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-2xl <?php echo e($info[1]); ?> <?php echo e($info[2]); ?> flex items-center justify-center shadow-sm">
                                <?php if($key == 'tentang_sekolah'): ?>
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                <?php elseif($key == 'visi_misi'): ?>
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                <?php else: ?>
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                <?php endif; ?>
                            </div>
                            <a href="<?php echo e(route('admin.profiles.edit', $key)); ?>" class="opacity-0 group-hover:opacity-100 transition-opacity p-2 rounded-xl bg-white text-indigo-600 shadow-sm">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                            </a>
                        </div>
                        <h4 class="font-black text-gray-900 mb-1"><?php echo e($info[0]); ?></h4>
                        <p class="text-xs text-gray-400 mb-4"><?php echo e($info[3]); ?></p>
                        <div class="mt-auto pt-4 border-t border-gray-100/50">
                            <span class="text-[10px] font-bold uppercase tracking-tighter text-indigo-500">Siap Untuk Diedit</span>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="text-xl font-black text-gray-900 tracking-tight">Aksi Cepat</h3>
                </div>
                <div class="space-y-4">
                    <a href="<?php echo e(url('/')); ?>" target="_blank" class="flex items-center gap-4 p-4 rounded-2xl border border-gray-100 hover:bg-indigo-50 hover:border-indigo-200 transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        </div>
                        <span class="font-bold text-gray-700">Lihat Situs Utama</span>
                    </a>
                    
                    <a href="<?php echo e(route('admin.profiles.index')); ?>" class="flex items-center gap-4 p-4 rounded-2xl border border-gray-100 hover:bg-emerald-50 hover:border-emerald-200 transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <span class="font-bold text-gray-700">Update Foto Profil</span>
                    </a>

                    <div class="pt-6 mt-6 border-t border-gray-100">
                        <div class="bg-gray-50 rounded-2xl p-6 text-center">
                            <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Butuh Bantuan?</div>
                            <p class="text-xs text-gray-500 mb-4">Hubungi tim IT untuk dukungan teknis panel admin.</p>
                            <button class="w-full py-3 rounded-xl bg-gray-900 text-white text-xs font-bold hover:bg-gray-800 transition-colors">Kontak Support</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\portalWeb\portalWeb\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>