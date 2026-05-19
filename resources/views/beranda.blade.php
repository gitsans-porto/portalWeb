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
                    @php $ic = 'text-red-400'; @endphp
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


    <section class="pt-20 lg:pt-28 pb-10 lg:pb-14 bg-white relative overflow-hidden" id="profil">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#F8F9FA] rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm reveal">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    
                    {{-- Left Content: Accordion --}}
                    <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center">
                        <div class="space-y-6 w-full" id="profilAccordion">
                            
                            {{-- Accordion Item 1: Sambutan --}}
                            <div class="accordion-item border-b border-gray-200 pb-5">
                                <button class="w-full flex items-center justify-between text-left py-2" onclick="toggleProfilAccordion('sambutan')">
                                    <span class="text-2xl font-bold text-gray-900">Sambutan Kepala Sekolah</span>
                                    <span id="icon-sambutan" class="w-8 h-8 rounded-full border border-gray-900 flex items-center justify-center text-gray-900 transition-transform duration-300">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                    </span>
                                </button>
                                <div id="content-sambutan" class="overflow-hidden transition-all duration-500 max-h-[1000px] opacity-100 mt-4">
                                    <div class="text-gray-600 text-[0.95rem] leading-relaxed text-justify mb-2 space-y-3 max-h-[300px] overflow-y-auto pr-3 custom-scrollbar">
                                        @if(isset($kepalaSekolah))
                                            {!! nl2br(e($kepalaSekolah->content)) !!}
                                        @else
                                            <p>Selamat datang di portal resmi SMKN 1 Limboto.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Accordion Item 2: Sejarah --}}
                            <div class="accordion-item border-b border-gray-200 pb-5">
                                <button class="w-full flex items-center justify-between text-left py-2" onclick="toggleProfilAccordion('sejarah')">
                                    <span class="text-2xl font-bold text-gray-900">Sejarah</span>
                                    <span id="icon-sejarah" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-400 transition-transform duration-300">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    </span>
                                </button>
                                <div id="content-sejarah" class="overflow-hidden transition-all duration-500 max-h-0 opacity-0 mt-0">
                                    <div class="text-gray-600 text-[0.95rem] leading-relaxed text-justify mb-5 space-y-3 max-h-[300px] overflow-y-auto pr-3 custom-scrollbar">
                                        @if(isset($sejarahSekolah))
                                            {!! nl2br(e($sejarahSekolah->content)) !!}
                                        @else
                                            <p>Sejarah singkat berdirinya SMKN 1 Limboto...</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Right Image Column --}}
                    <div class="relative bg-gray-200 min-h-[400px] lg:min-h-full overflow-hidden">
                        {{-- Image Sambutan --}}
                        <div id="img-sambutan" class="absolute inset-0 transition-opacity duration-700 opacity-100 z-10 group">
                            <img src="{{ isset($kepalaSekolah) && $kepalaSekolah->image ? (Storage::disk('public')->exists($kepalaSekolah->image) ? asset('storage/' . $kepalaSekolah->image) : asset($kepalaSekolah->image)) : asset('images/kepala-sekolah.png') }}" alt="Kepala Sekolah" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105">
                            {{-- Title Overlay --}}
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-8 pt-24 translate-y-0">
                                <h3 class="text-white text-2xl font-bold">{{ $kepalaSekolah->title ?? 'Kepala Sekolah' }}</h3>
                                @if(!empty($kepalaSekolah->short_description))
                                    <p class="text-gray-200 text-sm mt-1">{{ $kepalaSekolah->short_description }}</p>
                                @endif
                            </div>
                        </div>
                        
                        {{-- Image Sejarah --}}
                        <div id="img-sejarah" class="absolute inset-0 transition-opacity duration-700 opacity-0 z-0 bg-white group">
                            <img src="{{ isset($sejarahSekolah) && $sejarahSekolah->image ? (Storage::disk('public')->exists($sejarahSekolah->image) ? asset('storage/' . $sejarahSekolah->image) : asset($sejarahSekolah->image)) : asset('images/gambarSekolah.jpeg') }}" alt="Sejarah Sekolah" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                             {{-- Title Overlay (Opsional untuk sejarah) --}}
                             <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-8 pt-24 translate-y-0">
                                <h3 class="text-white text-2xl font-bold">{{ $sejarahSekolah->title ?? 'Sejarah SMKN 1 Limboto' }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Custom scrollbar for accordion content */
            .custom-scrollbar::-webkit-scrollbar {
                width: 5px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #d1d5db;
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #9ca3af;
            }
        </style>

        <script>
            function toggleProfilAccordion(section) {
                const isSambutan = section === 'sambutan';
                
                // Contents
                const contentSambutan = document.getElementById('content-sambutan');
                const contentSejarah = document.getElementById('content-sejarah');
                
                if(isSambutan) {
                    contentSambutan.style.maxHeight = '1000px';
                    contentSambutan.style.opacity = '1';
                    contentSambutan.style.marginTop = '1rem';
                    
                    contentSejarah.style.maxHeight = '0px';
                    contentSejarah.style.opacity = '0';
                    contentSejarah.style.marginTop = '0px';
                } else {
                    contentSejarah.style.maxHeight = '1000px';
                    contentSejarah.style.opacity = '1';
                    contentSejarah.style.marginTop = '1rem';
                    
                    contentSambutan.style.maxHeight = '0px';
                    contentSambutan.style.opacity = '0';
                    contentSambutan.style.marginTop = '0px';
                }

                // Icons
                const iconSambutan = document.getElementById('icon-sambutan');
                const iconSejarah = document.getElementById('icon-sejarah');
                
                if(isSambutan) {
                    iconSambutan.innerHTML = '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>';
                    iconSambutan.className = 'w-8 h-8 rounded-full border border-gray-900 flex items-center justify-center text-gray-900 transition-transform duration-300';
                    
                    iconSejarah.innerHTML = '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>';
                    iconSejarah.className = 'w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-400 transition-transform duration-300';
                } else {
                    iconSejarah.innerHTML = '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>';
                    iconSejarah.className = 'w-8 h-8 rounded-full border border-gray-900 flex items-center justify-center text-gray-900 transition-transform duration-300';
                    
                    iconSambutan.innerHTML = '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>';
                    iconSambutan.className = 'w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-400 transition-transform duration-300';
                }

                // Images
                const imgSambutan = document.getElementById('img-sambutan');
                const imgSejarah = document.getElementById('img-sejarah');

                if(isSambutan) {
                    imgSambutan.style.opacity = '1';
                    imgSambutan.style.zIndex = '10';
                    imgSejarah.style.opacity = '0';
                    imgSejarah.style.zIndex = '0';
                } else {
                    imgSejarah.style.opacity = '1';
                    imgSejarah.style.zIndex = '10';
                    imgSambutan.style.opacity = '0';
                    imgSambutan.style.zIndex = '0';
                }
            }
        </script>



        </div>
    </section>

    {{-- ======== STATISTIK ======== --}}
    <section class="pb-16 pt-4 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-6 lg:gap-10 reveal">

                <div class="flex flex-col items-center justify-center text-center p-6 rounded-2xl bg-gray-50 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <div class="text-[2.5rem] lg:text-[3rem] font-black text-primary leading-none mb-2">{{ $settings['siswa_aktif'] ?? '1200+' }}</div>
                    <div class="text-[0.7rem] font-black text-gray-500 tracking-[0.12em] uppercase">{{ $settings['siswa_aktif_label'] ?? 'Siswa Aktif' }}</div>
                </div>

                <div class="flex flex-col items-center justify-center text-center p-6 rounded-2xl bg-gray-50 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="w-10 h-10 rounded-xl bg-gray-200 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <div class="text-[2.5rem] lg:text-[3rem] font-black text-gray-900 leading-none mb-2">{{ $settings['tenaga_kependidikan'] ?? '85+' }}</div>
                    <div class="text-[0.7rem] font-black text-gray-500 tracking-[0.12em] uppercase">{{ $settings['tenaga_kependidikan_label'] ?? 'Tenaga Kependidikan' }}</div>
                </div>

                <div class="flex flex-col items-center justify-center text-center p-6 rounded-2xl bg-gray-50 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="w-10 h-10 rounded-xl bg-gray-200 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <div class="text-[2.5rem] lg:text-[3rem] font-black text-gray-900 leading-none mb-2">{{ $settings['total_jurusan'] ?? '9' }}</div>
                    <div class="text-[0.7rem] font-black text-gray-500 tracking-[0.12em] uppercase">{{ $settings['total_jurusan_label'] ?? 'Total Jurusan' }}</div>
                </div>

            </div>
        </div>
    </section>
    {{-- ======== BERITA & KEGIATAN ======== --}}
    <section class="pt-10 lg:pt-14 pb-10 lg:pb-14 bg-white" id="berita">
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
                                <span class="text-xs font-semibold text-white bg-red-600 px-2.5 py-1 rounded-full">
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

    {{-- ======== GALERI KEGIATAN ======== --}}
    <section class="pt-10 lg:pt-14 pb-20 lg:pb-28 bg-gray-50" id="galeri">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-12 reveal">
                <div>
                    <span class="section-badge mb-4">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Galeri Kegiatan
                    </span>
                    <h2 class="section-title">Dokumentasi Sekolah</h2>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-6 reveal reveal-delay-2">
                @forelse($galleries ?? [] as $index => $gallery)
                    <div class="aspect-square relative overflow-hidden rounded-2xl group cursor-pointer shadow-sm">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->caption ?? 'Galeri Kegiatan' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            @if($gallery->caption)
                                <p class="text-white font-bold text-sm lg:text-base translate-y-4 group-hover:translate-y-0 transition-transform duration-300">{{ $gallery->caption }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center">
                        <p class="text-gray-400 italic">Belum ada foto kegiatan.</p>
                    </div>
                @endforelse
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