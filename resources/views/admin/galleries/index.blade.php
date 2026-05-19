@extends('layouts.admin')

@section('title', 'Kelola Galeri Kegiatan')

@section('content')
<div class="reveal">
    <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Galeri Kegiatan</h1>
            <p class="text-gray-500 mt-2">Kelola foto-foto kegiatan sekolah yang akan tampil di halaman utama.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-8 bg-emerald-50 text-emerald-600 p-4 rounded-2xl border border-emerald-100 flex items-center gap-3 font-bold text-sm shadow-sm">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Tambah Foto --}}
    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 mb-10">
        <h3 class="text-lg font-black text-gray-900 mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Foto Baru
        </h3>
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            <div>
                <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2">Pilih Foto</label>
                <input type="file" name="image" required class="w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer">
                @error('image') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2">Caption Singkat (Opsional)</label>
                <div class="flex gap-4">
                    <input type="text" name="caption" placeholder="Contoh: Praktek Jurusan TKJ" class="flex-1 px-5 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-red-100 outline-none font-medium text-sm">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-3 rounded-xl transition-colors shadow-sm text-sm whitespace-nowrap">
                        Unggah Foto
                    </button>
                </div>
                @error('caption') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>
        </form>
    </div>

    {{-- Daftar Foto --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($galleries as $gallery)
            <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm group">
                <div class="aspect-video w-full relative overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white p-3 rounded-full hover:bg-red-700 transition-colors shadow-lg">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @if($gallery->caption)
                    <div class="p-4 border-t border-gray-50 text-center">
                        <p class="text-sm font-bold text-gray-700 truncate">{{ $gallery->caption }}</p>
                    </div>
                @endif
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-gray-100 border-dashed">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Foto</h3>
                <p class="text-sm text-gray-500">Galeri kegiatan masih kosong. Silakan unggah foto baru.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
