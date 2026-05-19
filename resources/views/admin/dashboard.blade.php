@extends('layouts.admin')

@section('title', 'Dashboard Administrator')

@section('content')
@php
    $rawSettings = \App\Models\Setting::all()->keyBy('key');
@endphp
    <div class="reveal">
        @if(session('success'))
            <div class="mb-8 bg-emerald-50 text-emerald-700 p-4 rounded-2xl border border-emerald-100 flex items-center gap-3 font-bold text-sm shadow-sm">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                {{ session('success') }}
            </div>
        @endif
        {{-- Welcome Card --}}
        <div class="relative overflow-hidden mb-10 rounded-2xl bg-white p-10 md:p-14 shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-gray-100">
            <div class="relative z-10 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-50 text-red-600 text-xs font-black uppercase tracking-widest mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
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
            <div class="absolute top-1/2 right-16 -translate-y-1/2 hidden lg:flex w-44 h-44 rounded-full bg-red-50 items-center justify-center">
                <svg class="w-24 h-24 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                </svg>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-red-50 text-red-600 mb-6 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">1,280+</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Kunjungan</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-red-50 text-red-600 mb-6 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">{{ \App\Models\Gallery::count() }}</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Foto Galeri</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-emerald-50 text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">{{ \App\Models\News::count() }}</div>
                <div class="text-sm font-bold text-gray-400 uppercase tracking-widest">Berita</div>
            </div>

            <div class="admin-card group hover:-translate-y-2 transition-all">
                <div class="admin-stat-icon bg-amber-50 text-amber-600 mb-6 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
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
                <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-red-600 transition-colors">Beranda</span>
            </a>

            <a href="{{ route('beranda') }}#layanan" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-orange-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-orange-500 transition-colors">Layanan</span>
            </a>

            <a href="{{ route('materials.index') }}" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-blue-600 transition-colors">Bahan Ajar</span>
            </a>

            <a href="{{ route('pengaduan.index') }}" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-amber-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-amber-500 transition-colors">Pengaduan</span>
            </a>

            <a href="{{ route('beranda') }}#profil" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-emerald-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-emerald-600 transition-colors">Profil Sekolah</span>
            </a>

            <a href="{{ route('berita.index') }}" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-purple-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-purple-600 transition-colors">Berita</span>
            </a>

            <a href="{{ route('beranda') }}#galeri" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-pink-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center group-hover:bg-pink-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
                <span class="text-sm font-bold text-gray-700 group-hover:text-pink-600 transition-colors">Galeri</span>
            </a>

            <a href="{{ route('beranda') }}#kontak" target="_blank" class="group flex flex-col items-center gap-3 p-6 bg-white rounded-xl border border-gray-100 hover:border-teal-200 hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
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
                            <svg class="w-3.5 h-3.5 inline-block text-red-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            Siswa Aktif
                        </label>
                        <input type="text" name="siswa_aktif" value="{{ $rawSettings->get('siswa_aktif')?->value ?? '1200+' }}" class="w-full px-5 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-red-100 outline-none font-bold text-gray-900 text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2">
                            <svg class="w-3.5 h-3.5 inline-block text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            Tenaga Kependidikan
                        </label>
                        <input type="text" name="tenaga_kependidikan" value="{{ $rawSettings->get('tenaga_kependidikan')?->value ?? '85+' }}" class="w-full px-5 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-red-100 outline-none font-bold text-gray-900 text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-wider mb-2">
                            <svg class="w-3.5 h-3.5 inline-block text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
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
