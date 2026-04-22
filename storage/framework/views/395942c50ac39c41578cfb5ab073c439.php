<?php $__env->startSection('title', 'Tentang Sekolah'); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="detail-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col items-center text-center">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white/10 text-white/90 text-xs font-bold tracking-wide mb-6 backdrop-blur-md border border-white/10">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z" />
                    </svg>
                    Profil Sekolah
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    <?php echo e($profile->title); ?>

                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    <?php echo e($profile->short_description); ?>

                </p>
            </div>
        </div>
        
        
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500/10 blur-[80px] rounded-full pointer-events-none"></div>
    </section>

    <div class="py-20 bg-surface-alt min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            
            
            <div class="bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-gray-100 overflow-hidden reveal">
                
                
                <div class="p-8 md:p-16 lg:p-20">
                    
                    
                    <div class="flex justify-center mb-16">
                        <div class="w-full max-w-3xl rounded-3xl overflow-hidden shadow-2xl border-4 border-white ring-1 ring-gray-100 transition-transform duration-500 hover:scale-[1.01]">
                            <img src="<?php echo e($profile->image && Storage::disk('public')->exists($profile->image) ? asset('storage/' . $profile->image) : asset($profile->image)); ?>" alt="<?php echo e($profile->title); ?>" class="w-full h-auto object-cover">
                        </div>
                    </div>

                    
                    <div class="space-y-8 text-gray-600 leading-relaxed text-lg max-w-4xl mx-auto text-justify">
                        <?php echo nl2br(e($profile->content)); ?>

                    </div>

                    
                    <div class="my-20 flex items-center gap-4">
                        <div class="h-px bg-gray-100 flex-grow"></div>
                        <div class="w-2 h-2 rounded-full bg-primary/20"></div>
                        <div class="h-px bg-gray-100 flex-grow"></div>
                    </div>

                    
                    <div class="mt-16">
                        <div class="text-center mb-12">
                            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/5 text-primary text-xs font-bold uppercase tracking-widest mb-4">Akses & Lokasi</span>
                            <h2 class="text-2xl md:text-4xl font-black text-gray-900">Lokasi <?php echo e($profile->title); ?></h2>
                            <div class="w-16 h-1 bg-primary mx-auto mt-6 rounded-full"></div>
                        </div>

                        <div class="group relative">
                            <div class="absolute -inset-4 bg-primary/5 rounded-[2.5rem] blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                            
                            <div class="relative w-full rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white ring-1 ring-gray-100 bg-gray-50" style="height: 600px;">
                                <?php
                                    $mapUrl = $profile->additional_data['map_iframe'] ?? '';
                                    $isEmbed = str_contains($mapUrl, 'google.com/maps/embed');
                                ?>

                                <?php if($mapUrl && $isEmbed): ?>
                                    <iframe 
                                        src="<?php echo e($mapUrl); ?>" 
                                        width="100%" 
                                        height="100%" 
                                        style="border:0;" 
                                        allowfullscreen="" 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                <?php elseif($mapUrl && !$isEmbed): ?>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-500 bg-gray-50 px-10 text-center">
                                        <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center mb-6">
                                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">Link Google Maps Tidak Valid</h3>
                                        <p class="text-sm leading-relaxed mb-6">Anda memasukkan link biasa. Website hanya bisa menampilkan link <strong>"Embed/Sematkan"</strong> agar tidak diblokir oleh Google.</p>
                                        <a href="/admin/profiles/tentang_sekolah/edit" class="px-6 py-2 bg-primary text-white rounded-full text-xs font-bold uppercase tracking-widest">Perbaiki di Admin</a>
                                    </div>
                                <?php else: ?>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-400 bg-gray-50 px-6 text-center">
                                        <svg class="w-16 h-16 mb-4 opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.447-.894L15 4m0 13V4m0 0L9 7" />
                                        </svg>
                                        <p class="font-medium">Lokasi belum dikonfigurasi</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="mt-8 flex flex-col md:flex-row items-center justify-center gap-6 text-sm text-gray-500 italic">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary/60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span><?php echo e($profile->additional_data['address'] ?? 'Jl. Jend. Panjaitan, Limboto, Gorontalo'); ?></span>
                            </div>
                            <div class="hidden md:block w-1.5 h-1.5 rounded-full bg-gray-200"></div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary/60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Buka: <?php echo e($profile->additional_data['opening_hours'] ?? 'Senin - Jumat (07:00 - 15:30)'); ?></span>
                            </div>
                        </div>
                    </div>

                </div>

                
                <div class="bg-gray-50/50 p-10 text-center border-t border-gray-50">
                    <p class="text-sm font-medium text-gray-400 tracking-wide uppercase">© <?php echo e(date('Y')); ?> <?php echo e($profile->title); ?> — Sekolah Rujukan Berkualitas</p>
                </div>
            </div>

            
            <div class="mt-10 text-center">
                <a href="<?php echo e(route('beranda')); ?>" class="btn-outline">
                    <svg class="w-4 h-4 mr-2 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\portalWeb\portalWeb\resources\views/profil/tentang-sekolah.blade.php ENDPATH**/ ?>