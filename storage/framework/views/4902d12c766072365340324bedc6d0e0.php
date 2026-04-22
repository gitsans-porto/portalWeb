

<?php $__env->startSection('title', 'Edit ' . $profile->title); ?>

<?php $__env->startSection('content'); ?>
    <div class="reveal">
        
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <a href="<?php echo e(route('admin.profiles.index')); ?>" class="inline-flex items-center text-sm font-bold text-gray-400 hover:text-red-600 transition-colors mb-2">
                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Edit Konten: <?php echo e($profile->title); ?></h1>
            </div>
            
            <div class="flex items-center gap-4">
                <span class="admin-badge bg-red-50 text-red-600 px-4 py-2"><?php echo e($profile->section); ?></span>
            </div>
        </div>

        <form action="<?php echo e(route('admin.profiles.update', $profile->section)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-10">
                
                
                <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-10 pb-6 border-b border-gray-50">
                        <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                        <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Informasi Utama</h3>
                    </div>
                    
                    <div class="space-y-8">
                        <div class="flex flex-col gap-3">
                            <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="title">Judul Halaman</label>
                            <input type="text" id="title" name="title" value="<?php echo e(old('title', $profile->title)); ?>" class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium" placeholder="Masukkan judul..." required>
                        </div>

                        <div class="flex flex-col gap-3">
                            <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="short_description">Deskripsi Singkat (Hero)</label>
                            <textarea id="short_description" name="short_description" rows="3" class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium leading-relaxed"><?php echo e(old('short_description', $profile->short_description)); ?></textarea>
                        </div>

                        <div class="flex flex-col gap-3">
                            <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="content">Konten Utama / Sambutan</label>
                            <textarea id="content" name="content" rows="12" class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium leading-relaxed" placeholder="Tulis konten lengkap di sini..." required><?php echo e(old('content', $profile->content)); ?></textarea>
                        </div>
                    </div>
                </div>

                
                <?php if($profile->section !== 'visi_misi'): ?>
                <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-10 pb-6 border-b border-gray-50">
                        <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                        <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Media / Gambar</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                        <div class="aspect-video w-full rounded-2xl overflow-hidden shadow-md border border-gray-100 bg-gray-50 relative group">
                            <?php if($profile->image): ?>
                                <img src="<?php echo e(Storage::disk('public')->exists($profile->image) ? asset('storage/' . $profile->image) : asset($profile->image)); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-300">
                                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="space-y-6">
                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="image">Ganti Gambar</label>
                                <input type="file" id="image" name="image" class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer">
                                <p class="text-[10px] text-gray-400 italic">Format JPG/PNG. Maksimal ukuran 2MB.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                
                <?php if($profile->section === 'tentang_sekolah'): ?>
                    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-10 pb-6 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Akses & Lokasi</h3>
                        </div>
                        
                        <div class="space-y-8">
                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="address">Alamat Lengkap</label>
                                <input type="text" id="address" name="additional_data[address]" value="<?php echo e(old('additional_data.address', $profile->additional_data['address'] ?? '')); ?>" class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium" placeholder="Alamat sekolah...">
                            </div>

                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="map_iframe">Google Maps Iframe URL</label>
                                <textarea id="map_iframe" name="additional_data[map_iframe]" rows="3" class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium leading-relaxed" placeholder="https://www.google.com/maps/embed?..."><?php echo e(old('additional_data.map_iframe', $profile->additional_data['map_iframe'] ?? '')); ?></textarea>
                                <div class="bg-red-50 rounded-2xl p-4 mt-2 border border-red-100">
                                    <p class="text-[10px] text-red-700 font-bold flex items-center gap-2 mb-1">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        CARA MENDAPATKAN LINK EMBED:
                                    </p>
                                    <ol class="text-[10px] text-red-600 space-y-1 list-decimal ml-4 leading-relaxed">
                                        <li>Buka Google Maps, cari lokasi sekolah.</li>
                                        <li>Klik tombol <strong>"Share" (Bagikan)</strong>.</li>
                                        <li>Pilih tab <strong>"Embed a map" (Sematkan peta)</strong>.</li>
                                        <li>Klik <strong>"Copy HTML"</strong>, lalu ambil hanya bagian <strong>src="..."</strong> nya saja (mulai dari https:// sampai tanda petik).</li>
                                    </ol>
                                </div>
                            </div>

                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="opening_hours">Jam Operasional</label>
                                <input type="text" id="opening_hours" name="additional_data[opening_hours]" value="<?php echo e(old('additional_data.opening_hours', $profile->additional_data['opening_hours'] ?? '')); ?>" class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium" placeholder="Contoh: Senin - Jumat (07:00 - 15:30)">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($profile->section === 'visi_misi'): ?>
                    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-10 pb-6 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Visi Sekolah</h3>
                        </div>
                        <div class="flex flex-col gap-3">
                            <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="vision">Kalimat Visi</label>
                            <textarea id="vision" name="additional_data[vision]" rows="4" class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium leading-relaxed" placeholder="Visi sekolah..."><?php echo e(old('additional_data.vision', $profile->additional_data['vision'] ?? '')); ?></textarea>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-10 pb-6 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Daftar Misi</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php $__currentLoopData = $profile->additional_data['missions'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="p-6 bg-gray-50 rounded-3xl border border-gray-100 space-y-4 shadow-sm">
                                    <div class="flex items-center gap-2">
                                        <span class="w-6 h-6 rounded-lg bg-red-600 text-white flex items-center justify-center text-[10px] font-bold"><?php echo e($index + 1); ?></span>
                                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Item Misi</span>
                                    </div>
                                    <div class="space-y-4">
                                        <input type="text" name="additional_data[missions][<?php echo e($index); ?>][title]" value="<?php echo e($mission['title']); ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-100 outline-none font-bold text-sm" placeholder="Judul misi...">
                                        <textarea name="additional_data[missions][<?php echo e($index); ?>][description]" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-100 outline-none text-sm leading-relaxed" placeholder="Deskripsi misi..."><?php echo e($mission['description']); ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if($profile->section === 'kepala_sekolah'): ?>
                    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-10 pb-6 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Kontak & Informasi Tambahan</h3>
                        </div>
                        
                        <div class="space-y-8">
                            <div class="flex flex-col gap-3">
                                <label class="text-xs font-black text-gray-400 uppercase tracking-wider block" for="phone">Nomor HP / Kontak (Opsional)</label>
                                <input type="text" id="phone" name="additional_data[phone]" value="<?php echo e(old('additional_data.phone', $profile->additional_data['phone'] ?? '')); ?>" class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium" placeholder="Contoh: 0812-xxxx-xxxx">
                                <p class="text-[10px] text-gray-400 italic">Akan muncul di bagian bawah sambutan kepala sekolah.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                
                <div class="pt-10 flex flex-col items-center gap-6">
                    <button type="submit" style="background-color: #FE0002; color: white; width: 100%; max-width: 400px; padding: 1.5rem; border-radius: 1.5rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.25em; font-size: 0.875rem; border: none; cursor: pointer; box-shadow: 0 20px 40px -10px rgba(254, 0, 2, 0.4);">
                        Simpan Perubahan
                    </button>
                    
                    <div class="flex items-center gap-3 text-amber-600 bg-amber-50 px-6 py-3 rounded-full border border-amber-100">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-[10px] font-black uppercase tracking-widest">Perubahan akan langsung tayang di portal publik</span>
                    </div>
                </div>

            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\portalWeb\portalWeb\resources\views/admin/profiles/edit.blade.php ENDPATH**/ ?>