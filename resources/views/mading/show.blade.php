@extends('layouts.app')

@section('title', $post->title)

@section('content')

    {{-- ======== HERO / BREADCRUMB ======== --}}
    <section class="detail-hero" style="min-height: 220px;">
        <div class="detail-hero-bg" style="background-image: url('{{ asset('images/gambarSekolah.jpeg') }}')"></div>
        <div class="detail-hero-overlay"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/40 mb-6">
                <a href="{{ route('beranda') }}" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
                <a href="{{ route('mading.index') }}" class="hover:text-white/70 transition-colors">Mading</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
                <span class="text-white/70">Detail</span>
            </nav>

        </div>
    </section>

    {{-- ======== MAIN CONTENT ======== --}}
    <section class="py-16 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                {{-- ===== Kolom Artikel (2/3) ===== --}}
                <div class="lg:col-span-2">
                    <article class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden reveal">

                        {{-- 1. JUDUL — di atas gambar --}}
                        <div class="px-8 md:px-12 pt-10 pb-6">
                            <h1 class="text-2xl md:text-4xl font-black text-gray-900 leading-tight tracking-tight break-words" style="word-break: break-word; overflow-wrap: anywhere;">
                                {{ $post->title }}
                            </h1>
                        </div>

                        {{-- 2. GAMBAR --}}
                        @if($post->image)
                            <div class="mx-8 md:mx-12 mb-0 rounded-2xl overflow-hidden border border-gray-100 shadow-sm">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     alt="{{ $post->title }}"
                                     class="w-full max-h-[460px] object-cover">
                            </div>
                        @endif

                        {{-- 3. INFO PENULIS — di bawah gambar --}}
                        <div class="mx-8 md:mx-12 mt-5 mb-8 flex items-start justify-between p-5 bg-gray-50 rounded-2xl border border-gray-100">
                            {{-- Kiri: Nama, Kelas, Kategori --}}
                            <div class="flex flex-col gap-1.5 min-w-0">
                                <span class="font-black text-gray-900 text-sm leading-tight break-words whitespace-normal">{{ $post->author_name }}</span>
                                <span class="text-xs text-gray-500 font-medium">{{ $post->author_class ?: 'Warga Sekolah' }}</span>
                                <span class="text-[10px] font-black text-red-600 uppercase tracking-widest mt-1">{{ $post->category_label }}</span>
                            </div>
                            
                            {{-- Kanan: View, Tanggal --}}
                            <div class="flex flex-col items-end gap-1.5 text-right">
                                <div class="flex items-center gap-1.5 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span class="text-xs font-bold">{{ $post->views ?? 0 }}</span>
                                </div>
                                <span class="text-xs text-gray-400">{{ $post->published_at ? $post->published_at->format('d M Y') : '' }}</span>
                            </div>
                        </div>

                        {{-- 4. ISI ARTIKEL — dengan sub judul seperti berita --}}
                        <div class="px-8 md:px-12 pb-12">
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed break-words
                                        prose-headings:font-black prose-headings:text-gray-900 prose-headings:tracking-tight
                                        prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4 prose-h2:border-l-4 prose-h2:border-red-600 prose-h2:pl-4
                                        prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3 prose-h3:text-red-700
                                        prose-p:text-justify prose-p:text-base prose-p:leading-8
                                        prose-img:rounded-2xl prose-img:shadow-md
                                        prose-a:text-red-600 prose-a:font-semibold hover:prose-a:underline
                                        prose-strong:text-gray-900
                                        prose-blockquote:border-l-4 prose-blockquote:border-red-500 prose-blockquote:bg-red-50 prose-blockquote:rounded-r-xl prose-blockquote:px-6 prose-blockquote:py-4 prose-blockquote:not-italic prose-blockquote:text-gray-700 mading-content"
                                 style="word-break: break-word; overflow-wrap: anywhere;">
                                {!! $post->content !!}
                            </div>

                            {{-- 5. PUSTAKA / REFERENSI --}}
                            @if($post->references)
                                <div class="mt-12 pt-8 border-t border-gray-100">
                                    <h3 class="text-sm font-black text-gray-900 uppercase tracking-widest mb-4 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                        </svg>
                                        Daftar Pustaka / Sumber
                                    </h3>
                                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 text-sm text-gray-600 leading-relaxed font-mono space-y-2">
                                        @foreach(explode("\n", $post->references) as $ref)
                                            @php
                                                $ref = trim($ref);
                                                if (empty($ref)) continue;
                                                // Check if it's a URL
                                                if (filter_var($ref, FILTER_VALIDATE_URL)) {
                                                    $formattedRef = '<a href="'. htmlspecialchars($ref) .'" target="_blank" rel="noopener" class="text-blue-600 hover:underline">'. htmlspecialchars($ref) .'</a>';
                                                } else {
                                                    // Also check if URL is within the string and make it a link. Simple approach: replace http/https with links.
                                                    $formattedRef = preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank" rel="noopener" class="text-blue-600 hover:underline">$1</a>', htmlspecialchars($ref));
                                                }
                                            @endphp
                                            <div class="flex gap-2">
                                                <span class="text-gray-400">&bull;</span>
                                                <span class="break-all">{!! $formattedRef !!}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            {{-- Divider --}}
                            <div class="mt-14 pt-8 border-t border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                <a href="{{ route('mading.index') }}"
                                   class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-400 hover:text-red-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                                    </svg>
                                    Kembali ke Mading
                                </a>

                            </div>
                        </div>

                    </article>
                </div>

                {{-- ===== Sidebar (1/3) ===== --}}
                <div class="space-y-8">

                    {{-- Mading Terbaru --}}
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-6 border-l-4 border-red-600 pl-4 text-base">Postingan Terbaru</h3>
                        <div class="space-y-6">
                            @forelse($latestMading as $item)
                                <a href="{{ route('mading.show', $item->slug) }}" class="group flex items-start gap-4">
                                    <div class="w-20 h-20 rounded-xl bg-gray-100 overflow-hidden flex-shrink-0 border border-gray-50">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                 alt="{{ $item->title }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-300">
                                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <span class="text-[10px] font-black text-red-600 uppercase tracking-widest block mb-1">
                                            {{ $item->category_label ?? 'Umum' }}
                                        </span>
                                        <h4 class="text-sm font-bold text-gray-900 leading-snug group-hover:text-red-600 transition-colors line-clamp-2">
                                            {{ $item->title }}
                                        </h4>
                                        <span class="text-xs text-gray-400 mt-1 block">
                                            {{ $item->published_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </a>
                            @empty
                                <p class="text-sm text-gray-400">Belum ada Postingan lain.</p>
                            @endforelse
                        </div>
                        <a href="{{ route('mading.index') }}" class="block text-center mt-8 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-red-600 transition-colors">
                            Lihat Mading
                        </a>
                    </div>

                    {{-- CTA Kirim Karya --}}
                    <div class="bg-gradient-to-br from-red-600 to-red-700 rounded-[2rem] p-8 text-white text-center shadow-lg shadow-red-600/20">
                        <div class="text-4xl mb-4">✍️</div>
                        <h3 class="font-black text-lg mb-2">Punya Karya?</h3>
                        <p class="text-red-100 text-sm mb-6 leading-relaxed">Bagikan tulisan, puisi, atau karyamu ke Mading Digital sekolah!</p>
                        <a href="{{ route('mading.create') }}"
                           class="inline-block bg-white text-red-600 font-black text-sm px-6 py-3 rounded-2xl hover:bg-red-50 transition-colors shadow-md">
                            Kirim Karya
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection

@push('styles')
<style>
    /* Quill alignment - override Tailwind prose defaults */
    .mading-content .ql-align-center,
    .mading-content p.ql-align-center { text-align: center !important; }

    .mading-content .ql-align-right,
    .mading-content p.ql-align-right { text-align: right !important; }

    .mading-content .ql-align-justify,
    .mading-content p.ql-align-justify { text-align: justify !important; }

    /* Quill heading styles - Tailwind preflight resets these to normal text */
    .mading-content h2 {
        font-size: 1.5rem !important;
        font-weight: 900 !important;
        color: #111827 !important;
        margin-top: 2.5rem !important;
        margin-bottom: 1rem !important;
        border-left: 4px solid #dc2626;
        padding-left: 1rem;
        line-height: 1.3 !important;
    }

    .mading-content h3 {
        font-size: 1.2rem !important;
        font-weight: 800 !important;
        color: #b91c1c !important;
        margin-top: 2rem !important;
        margin-bottom: 0.75rem !important;
        line-height: 1.4 !important;
    }
</style>
@endpush
