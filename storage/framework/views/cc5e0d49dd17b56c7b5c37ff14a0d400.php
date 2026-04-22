<?php $__env->startSection('title', 'Kepala Sekolah'); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="detail-hero">
        
        <div class="detail-hero-bg" style="background-image: url('<?php echo e(asset('images/gambarSekolah.jpeg')); ?>')"></div>
        <div class="detail-hero-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <nav class="flex items-center justify-center gap-2 text-sm text-white/40 mb-8">
                <a href="<?php echo e(route('beranda')); ?>" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <a href="<?php echo e(route('beranda')); ?>#profil" class="hover:text-white/70 transition-colors">Profil</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white/70">Kepala Sekolah</span>
            </nav>

            <div class="flex flex-col items-center text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    <?php echo e($profile->title); ?>

                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    <?php echo e($profile->short_description); ?>

                </p>
            </div>
        </div>
        
        
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-500/10 blur-[80px] rounded-full pointer-events-none"></div>
    </section>

    
    <div class="py-20 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-4">
            
            <div class="bg-white rounded-3xl shadow-[0_15px_60px_-15px_rgba(0,0,0,0.1)] overflow-hidden reveal">
                <div class="p-8 md:p-16 lg:p-20">
                    
                    
                    <h1 class="text-2xl md:text-4xl font-black text-gray-800 text-center mb-12 lg:mb-20 uppercase tracking-tight">
                        Sambutan Kepala Sekolah SMKN 1 LIMBOTO
                    </h1>

                    <style>
                        .principal-container {
                            display: flex;
                            flex-direction: column;
                            gap: 3rem;
                        }
                        @media (min-width: 1024px) {
                            .principal-container {
                                flex-direction: row;
                                align-items: flex-start;
                                gap: 4rem;
                            }
                            .principal-content {
                                flex: 1;
                                order: 1;
                            }
                            .principal-photo-area {
                                width: 35%;
                                order: 2;
                            }
                        }
                    </style>

                    <div class="principal-container">
                        
                        
                        <div class="principal-content">
                            <div class="text-gray-700 leading-relaxed text-base md:text-lg text-justify space-y-6">
                                <?php echo nl2br(e($profile->content)); ?>

                            </div>
                            
                            <?php if(!empty($profile->additional_data['phone'])): ?>
                                <div class="mt-12 text-2xl font-black text-gray-900 tracking-tight">
                                    <?php echo e($profile->additional_data['phone']); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="principal-photo-area flex flex-col items-center">
                            <div class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-[12px] border-white shadow-xl mb-8 bg-gray-50 flex-shrink-0">
                                <img src="<?php echo e($profile->image && Storage::disk('public')->exists($profile->image) ? asset('storage/' . $profile->image) : asset($profile->image)); ?>" alt="<?php echo e($profile->title); ?>" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-base md:text-lg font-black text-gray-900 leading-tight uppercase"><?php echo e($profile->title); ?></h3>
                                <div class="w-12 h-0.5 bg-red-600 mx-auto my-3"></div>
                                <p class="text-[0.65rem] md:text-xs text-gray-400 font-bold uppercase tracking-widest"><?php echo e($profile->short_description); ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            
            <div class="mt-12 text-center">
                <a href="<?php echo e(route('beranda')); ?>" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-red-600 rounded-2xl shadow-sm border border-red-100 font-bold hover:bg-red-50 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\portalWeb\portalWeb\resources\views/profil/kepala-sekolah.blade.php ENDPATH**/ ?>