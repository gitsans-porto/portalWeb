@extends('layouts.app')

@section('title', $layanan->name)
@section('meta_description', $layanan->description)

@section('content')

    {{-- ======== DETAIL HERO ======== --}}
    <section class="detail-hero">
        {{-- Photo background + dark overlay --}}
        <div class="detail-hero-bg" style="background-image: url('{{ asset('images/stock_service.png') }}')"></div>
        <div class="detail-hero-overlay"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm text-white/40 mb-8">
                <a href="{{ route('beranda') }}" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <a href="{{ route('beranda') }}#layanan" class="hover:text-white/70 transition-colors">Layanan</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white/70">{{ $layanan->name }}</span>
            </nav>

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="max-w-2xl">

                    <p class="text-white/40 text-sm font-semibold uppercase tracking-wider mb-2">{{ $layanan->tagline }}
                    </p>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-4 tracking-tight">
                        {{ $layanan->name }}
                    </h1>
                    <p class="text-lg text-white/55 leading-relaxed">{{ $layanan->long_description }}</p>
                </div>

                {{-- CTA & Tab Buttons --}}
                <div class="flex-shrink-0 flex flex-col items-center mt-6 lg:mt-0">
                    <a href="{{ $layanan->url }}" target="_blank" rel="noopener noreferrer"
                        class="btn-primary text-base px-8 py-4 mb-2 w-auto justify-center">
                        Akses {{ $layanan->name }}
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                    <div class="flex flex-wrap justify-center gap-3 mt-3 w-full sm:w-auto">
                        <button id="btn-panduan"
                            onclick="switchTab('panduan')"
                            class="tab-btn active-tab inline-flex items-center justify-center whitespace-nowrap flex-shrink-0 gap-2 px-5 py-2.5 rounded-full border-2 border-white text-white text-sm font-semibold focus:outline-none">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z" />
                            </svg>
                            Panduan
                        </button>
                        <button id="btn-faq"
                            onclick="switchTab('faq')"
                            class="tab-btn inline-flex items-center justify-center whitespace-nowrap flex-shrink-0 gap-2 px-5 py-2.5 rounded-full border-2 border-white text-white text-sm font-semibold focus:outline-none">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                            </svg>
                            FAQ
                        </button>
                    </div>
                    <a href="{{ route('layanan.download-panduan', $layanan->slug) }}" class="mt-4 text-sm font-semibold text-white/80 hover:text-white flex items-center justify-center gap-2 transition-colors w-full sm:w-auto">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        Unduh Panduan (PDF)
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ======== PANDUAN / FAQ TABS ======== --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ===== TAB: PANDUAN ===== --}}
            <div id="content-panduan">
                <div class="mb-12 reveal">
                    <h2 class="section-title mb-3">Tata Cara Penggunaan</h2>
                    <p class="section-subtitle">
                        Ikuti langkah-langkah berikut untuk mengakses dan menggunakan layanan {{ $layanan->name }}.
                    </p>
                </div>

                {{-- SOP Steps --}}
                <ol class="space-y-0">
                    @foreach($layanan->sop ?? [] as $index => $step)
                        <li class="flex gap-4 py-5 {{ !$loop->last ? 'border-b border-gray-100' : '' }} reveal reveal-delay-{{ ($index % 4) + 1 }}">
                            <span class="flex-shrink-0 w-7 h-7 rounded-full bg-white border border-gray-400 text-gray-900 text-sm font-bold flex items-center justify-center mt-0.5">{{ $index + 1 }}</span>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-base mb-2">{{ $step['title'] }}</h3>
                                <div class="text-gray-600 text-sm leading-relaxed tinymce-content">
                                    {!! $step['desc'] !!}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>

            {{-- ===== TAB: FAQ ===== --}}
            <div id="content-faq" style="display: none;">
                <div class="mb-12 reveal">
                    <h2 class="section-title mb-3">Pertanyaan yang Sering Diajukan</h2>
                    <p class="section-subtitle">
                        Temukan jawaban atas pertanyaan umum seputar layanan {{ $layanan->name }}.
                    </p>
                </div>

                {{-- FAQ Accordion --}}
                <div class="divide-y divide-gray-100 border border-gray-100 rounded-2xl overflow-hidden reveal">
                    @php
                        $defaultFaqList = [
                            [
                                'q' => 'Siapa saja yang bisa mengakses layanan ' . $layanan->name . '?',
                                'a' => 'Layanan ini dapat diakses oleh ' . implode(', ', $layanan->audiences ?? ['pengguna terdaftar']) . '. Pastikan Anda sudah memiliki akun yang aktif dan telah terdaftar oleh administrator sekolah.',
                            ],
                            [
                                'q' => 'Apa yang harus dilakukan jika lupa password?',
                                'a' => 'Hubungi operator atau administrator sekolah melalui ruang Tata Usaha. Anda juga dapat menggunakan fitur "Laporkan Kendala" di portal ini agar permintaan reset password Anda tercatat secara resmi dan diproses sesuai antrian.',
                            ],
                            [
                                'q' => 'Apakah layanan ini bisa diakses dari smartphone?',
                                'a' => 'Ya, layanan ' . $layanan->name . ' dapat diakses melalui browser di smartphone maupun laptop/komputer. Pastikan koneksi internet Anda stabil untuk pengalaman terbaik.',
                            ],
                            [
                                'q' => 'Bagaimana jika layanan tidak bisa dibuka atau mengalami error?',
                                'a' => 'Pertama, coba muat ulang halaman atau bersihkan cache browser Anda. Jika masalah berlanjut, segera buat laporan melalui tombol "Laporkan Kendala" di portal ini agar tim IT sekolah dapat menangani masalah Anda.',
                            ],
                            [
                                'q' => 'Di mana saya bisa mendapatkan bantuan lebih lanjut?',
                                'a' => 'Anda dapat menghubungi operator sekolah di ruang Tata Usaha pada jam kerja (Senin–Jumat, 08.00–16.00 WITA). Alternatifnya, gunakan fitur "Laporkan Kendala" yang tersedia di halaman ini.',
                            ],
                        ];
                        
                        $faqList = !empty($layanan->faq) ? $layanan->faq : $defaultFaqList;
                    @endphp

                    @foreach($faqList as $faqIndex => $faq)
                        <div class="faq-item">
                            <button
                                class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left hover:bg-gray-50 transition-colors duration-200 focus:outline-none"
                                onclick="toggleFaq({{ $faqIndex }})"
                                aria-expanded="false"
                            >
                                <span class="font-medium text-gray-800 text-sm sm:text-base leading-snug">{{ $faq['q'] }}</span>
                                <span class="faq-icon flex-shrink-0 w-7 h-7 rounded-full bg-gray-100 flex items-center justify-center transition-all duration-300">
                                    <svg class="w-4 h-4 text-primary transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-answer" style="display:none;">
                                <div class="px-6 pb-5 text-gray-500 text-sm leading-relaxed border-t border-gray-50 pt-4">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
<script>
    // ===== TAB SWITCHER =====
    function switchTab(tab) {
        const panduan = document.getElementById('content-panduan');
        const faq     = document.getElementById('content-faq');
        const btnP    = document.getElementById('btn-panduan');
        const btnF    = document.getElementById('btn-faq');

        if (tab === 'panduan') {
            panduan.style.display = 'block';
            faq.style.display     = 'none';
            btnP.classList.add('active-tab');
            btnF.classList.remove('active-tab');
        } else {
            panduan.style.display = 'none';
            faq.style.display     = 'block';
            btnF.classList.add('active-tab');
            btnP.classList.remove('active-tab');
        }
    }

    // ===== FAQ ACCORDION =====
    let openFaq = null;

    function toggleFaq(index) {
        const items   = document.querySelectorAll('.faq-item');
        const clicked = items[index];
        const answer  = clicked.querySelector('.faq-answer');
        const icon    = clicked.querySelector('.faq-icon svg');
        const trigger = clicked.querySelector('.faq-trigger');
        const isOpen  = answer.style.display === 'block';

        // Tutup semua yang sedang terbuka
        if (openFaq !== null && openFaq !== index) {
            const prevItem    = items[openFaq];
            const prevAnswer  = prevItem.querySelector('.faq-answer');
            const prevIcon    = prevItem.querySelector('.faq-icon svg');
            const prevTrigger = prevItem.querySelector('.faq-trigger');
            prevAnswer.style.display = 'none';
            prevIcon.style.transform = 'rotate(0deg)';
            prevTrigger.setAttribute('aria-expanded', 'false');
            prevItem.querySelector('.faq-icon').classList.remove('bg-red-50');
            prevIcon.classList.remove('text-primary');
        }

        // Toggle yang diklik
        if (isOpen) {
            answer.style.display  = 'none';
            icon.style.transform  = 'rotate(0deg)';
            trigger.setAttribute('aria-expanded', 'false');
            clicked.querySelector('.faq-icon').classList.remove('bg-red-50');
            openFaq = null;
        } else {
            answer.style.display  = 'block';
            icon.style.transform  = 'rotate(180deg)';
            trigger.setAttribute('aria-expanded', 'true');
            clicked.querySelector('.faq-icon').classList.add('bg-red-50');
            openFaq = index;
        }
    }
</script>

<style>
    /* Tab Button: default state (transparan, border putih) */
    .tab-btn {
        background: transparent;
        transition: background-color 0.25s ease, color 0.25s ease;
    }
    /* Tab Button: active state (putih solid, teks gelap) */
    .tab-btn.active-tab {
        background-color: white !important;
        color: #111827 !important;
        border-color: white !important;
    }
    /* Hover: isi putih solid, teks gelap — override Tailwind opacity */
    .tab-btn:not(.active-tab):hover {
        background-color: white !important;
        color: #111827 !important;
        border-color: white !important;
        opacity: 1 !important;
    }
    
    /* Styling khusus untuk konten TinyMCE (SOP) */
    .tinymce-content ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }
    .tinymce-content ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }
    .tinymce-content p {
        margin-bottom: 0.5rem;
    }
    .tinymce-content a {
        color: #e53e3e;
        text-decoration: underline;
    }
    .tinymce-content img {
        border-radius: 0.5rem;
        max-width: 100%;
        height: auto;
        margin: 0.5rem 0;
    }
</style>
@endpush