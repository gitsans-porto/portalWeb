@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Portal Layanan Sistem Informasi Terpadu SMKN 1 Limboto — Akses E-Raport, LMS, Dapodik, dan PeKaeL dengan mudah.')

@section('content')

    {{-- ======== HERO SECTION ======== --}}
    <section class="hero-section" style="background-image: url('{{ asset('images/gambarSekolah.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        {{-- Decorative Elements --}}
        <div class="absolute top-1/4 left-10 w-64 h-64 rounded-full bg-white/[0.02] blur-3xl"
            style="animation: float 8s ease-in-out infinite;"></div>
        <div class="absolute bottom-1/4 right-10 w-80 h-80 rounded-full bg-red-500/[0.04] blur-3xl"
            style="animation: float 10s ease-in-out infinite 2s;"></div>
        <div class="absolute top-20 right-1/4 w-40 h-40 rounded-full bg-white/[0.015] blur-2xl"
            style="animation: float 6s ease-in-out infinite 1s;"></div>

        <div class="relative z-10 w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center text-center pt-32 pb-16 lg:pt-40 lg:pb-24">

            {{-- Glassmorphism Welcome Badge --}}
            <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-7 rounded-full border border-white/20 backdrop-blur-md bg-white/10">
                <div class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></div>
                <span class="text-white text-xs font-semibold tracking-widest uppercase">Selamat Datang di SMK Negeri 1 Limboto</span>
            </div>

            {{-- Main Title --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-black text-white leading-[1.05] mb-6 tracking-tight uppercase">
                Portal Layanan<br>
                <span class="text-white/90">Informasi Sekolah</span>
            </h1>

            {{-- Sub Description --}}
            <p class="text-lg text-white/70 max-w-xl mx-auto leading-relaxed mb-10">
                Akses seluruh layanan digital SMKN 1 Limboto dalam satu platform terpadu.
            </p>

            {{-- Layanan Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
                @foreach($layananList as $index => $item)
                    @php $ic = 'text-red-500'; @endphp
                    <a href="{{ route('layanan.detail', $item->slug) }}"
                        class="layanan-card group reveal reveal-delay-{{ $index + 1 }} text-left">

                        {{-- Icon --}}
                        @if($item->icon === 'document-chart-bar')
                            <svg class="layanan-card-icon w-8 h-8 {{ $ic }} mb-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        @elseif($item->icon === 'book')
                            <svg class="layanan-card-icon w-8 h-8 {{ $ic }} mb-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        @elseif($item->icon === 'academic-cap')
                            <svg class="layanan-card-icon w-8 h-8 {{ $ic }} mb-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        @elseif($item->icon === 'briefcase')
                            <svg class="layanan-card-icon w-8 h-8 {{ $ic }} mb-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.084-.916 1.95-2.05 1.95H5.8c-1.134 0-2.05-.866-2.05-1.95v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                        @endif

                        {{-- Content --}}
                        <h3 class="text-white font-bold text-lg mb-1 text-center">{{ $item->name }}</h3>
                        <p class="text-xs font-semibold uppercase tracking-wider {{ $ic }} mb-3 text-center">{{ $item->tagline }}</p>
                        <p class="text-white/70 text-sm leading-relaxed mb-5 flex-1">{{ Str::limit($item->description, 90) }}</p>

                        {{-- Lihat Detail --}}
                        <div class="flex items-center gap-1.5 {{ $ic }} text-sm font-semibold" style="transition: gap 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);">
                            <span>Lihat Detail</span>
                            <svg class="layanan-card-arrow-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    <section class="py-20 lg:py-28 bg-white relative overflow-hidden" id="profil">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                {{-- Left Image Column --}}
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
                        <img src="{{ asset('images/foto_siswa.png') }}" alt="Siswa SMKN 1 Limboto" class="w-full h-auto relative pointer-events-none" style="filter: drop-shadow(0 20px 25px rgba(0,0,0,0.15));">
                        
                        {{-- Floating Badge --}}
                        <div class="profil-badge">
                            <div class="flex items-center justify-center flex-shrink-0" style="width: 2.75rem; height: 2.75rem; border-radius: 9999px; background-color: #fef2f2;">
                                <svg class="text-primary" style="width: 1.5rem; height: 1.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <h4 class="font-bold text-gray-900 leading-tight" style="font-size: 1rem; margin-bottom: 0.15rem;">Terakreditasi B</h4>
                                <p class="text-gray-500 leading-snug" style="font-size: 0.85rem;">Lembaga pendidikan unggulan</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Content Column --}}
                <div class="reveal reveal-delay-2 lg:pl-6">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-50 text-primary text-sm font-bold tracking-wide mb-6">
                        <svg class="w-[1.15rem] h-[1.15rem]" fill="currentColor" viewBox="0 0 24 24">
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
                        {{-- Misi List --}}
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

                        {{-- Keunggulan List --}}
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

            {{-- Divider --}}
            <div class="w-full h-px bg-gray-200 mt-24 mb-16 max-w-6xl mx-auto"></div>

            {{-- Statistik (Inline with design) --}}
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

    {{-- ======== BERITA & KEGIATAN ======== --}}
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
                <a href="{{ route('berita.index') }}" class="btn-outline text-sm flex-shrink-0 self-start sm:self-auto">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($latestNews as $index => $item)
                    <div class="news-card group reveal reveal-delay-{{ $index + 1 }}">
                        <div class="news-card-image overflow-hidden aspect-video relative">
                            @if($item->image)
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-xs font-semibold text-primary bg-red-50 px-2.5 py-1 rounded-full">
                                    {{ $item->category ?? 'Umum' }}
                                </span>
                                <span class="text-xs text-gray-400">
                                    {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                                </span>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2 leading-snug hover:text-red-600 transition-colors">
                                <a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a>
                            </h3>
                            <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                                {{ Str::limit(strip_tags($item->content), 100) }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center">
                        <p class="text-gray-400 italic">Belum ada berita terbaru saat ini.</p>
                    </div>
                @endforelse

            </div>

            </div>
        </div>
    </section>

    {{-- ======== CTA SECTION ======== --}}
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

@endsection