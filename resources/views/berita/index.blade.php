@extends('layouts.app')

@section('title', 'Berita & Kegiatan')

@section('content')
    {{-- ======== HERO SECTION ======== --}}
    <section class="detail-hero">
        <div class="detail-hero-bg" style="background-image: url('{{ asset('images/gambarSekolah.jpeg') }}')"></div>
        <div class="detail-hero-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center justify-center gap-2 text-sm text-white/40 mb-8">
                <a href="{{ route('beranda') }}" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white/70">Berita & Kegiatan</span>
            </nav>

            <div class="flex flex-col items-center text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    Warta Sekolah
                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    Dapatkan informasi terbaru mengenai prestasi, kegiatan, dan pengumuman resmi SMKN 1 Limboto.
                </p>
            </div>
        </div>
    </section>

    {{-- ======== MAIN CONTENT ======== --}}
    <section class="py-20 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @forelse($news as $article)
                    <div class="news-card group reveal">
                        <div class="news-card-image overflow-hidden aspect-video relative">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-3 py-1 rounded-full bg-red-50 text-red-600 text-[10px] font-black uppercase tracking-widest">
                                    {{ $article->category ?? 'Umum' }}
                                </span>
                                <span class="text-xs text-gray-400 font-medium">
                                    {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4 leading-snug hover:text-red-600 transition-colors">
                                <a href="{{ route('berita.show', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            <a href="{{ route('berita.show', $article->slug) }}" class="inline-flex items-center gap-2 text-red-600 font-black text-xs uppercase tracking-widest group">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center text-gray-300 mb-6">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Berita</h3>
                            <p class="text-gray-500">Nantikan informasi terbaru lainnya dari kami segera.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($news->hasPages())
                <div class="flex justify-center mt-12">
                    {{ $news->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
