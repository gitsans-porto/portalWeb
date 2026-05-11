@extends('layouts.admin')

@section('title', 'Edit Postingan Mading')

@section('content')
    <div class="reveal">
        {{-- Header --}}
        <div class="mb-10">
            <a href="{{ route('admin.mading.index') }}"
               class="inline-flex items-center text-sm font-bold text-gray-400 hover:text-red-600 transition-colors mb-2">
                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Edit Postingan Mading</h1>
            <p class="text-gray-400 text-sm mt-1 font-medium">{{ Str::limit($post->title, 60) }}</p>
        </div>

        <form action="{{ route('admin.mading.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left: Konten --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 space-y-7">
                        <div class="flex items-center gap-3 pb-5 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Konten</h3>
                        </div>

                        {{-- Judul --}}
                        <div>
                            <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2" for="title">
                                Judul <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                                   class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-semibold text-lg"
                                   required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Isi --}}
                        <div>
                            <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2" for="content">
                                Isi <span class="text-red-500">*</span>
                            </label>
                            <textarea id="content" name="content" rows="16"
                                      class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium leading-relaxed"
                                      required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Right: Info & Aksi --}}
                <div class="space-y-6">

                    {{-- Info Postingan --}}
                    <div class="bg-white rounded-[2rem] p-7 shadow-sm border border-gray-100 space-y-5">
                        <div class="flex items-center gap-3 pb-4 border-b border-gray-50">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Info Postingan</h3>
                        </div>

                        {{-- Kategori --}}
                        <div>
                            <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2" for="category">Kategori</label>
                            <select id="category" name="category"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-semibold text-sm">
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}" {{ old('category', $post->category) === $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nama Penulis --}}
                        <div>
                            <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2" for="author_name">Nama Penulis</label>
                            <input type="text" id="author_name" name="author_name"
                                   value="{{ old('author_name', $post->author_name) }}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all text-sm font-medium"
                                   required>
                        </div>

                        {{-- Kelas --}}
                        <div>
                            <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2" for="author_class">
                                Kelas / Jabatan
                                <span class="text-gray-300 normal-case font-semibold">(opsional)</span>
                            </label>
                            <input type="text" id="author_class" name="author_class"
                                   value="{{ old('author_class', $post->author_class) }}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all text-sm font-medium">
                        </div>

                        {{-- Tanggal Terbit --}}
                        <div>
                            <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2" for="published_at">Tanggal Terbit</label>
                            <input type="datetime-local" id="published_at" name="published_at"
                                   value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all text-sm font-semibold">
                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div class="bg-white rounded-[2rem] p-7 shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 pb-4 border-b border-gray-50 mb-5">
                            <div class="w-1.5 h-6 bg-red-600 rounded-full"></div>
                            <h3 class="font-black text-gray-900 uppercase tracking-widest text-xs">Gambar</h3>
                        </div>

                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                 class="w-full rounded-2xl object-cover max-h-44 mb-4">
                            <p class="text-[10px] text-gray-400 italic mb-4">Gambar saat ini. Upload baru untuk mengganti.</p>
                        @endif

                        <div class="w-full rounded-2xl bg-gray-50 border-2 border-dashed border-gray-200
                                    hover:border-red-400 transition-colors p-6 text-center group">
                            <svg class="w-7 h-7 mx-auto mb-2 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <input type="file" name="image" id="image" accept="image/*" class="w-full text-xs cursor-pointer text-gray-400">
                        </div>
                        <p class="text-[10px] text-gray-400 italic mt-2">Maks 3MB. JPG, PNG, WebP.</p>
                    </div>

                    {{-- Tombol --}}
                    <button type="submit"
                            class="w-full py-5 rounded-[1.5rem] bg-red-600 text-white font-black uppercase tracking-[0.2em] text-sm shadow-lg shadow-red-200 hover:bg-red-700 hover:-translate-y-1 transition-all">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.mading.index') }}"
                       class="block w-full py-4 rounded-[1.5rem] bg-gray-100 text-gray-400 text-center font-black uppercase tracking-[0.2em] text-sm hover:bg-gray-200 transition-all">
                        Batal
                    </a>

                    {{-- Hapus --}}
                    <div class="border border-red-100 rounded-2xl p-5">
                        <p class="text-xs font-black uppercase tracking-widest text-red-400 mb-3">Zona Berbahaya</p>
                        <form action="{{ route('admin.mading.destroy', $post->id) }}" method="POST"
                              onsubmit="return confirm('Hapus postingan ini secara permanen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full py-3 rounded-xl bg-red-50 text-red-500 font-bold text-sm hover:bg-red-100 transition-colors">
                                Hapus Postingan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
