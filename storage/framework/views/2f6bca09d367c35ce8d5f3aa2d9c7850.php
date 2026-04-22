<?php $__env->startSection('title', 'Tulis Berita Baru'); ?>

<?php $__env->startSection('content'); ?>
    <div class="reveal">
        
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <a href="<?php echo e(route('admin.news.index')); ?>" class="inline-flex items-center text-sm font-bold text-gray-400 hover:text-red-600 transition-colors mb-2">
                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar
                </a>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Tulis Berita Baru</h1>
            </div>
        </div>

        <form action="<?php echo e(route('admin.news.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-10 pb-6 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Konten Berita</h3>
                        </div>

                        <div class="space-y-8">
                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="title">Judul Berita</label>
                                <input type="text" id="title" name="title" value="<?php echo e(old('title')); ?>" 
                                    class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium text-lg" 
                                    placeholder="Masukkan judul berita yang menarik..." required>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="content">Isi Berita</label>
                                <textarea id="content" name="content" rows="15" 
                                    class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium leading-relaxed" 
                                    placeholder="Tuliskan isi berita lengkap di sini..." required><?php echo e(old('content')); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="space-y-8">
                    
                    <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-8 pb-4 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Informasi Tambahan</h3>
                        </div>

                        <div class="space-y-6">
                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="category">Kategori</label>
                                <select id="category" name="category" class="w-full px-5 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-bold text-sm">
                                    <option value="Akademik">Akademik</option>
                                    <option value="Pengumuman">Pengumuman</option>
                                    <option value="Kegiatan">Kegiatan</option>
                                    <option value="Prestasi">Prestasi</option>
                                    <option value="PKL">PKL</option>
                                    <option value="Umum" selected>Umum</option>
                                </select>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="published_at">Tanggal Terbit</label>
                                <input type="datetime-local" id="published_at" name="published_at" value="<?php echo e(old('published_at', date('Y-m-d\TH:i'))); ?>"
                                    class="w-full px-5 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-bold text-sm">
                            </div>
                        </div>
                    </div>

                    
                    <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-8 pb-4 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Gambar Utama</h3>
                        </div>

                        <div class="space-y-6">
                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="image">Upload Thumbnail</label>
                                <div class="w-full aspect-video rounded-2xl bg-gray-50 border-2 border-dashed border-gray-200 flex flex-col items-center justify-center text-gray-400 group hover:border-red-400 transition-colors p-4 text-center">
                                    <svg class="w-8 h-8 mb-2 group-hover:text-red-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <input type="file" id="image" name="image" class="w-full text-xs cursor-pointer">
                                </div>
                                <p class="text-[10px] text-gray-400 italic">Maksimal 2MB. Format JPG, PNG, atau WebP.</p>
                            </div>
                        </div>
                    </div>

                    
                    <button type="submit" class="w-full py-5 rounded-[1.5rem] bg-red-600 text-white font-black uppercase tracking-[0.2em] text-sm shadow-xl shadow-red-200 hover:bg-red-700 hover:-translate-y-1 transition-all">
                        Terbitkan Berita
                    </button>
                    <a href="<?php echo e(route('admin.news.index')); ?>" class="block w-full py-5 rounded-[1.5rem] bg-gray-100 text-gray-400 text-center font-black uppercase tracking-[0.2em] text-sm hover:bg-gray-200 transition-all">
                        Batalkan
                    </a>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\portalWeb\portalWeb\resources\views/admin/news/create.blade.php ENDPATH**/ ?>