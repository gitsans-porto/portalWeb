@extends('layouts.app')

@section('title', $article->title)

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
                <a href="{{ route('berita.index') }}" class="hover:text-white/70 transition-colors">Berita</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white/70">Detail Berita</span>
            </nav>

            <div class="flex flex-col items-center text-center">
                <div class="flex items-center gap-3 mb-6">
                    <span class="px-4 py-1.5 rounded-full bg-red-600 text-white text-[10px] font-black uppercase tracking-widest shadow-lg shadow-red-600/20">
                        {{ $article->category ?? 'Umum' }}
                    </span>
                    <span class="text-xs text-white/50 font-bold uppercase tracking-wider">
                        {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                    </span>
                </div>
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight max-w-4xl">
                    {{ $article->title }}
                </h1>
            </div>
        </div>
    </section>

    {{-- ======== MAIN CONTENT ======== --}}
    <section class="py-20 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                {{-- Article Content --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-[3rem] shadow-2xl shadow-gray-200/50 p-8 md:p-12 lg:p-16 relative z-10 reveal overflow-hidden border border-gray-100/50">
                        
                        @if($article->image)
                            <div class="rounded-[2rem] overflow-hidden mb-12 shadow-xl border border-gray-100">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-auto">
                            </div>
                        @endif

                        <div class="prose prose-lg prose-red max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($article->content)) !!}
                        </div>

                        {{-- Share and Tags --}}
                        <div class="mt-16 pt-10 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                            <div class="flex items-center gap-4">
                                <span class="text-xs font-black uppercase tracking-widest text-gray-400">Bagikan:</span>
                                <div class="flex items-center gap-2">
                                    {{-- Social Share Placeholder --}}
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                    </button>
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('berita.index') }}" class="text-xs font-black uppercase tracking-widest text-red-600 hover:underline">
                                Kembali ke Berita
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-10">
                    {{-- Search Placeholder --}}
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-6">Cari Berita</h3>
                        <div class="relative">
                            <input type="text" class="w-full pl-5 pr-12 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-red-500 transition-all text-sm" placeholder="Ketik kata kunci...">
                            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Latest News --}}
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-8 border-l-4 border-red-600 pl-4">Berita Terkini</h3>
                        <div class="space-y-8">
                            @foreach($latestNews as $latest)
                                <a href="{{ route('berita.show', $latest->slug) }}" class="group block">
                                    <div class="flex items-start gap-4">
                                        <div class="w-20 h-20 rounded-xl bg-gray-100 overflow-hidden flex-shrink-0 border border-gray-50">
                                            @if($latest->image)
                                                <img src="{{ asset('storage/' . $latest->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-red-600 flex items-center justify-center text-white/30 text-xs">SMKN 1</div>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="text-[10px] font-black text-red-600 uppercase tracking-widest block mb-1">
                                                {{ $latest->category ?? 'Umum' }}
                                            </span>
                                            <h4 class="text-sm font-bold text-gray-900 leading-snug group-hover:text-red-600 transition-colors line-clamp-2">
                                                {{ $latest->title }}
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ route('berita.index') }}" class="block text-center mt-10 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-red-600 transition-colors">
                            Semua Berita
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
