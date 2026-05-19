@extends('layouts.app')

@section('title', 'Bahan Ajar')

@section('content')
    {{-- ======== DETAIL HERO ======== --}}
    <section class="detail-hero">
        {{-- Photo background + dark overlay --}}
        <div class="detail-hero-bg" style="background-image: url('{{ asset('images/gambarSekolah.jpeg') }}')"></div>
        <div class="detail-hero-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center justify-center gap-2 text-sm text-white/40 mb-8">
                <a href="{{ route('beranda') }}" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white/70">Bahan Ajar</span>
            </nav>

            <div class="flex flex-col items-center text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    Pusat Bahan Ajar Digital
                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    Akses berbagai materi pembelajaran dan modul untuk mendukung kegiatan belajar mengajar.
                </p>
            </div>
        </div>

        {{-- Decorative Circles --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-red-500/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-orange-500/10 blur-[80px] rounded-full pointer-events-none"></div>
    </section>

    <div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-10">
            <h2 class="text-3xl font-black text-gray-900 mb-3">Pilih Jurusan</h2>
            <p class="text-gray-500 font-medium max-w-2xl mx-auto">Silahkan pilih jurusan untuk melihat bahan ajar yang tersedia.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="majors-container">
            @foreach($majors as $major)
            <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden flex flex-col h-full hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group">
                {{-- Foto Jurusan --}}
                <div class="relative w-full aspect-video bg-gray-100 overflow-hidden">
                    @if($major->image_path)
                        <img src="{{ Storage::url($major->image_path) }}" alt="{{ $major->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gray-50">
                            <svg class="w-12 h-12 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span class="text-sm font-bold">Tanpa Foto</span>
                        </div>
                    @endif
                </div>

                {{-- Konten Card --}}
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-black text-gray-900 mb-1 line-clamp-2" title="{{ $major->name }}">{{ $major->name }}</h3>
                    <p class="text-sm font-medium text-gray-500 mb-6">Total Bahan Ajar: {{ $major->materials_count }}</p>
                    
                    <div class="mt-auto">
                        <a href="{{ route('materials.show', $major->id) }}" class="flex items-center justify-center w-full px-4 py-3 border-2 border-gray-200 text-gray-800 font-bold rounded-lg hover:border-red-500 hover:text-red-600 hover:bg-red-50 transition-colors gap-2 group-hover:border-gray-300">
                            Lihat Bahan Ajar
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    </div>

    @push('scripts')
    <script>

    </script>
    @endpush
@endsection
