@extends('layouts.admin')

@section('title', 'Dashboard Administrator')

@section('content')
@php
    $rawSettings = \App\Models\Setting::all()->keyBy('key');
@endphp
    <div class="reveal">
        {{-- Welcome Card --}}
        <div class="relative overflow-hidden mb-10 rounded-2xl bg-white p-10 md:p-14 shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-gray-100">
            <div class="relative z-10 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-600 text-white text-xs font-black uppercase tracking-widest mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                    </span>
                    Sistem Profil Terpusat
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-6 tracking-tight leading-tight">
                    Selamat Datang, <span class="text-red-600">{{ Auth::user()->name }}</span>!
                </h1>
                <p class="text-gray-500 text-lg leading-relaxed mb-10">
                    Kelola seluruh konten profil sekolah, visi misi, dan informasi pimpinan melalui panel kontrol ini dengan mudah, cepat, dan terorganisir.
                </p>
            </div>
            


            {{-- Admin Icon in circle --}}
            <div class="absolute top-1/2 right-16 -translate-y-1/2 hidden lg:flex w-44 h-44 rounded-full bg-red-600 items-center justify-center shadow-lg shadow-red-200">
                <svg class="w-24 h-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                </svg>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-red-600 text-white mb-6 group-hover:bg-red-700 shadow-md shadow-red-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">visibility</span>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">1,280+</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Kunjungan</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-red-600 text-white mb-6 group-hover:bg-red-700 shadow-md shadow-red-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">photo_library</span>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">{{ \App\Models\Gallery::count() }}</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Foto Galeri</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-emerald-500 text-white mb-6 group-hover:bg-emerald-600 shadow-md shadow-emerald-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">newspaper</span>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">{{ \App\Models\News::count() }}</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Berita</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-amber-500 text-white mb-6 group-hover:bg-amber-600 shadow-md shadow-amber-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">manage_accounts</span>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">{{ \App\Models\User::count() }}</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Administrator</div>
            </div>
        </div>

        {{-- Shortcut Grid --}}
        <div class="mb-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-widest">Pintasan Halaman</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

            <a href="{{ route('beranda') }}" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-red-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-red-600 text-white flex items-center justify-center group-hover:bg-red-700 shadow-sm shadow-red-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">home</span>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-red-600 transition-colors">Beranda</span>
            </a>

            <a href="{{ route('beranda') }}#layanan" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-orange-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-orange-500 text-white flex items-center justify-center group-hover:bg-orange-600 shadow-sm shadow-orange-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">support_agent</span>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-orange-500 transition-colors">Layanan</span>
            </a>

            <a href="{{ route('materials.index') }}" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center group-hover:bg-blue-700 shadow-sm shadow-blue-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">menu_book</span>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-blue-600 transition-colors">Bahan Ajar</span>
            </a>

            <a href="{{ route('pengaduan.index') }}" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-amber-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-amber-500 text-white flex items-center justify-center group-hover:bg-amber-600 shadow-sm shadow-amber-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">campaign</span>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-amber-500 transition-colors">Pengaduan</span>
            </a>

            <a href="{{ route('beranda') }}#profil" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-emerald-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-emerald-600 text-white flex items-center justify-center group-hover:bg-emerald-700 shadow-sm shadow-emerald-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">domain</span>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-emerald-600 transition-colors">Profil Sekolah</span>
            </a>

            <a href="{{ route('berita.index') }}" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-purple-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-purple-600 text-white flex items-center justify-center group-hover:bg-purple-700 shadow-sm shadow-purple-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">article</span>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-purple-600 transition-colors">Berita</span>
            </a>

            <a href="{{ route('beranda') }}#galeri" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-pink-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-pink-500 text-white flex items-center justify-center group-hover:bg-pink-600 shadow-sm shadow-pink-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">collections</span>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-pink-600 transition-colors">Galeri</span>
            </a>

            <a href="{{ route('beranda') }}#kontak" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-teal-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-teal-500 text-white flex items-center justify-center group-hover:bg-teal-600 shadow-sm shadow-teal-100 transition-colors duration-300">
                    <span class="material-symbols-outlined text-[28px]">contact_support</span>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-teal-600 transition-colors">Kontak</span>
            </a>

        </div>

        {{-- ===== Edit Statistik Beranda ===== --}}
        <div class="mt-10">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-5">Edit Statistik Beranda</h2>
            <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white rounded-xl border border-gray-100 shadow-sm p-8">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2">
                            <span class="material-symbols-outlined text-[1.1rem] align-middle text-red-500 mr-1">groups</span>
                            Siswa Aktif
                        </label>
                        <input type="text" name="siswa_aktif" value="{{ $rawSettings->get('siswa_aktif')?->value ?? '1200+' }}" class="w-full px-5 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-red-100 outline-none font-bold text-gray-900 text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2">
                            <span class="material-symbols-outlined text-[1.1rem] align-middle text-gray-500 mr-1">badge</span>
                            Tenaga Kependidikan
                        </label>
                        <input type="text" name="tenaga_kependidikan" value="{{ $rawSettings->get('tenaga_kependidikan')?->value ?? '85+' }}" class="w-full px-5 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-red-100 outline-none font-bold text-gray-900 text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2">
                            <span class="material-symbols-outlined text-[1.1rem] align-middle text-gray-500 mr-1">category</span>
                            Total Jurusan
                        </label>
                        <input type="text" name="total_jurusan" value="{{ $rawSettings->get('total_jurusan')?->value ?? '9' }}" class="w-full px-5 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-red-100 outline-none font-bold text-gray-900 text-sm">
                    </div>

                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-3 rounded-xl transition-colors shadow-sm text-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
