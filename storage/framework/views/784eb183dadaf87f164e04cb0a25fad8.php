<?php $__env->startSection('title', 'Manajemen Berita'); ?>

<?php $__env->startSection('content'); ?>
    <div class="reveal">
        
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Manajemen Berita</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola seluruh artikel, pengumuman, dan berita sekolah.</p>
            </div>
            <a href="<?php echo e(route('admin.news.create')); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-red-600 text-white font-bold hover:bg-red-700 transition-all shadow-lg shadow-red-200">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tulis Berita Baru
            </a>
        </div>

        
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400">Gambar</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400">Judul & Kategori</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400 text-center">Tanggal Publish</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-8 py-5">
                                    <div class="w-16 h-12 rounded-lg bg-gray-100 overflow-hidden border border-gray-100">
                                        <?php if($article->image): ?>
                                            <img src="<?php echo e(asset('storage/' . $article->image)); ?>" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="font-bold text-gray-900 mb-1 group-hover:text-red-600 transition-colors"><?php echo e($article->title); ?></div>
                                    <span class="text-[10px] font-black uppercase tracking-widest px-2 py-0.5 rounded-md bg-red-50 text-red-600"><?php echo e($article->category ?? 'Umum'); ?></span>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <div class="text-sm font-medium text-gray-600">
                                        <?php echo e($article->published_at ? $article->published_at->format('d M Y') : '-'); ?>

                                    </div>
                                    <div class="text-[10px] text-gray-400 uppercase font-bold mt-0.5">
                                        <?php echo e($article->published_at ? $article->published_at->format('H:i') : 'Draft'); ?>

                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?php echo e(route('admin.news.edit', $article->id)); ?>" class="p-2 rounded-xl bg-gray-50 text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all" title="Edit">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <form action="<?php echo e(route('admin.news.destroy', $article->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="p-2 rounded-xl bg-gray-50 text-gray-400 hover:bg-red-100 hover:text-red-600 transition-all" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="px-8 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-200 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        <p class="text-gray-400 font-bold">Belum ada berita yang diterbitkan.</p>
                                        <a href="<?php echo e(route('admin.news.create')); ?>" class="text-red-600 text-sm font-black uppercase tracking-widest mt-4 hover:underline">Tulis Sekarang</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <?php if($news->hasPages()): ?>
                <div class="px-8 py-6 border-t border-gray-50">
                    <?php echo e($news->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\portalWeb\portalWeb\resources\views/admin/news/index.blade.php ENDPATH**/ ?>