@extends('layouts.app')

@section('title', $layanan->name)
@section('meta_description', $layanan->description)

@section('content')

    {{-- ======== DETAIL HERO ======== --}}
    <section class="detail-hero relative pt-24 pb-16 lg:pt-32 lg:pb-24 overflow-hidden bg-gray-900">
        {{-- Photo background + dark overlay --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/stock_service.png') }}" class="w-full h-full object-cover opacity-20" alt="Background">
            <div class="absolute inset-0 bg-gray-900/80"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center justify-center">
                <div class="max-w-3xl flex flex-col items-center">
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                        {{ $layanan->name }}
                    </h1>
                    
                    <p class="text-xl text-white/80 leading-relaxed font-light mb-8 max-w-2xl">
                        @if($layanan->slug === 'e-raport')
                            Sistem berbasis web untuk pengelolaan nilai dan laporan capaian kompetensi peserta didik SMK
                        @elseif($layanan->slug === 'lms')
                            Sistem pembelajaran digital yang memudahkan akses materi, komunikasi guru–siswa, serta keterlibatan orang tua dalam mendukung proses pendidikan
                        @elseif($layanan->slug === 'dapodik')
                            Sistem pendataan skala nasional yang dikelola oleh Kementerian Pendidikan Dasar dan Menengah
                        @elseif($layanan->slug === 'pekael')
                            Aplikasi digital yang dirancang khusus untuk mempermudah ekosistem PKL
                        @else
                            {{ $layanan->tagline }}
                        @endif
                    </p>
                    
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ $layanan->url }}" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-full bg-primary hover:bg-primary-dark text-white font-bold transition-all transform hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/30">
                            <span>Kunjungi Layanan</span>
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======== ABOUT & FEATURES ======== --}}
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                
                {{-- Left: Deskripsi --}}
                <div class="lg:col-span-5">
                    <div class="sticky top-24">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang {{ $layanan->name }}</h2>
                        <div class="prose prose-lg text-gray-600 mb-8">
                            <p>{{ $layanan->long_description }}</p>
                        </div>
                        
                        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Ingin tahu cara menggunakan layanan ini?</h4>
                                <p class="text-sm text-gray-600 mb-3">Kunjungi dokumentasi berikut!</p>
                                <a href="{{ route('layanan.dokumentasi', $layanan->slug) }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1">
                                    Lihat Dokumentasi Lengkap
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Fitur --}}
                <div class="lg:col-span-7">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8">Apa saja yang bisa dilakukan?</h3>
                    
                    @if(!empty($layanan->features))
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach($layanan->features as $feature)
                                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                                    <div class="w-12 h-12 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center mb-4 text-{{ $layanan->color }}-600">
                                        @if(view()->exists('components.heroicon-o-'.$feature['icon']))
                                            <x-dynamic-component :component="'heroicon-o-'.$feature['icon']" class="w-6 h-6" />
                                        @else
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $feature['title'] }}</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white rounded-2xl p-8 text-center border border-gray-100">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <p class="text-gray-500">Belum ada informasi fitur untuk layanan ini.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
    
    {{-- ======== OTHER SERVICES ======== --}}
    @if($otherServices->count() > 0)
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold text-gray-900">Layanan Lainnya</h3>
                <a href="{{ route('beranda') }}#layanan" class="text-primary font-semibold hover:text-primary-dark flex items-center gap-1 text-sm">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($otherServices as $other)
                    <a href="{{ route('layanan.detail', $other->slug) }}" class="group block p-6 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-200 hover:shadow-lg transition-all">
                        <div class="w-12 h-12 rounded-xl bg-{{ $other->color }}-100 text-{{ $other->color }}-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            @if(view()->exists('components.heroicon-o-'.$other->icon))
                                <x-dynamic-component :component="'heroicon-o-'.$other->icon" class="w-6 h-6" />
                            @else
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            @endif
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">{{ $other->name }}</h4>
                        <p class="text-gray-600 text-sm line-clamp-2">{{ $other->tagline }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection