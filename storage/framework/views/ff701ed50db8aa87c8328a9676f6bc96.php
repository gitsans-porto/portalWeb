<?php $__env->startSection('title', 'Beranda'); ?>
<?php $__env->startSection('meta_description', 'Portal Layanan Sistem Informasi Terpadu SMKN 1 Limboto — Akses E-Raport, LMS, Dapodik, dan PeKaeL dengan mudah.'); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="hero-section" id="layanan" style="background-image: url('<?php echo e(asset('images/gambarSekolah.jpeg')); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        
        <div class="absolute top-1/4 left-10 w-64 h-64 rounded-full bg-white/[0.02] blur-3xl"
            style="animation: float 8s ease-in-out infinite;"></div>
        <div class="absolute bottom-1/4 right-10 w-80 h-80 rounded-full bg-red-500/[0.04] blur-3xl"
            style="animation: float 10s ease-in-out infinite 2s;"></div>
        <div class="absolute top-20 right-1/4 w-40 h-40 rounded-full bg-white/[0.015] blur-2xl"
            style="animation: float 6s ease-in-out infinite 1s;"></div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-0">
            <div class="text-center mb-12 lg:mb-16">
                
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/[0.08] border border-white/[0.12] rounded-full mb-6 backdrop-blur-sm">
                    <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
                    <span class="text-white/70 text-sm font-medium">Portal Aktif — SMKN 1 Limboto</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.1] mb-5 tracking-tight">
                    Portal Layanan
                    <span class="block text-white/90 mt-1">SMKN 1 Limboto</span>
                </h1>

                <p class="text-lg text-white/70 max-w-2xl mx-auto leading-relaxed">
                    Akses seluruh layanan digital SMKN 1 Limboto dalam satu platform terpadu.
                    Temukan panduan lengkap dan akses cepat ke setiap layanan.
                </p>
            </div>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-5 max-w-5xl mx-auto">

                <?php $__currentLoopData = $layananList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $colors = [
                            'blue' => ['bg' => 'bg-blue-500/20', 'text' => 'text-blue-300', 'border' => 'border-blue-400/20'],
                            'green' => ['bg' => 'bg-emerald-500/20', 'text' => 'text-emerald-300', 'border' => 'border-emerald-400/20'],
                            'amber' => ['bg' => 'bg-amber-500/20', 'text' => 'text-amber-300', 'border' => 'border-amber-400/20'],
                            'purple' => ['bg' => 'bg-purple-500/20', 'text' => 'text-purple-300', 'border' => 'border-purple-400/20'],
                        ];
                        $c = $colors[$item['color']] ?? $colors['blue'];
                    ?>

                    <a href="<?php echo e(route('layanan.detail', $item['slug'])); ?>"
                        class="service-card reveal reveal-delay-<?php echo e($index + 1); ?>">

                        <div class="flex flex-col items-center text-center mb-4">
                            <div class="mb-4">
                                <?php if($item['icon'] === 'document-chart-bar'): ?>
                                    <svg class="w-10 h-10 <?php echo e($c['text']); ?>" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM9.75 17.25a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75Zm2.25-3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 .75-.75Zm3.75-1.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-5.25Z" clip-rule="evenodd" />
                                        <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                    </svg>
                                <?php elseif($item['icon'] === 'book'): ?>
                                    <svg class="w-10 h-10 <?php echo e($c['text']); ?>" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                    </svg>
                                <?php elseif($item['icon'] === 'academic-cap'): ?>
                                    <svg class="w-10 h-10 <?php echo e($c['text']); ?>" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.174v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                        <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286a48.4 48.4 0 0 1 9.786 3.283.75.75 0 0 0 .832-.005h-.002Z" />
                                        <path d="M7.084 14.292a.75.75 0 0 0-1.5.036 20.026 20.026 0 0 0 .345 4.084.75.75 0 0 0 1.472-.29 18.56 18.56 0 0 1-.317-3.83Z" />
                                    </svg>
                                <?php elseif($item['icon'] === 'briefcase'): ?>
                                    <svg class="w-10 h-10 <?php echo e($c['text']); ?>" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75a24.726 24.726 0 0 1-7.814-1.259c-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25ZM13.5 4.5h-3a1.5 1.5 0 0 0-1.5 1.5v.054A50.352 50.352 0 0 1 12 6a50.352 50.352 0 0 1 3 .054V6a1.5 1.5 0 0 0-1.5-1.5Z" clip-rule="evenodd" />
                                        <path d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.93 0 5.738-.478 8.287-1.336.252-.085.5-.18.713-.31V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                                    </svg>
                                <?php endif; ?>
                            </div>

                            <h3 class="text-white font-bold text-lg mb-1"><?php echo e($item['name']); ?></h3>
                            <p class="text-white text-xs font-medium uppercase tracking-wider opacity-70"><?php echo e($item['tagline']); ?></p>
                        </div>

                        <p class="text-white text-sm leading-relaxed mb-4 opacity-80"><?php echo e(Str::limit($item['description'], 80)); ?></p>

                        <div
                            class="flex items-center gap-1.5 text-white text-sm font-medium opacity-80 hover:opacity-100 transition-opacity">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            
            <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-14 mt-14 text-center">
                <div>
                    <div class="text-2xl font-bold text-white">4</div>
                    <div class="text-white text-xs font-medium mt-1 uppercase tracking-wider opacity-80">Layanan Aktif</div>
                </div>
                <div class="w-px h-8 bg-white/10 hidden sm:block"></div>
                <div>
                    <div class="text-2xl font-bold text-white">3</div>
                    <div class="text-white text-xs font-medium mt-1 uppercase tracking-wider opacity-80">Platform Terintegrasi</div>
                </div>
                <div class="w-px h-8 bg-white/10 hidden sm:block"></div>
                <div>
                    <div class="text-2xl font-bold text-white">24/7</div>
                    <div class="text-white text-xs font-medium mt-1 uppercase tracking-wider opacity-80">Akses Online</div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="py-20 lg:py-28 bg-white relative overflow-hidden" id="profil">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                
                <style>
                    .profil-gambar-wrapper {
                        width: 100%;
                        position: relative;
                        z-index: 20;
                    }
                    /* Trik membesarkan gambar menembus batas grid untuk Desktop tanpa peduli kompilasi Tailwind */
                    @media (min-width: 1024px) {
                        .profil-gambar-wrapper {
                            width: 160%;
                            margin-right: -4rem;
                        }
                    }
                    .profil-badge {
                        position: absolute;
                        bottom: 0;
                        left: 50%;
                        transform: translateX(-50%);
                        background-color: white;
                        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
                        border-radius: 1rem;
                        padding: 1rem 1.5rem;
                        display: flex;
                        align-items: center;
                        gap: 1rem;
                        border: 1px solid #f3f4f6;
                        width: max-content;
                        z-index: 30;
                        transition: transform 0.3s ease;
                    }
                    .profil-badge:hover {
                        transform: translate(-50%, -5px);
                    }
                </style>
                <div class="reveal relative flex justify-center lg:justify-end">
                    <div class="profil-gambar-wrapper">
                        <img src="<?php echo e(asset('images/foto_siswa.png')); ?>" alt="Siswa SMKN 1 Limboto" class="w-full h-auto relative pointer-events-none" style="filter: drop-shadow(0 20px 25px rgba(0,0,0,0.15));">
                        
                        
                        <div class="profil-badge">
                            <div class="flex items-center justify-center flex-shrink-0" style="width: 2.75rem; height: 2.75rem; border-radius: 9999px; background-color: #fef2f2;">
                                <svg class="text-primary" style="width: 1.5rem; height: 1.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h4 class="font-bold text-gray-900 leading-tight" style="font-size: 1rem; margin-bottom: 0.15rem;">Terakreditasi A</h4>
                                <p class="text-gray-500 leading-snug" style="font-size: 0.85rem;">Lembaga pendidikan unggulan</p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="reveal reveal-delay-2 lg:pl-6">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-red-50 text-primary text-xs font-bold tracking-wide mb-6">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z" />
                        </svg>
                        Profil Sekolah
                    </span>
                    
                    <h2 class="text-[2.5rem] sm:text-5xl lg:text-[3.25rem] font-bold text-gray-900 leading-[1.1] mb-6 tracking-tight">
                        Mencetak Lulusan <br class="hidden sm:block">
                        <span class="text-primary">Berkarakter</span> & Siap Kerja.
                    </h2>

                    <div class="pl-5 border-l-[3px] border-primary mb-10 py-1">
                        <p class="text-[1.05rem] sm:text-[1.15rem] text-gray-500 italic leading-relaxed">
                            "Menjadi lembaga pendidikan kejuruan unggulan yang menghasilkan lulusan berkarakter, berkompeten, dan berdaya saing di era digital dan global."
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 sm:gap-10">
                        
                        <div>
                            <div class="flex items-center gap-2.5 mb-4">
                                <svg class="w-[1.15rem] h-[1.15rem] text-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm0-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                </svg>
                                <h3 class="font-bold text-gray-900 text-lg">Fokus Misi Kami</h3>
                            </div>
                            <ul class="space-y-3.5">
                                <li class="flex items-start gap-2.5">
                                    <svg class="w-[1.2rem] h-[1.2rem] text-emerald-500 flex-shrink-0 mt-[0.1rem]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-[0.95rem] text-gray-500 leading-snug">Pendidikan berbasis teknologi informasi.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <svg class="w-[1.2rem] h-[1.2rem] text-emerald-500 flex-shrink-0 mt-[0.1rem]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-[0.95rem] text-gray-500 leading-snug">Kemitraan kuat dengan Dunia Industri.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <svg class="w-[1.2rem] h-[1.2rem] text-emerald-500 flex-shrink-0 mt-[0.1rem]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-[0.95rem] text-gray-500 leading-snug">Pembentukan karakter berintegritas.</span>
                                </li>
                            </ul>
                        </div>

                        
                        <div>
                            <div class="flex items-center gap-2.5 mb-4">
                                <svg class="w-[1.15rem] h-[1.15rem] text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                                <h3 class="font-bold text-gray-900 text-lg">Keunggulan</h3>
                            </div>
                            <ul class="space-y-3.5">
                                <li class="flex items-start gap-2.5">
                                    <svg class="w-4 h-4 text-blue-600 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13 2.05v7.45h6l-9 12v-7.5H4l9-11.95z"/>
                                    </svg>
                                    <span class="text-[0.95rem] text-gray-500 leading-snug">Fasilitas lab lengkap & modern.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <svg class="w-4 h-4 text-blue-600 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13 2.05v7.45h6l-9 12v-7.5H4l9-11.95z"/>
                                    </svg>
                                    <span class="text-[0.95rem] text-gray-500 leading-snug">Teaching Factory mitra industri ternama.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <svg class="w-4 h-4 text-blue-600 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13 2.05v7.45h6l-9 12v-7.5H4l9-11.95z"/>
                                    </svg>
                                    <span class="text-[0.95rem] text-gray-500 leading-snug">Sistem informasi digital terintegrasi.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="w-full h-px bg-gray-200 mt-24 mb-16 max-w-6xl mx-auto"></div>

            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 md:gap-6 lg:gap-10 text-center reveal reveal-delay-3 max-w-6xl mx-auto">
                <div class="flex flex-col items-center justify-center">
                    <div class="text-[2.75rem] lg:text-[3.25rem] font-black text-primary leading-none mb-3">1200+</div>
                    <div class="text-[0.7rem] sm:text-xs font-bold text-gray-500 tracking-[0.1em] uppercase">Siswa Aktif</div>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="text-[2.75rem] lg:text-[3.25rem] font-black text-gray-900 leading-none mb-3">85+</div>
                    <div class="text-[0.7rem] sm:text-xs font-bold text-gray-500 tracking-[0.1em] uppercase">Tenaga Pendidik</div>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="text-[2.75rem] lg:text-[3.25rem] font-black text-gray-900 leading-none mb-3">9</div>
                    <div class="text-[0.7rem] sm:text-xs font-bold text-gray-500 tracking-[0.1em] uppercase">Kompetensi Keahlian</div>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="text-[2.75rem] lg:text-[3.25rem] font-black text-gray-900 leading-none mb-3">50+</div>
                    <div class="text-[0.7rem] sm:text-xs font-bold text-gray-500 tracking-[0.1em] uppercase">Mitra Industri</div>
                </div>
            </div>

        </div>
    </section>

    
    <section class="py-20 lg:py-28 bg-white" id="berita">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-12 reveal">
                <div>
                    <span class="section-badge mb-4">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5" />
                        </svg>
                        Berita & Kegiatan
                    </span>
                    <h2 class="section-title">Informasi Terbaru</h2>
                </div>
                <a href="<?php echo e(route('berita.index')); ?>" class="btn-outline text-sm flex-shrink-0 self-start sm:self-auto">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php $__empty_1 = true; $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="news-card group reveal reveal-delay-<?php echo e($index + 1); ?>">
                        <div class="news-card-image overflow-hidden aspect-video relative">
                            <?php if($item->image): ?>
                                <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-xs font-semibold text-primary bg-red-50 px-2.5 py-1 rounded-full">
                                    <?php echo e($item->category ?? 'Umum'); ?>

                                </span>
                                <span class="text-xs text-gray-400">
                                    <?php echo e($item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y')); ?>

                                </span>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2 leading-snug hover:text-red-600 transition-colors">
                                <a href="<?php echo e(route('berita.show', $item->slug)); ?>"><?php echo e($item->title); ?></a>
                            </h3>
                            <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                                <?php echo e(Str::limit(strip_tags($item->content), 100)); ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full py-12 text-center">
                        <p class="text-gray-400 italic">Belum ada berita terbaru saat ini.</p>
                    </div>
                <?php endif; ?>

            </div>

            </div>
        </div>
    </section>

    
    <section class="py-20 lg:py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-primary/10 blur-[120px] rounded-full">
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-5 tracking-tight">
                Siap Mengakses Layanan Digital Sekolah?
            </h2>
            <p class="text-lg text-white/50 mb-10 max-w-2xl mx-auto">
                Pilih layanan yang Anda butuhkan dan ikuti panduan penggunaan yang telah disediakan. Seluruh layanan dapat
                diakses kapan saja, di mana saja.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#layanan" class="btn-primary">
                    Jelajahi Layanan
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>
                <a href="#kontak" class="btn-white">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\portalWeb\portalWeb\resources\views/beranda.blade.php ENDPATH**/ ?>