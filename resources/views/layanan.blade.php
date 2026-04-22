@extends('layouts.app')

@section('title', $layanan['name'])
@section('meta_description', $layanan['description'])

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
                <span class="text-white/70">{{ $layanan['name'] }}</span>
            </nav>

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="max-w-2xl">
                    {{-- Icon --}}
                    @php
                        $colorMap = [
                            'blue' => ['bg' => 'bg-blue-500/20', 'text' => 'text-blue-300', 'border' => 'border-blue-400/30'],
                            'green' => ['bg' => 'bg-emerald-500/20', 'text' => 'text-emerald-300', 'border' => 'border-emerald-400/30'],
                            'amber' => ['bg' => 'bg-amber-500/20', 'text' => 'text-amber-300', 'border' => 'border-amber-400/30'],
                            'purple' => ['bg' => 'bg-purple-500/20', 'text' => 'text-purple-300', 'border' => 'border-purple-400/30'],
                        ];
                        $c = $colorMap[$layanan['color']] ?? $colorMap['blue'];
                    @endphp

                    <div
                        class="w-16 h-16 rounded-2xl {{ $c['bg'] }} border {{ $c['border'] }} flex items-center justify-center mb-6">
                        @if($layanan['icon'] === 'document-chart-bar')
                            <svg class="w-8 h-8 {{ $c['text'] }}" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM9.75 17.25a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75Zm2.25-3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 .75-.75Zm3.75-1.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-5.25Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                            </svg>
                        @elseif($layanan['icon'] === 'book')
                            <svg class="w-8 h-8 {{ $c['text'] }}" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                            </svg>
                        @elseif($layanan['icon'] === 'academic-cap')
                            <svg class="w-8 h-8 {{ $c['text'] }}" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.174v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                <path
                                    d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286a48.4 48.4 0 0 1 9.786 3.283.75.75 0 0 0 .832-.005h-.002Z" />
                                <path
                                    d="M7.084 14.292a.75.75 0 0 0-1.5.036 20.026 20.026 0 0 0 .345 4.084.75.75 0 0 0 1.472-.29 18.56 18.56 0 0 1-.317-3.83Z" />
                            </svg>
                        @elseif($layanan['icon'] === 'briefcase')
                            <svg class="w-8 h-8 {{ $c['text'] }}" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75a24.726 24.726 0 0 1-7.814-1.259c-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25ZM13.5 4.5h-3a1.5 1.5 0 0 0-1.5 1.5v.054A50.352 50.352 0 0 1 12 6a50.352 50.352 0 0 1 3 .054V6a1.5 1.5 0 0 0-1.5-1.5Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.93 0 5.738-.478 8.287-1.336.252-.085.5-.18.713-.31V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                            </svg>
                        @endif
                    </div>

                    <p class="text-white/40 text-sm font-semibold uppercase tracking-wider mb-2">{{ $layanan['tagline'] }}
                    </p>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-4 tracking-tight">
                        {{ $layanan['name'] }}
                    </h1>
                    <p class="text-lg text-white/55 leading-relaxed">{{ $layanan['long_description'] }}</p>
                </div>

                {{-- CTA & Audiences --}}
                <div class="flex-shrink-0">
                    <a href="{{ $layanan['url'] }}" target="_blank" rel="noopener noreferrer"
                        class="btn-primary text-base px-8 py-4 mb-5 w-full sm:w-auto justify-center">
                        Akses {{ $layanan['name'] }}
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                    <div class="flex flex-wrap gap-2 mt-4">
                        @foreach($layanan['audiences'] as $audience)
                            <span class="access-badge bg-white/[0.08] border-white/[0.12] text-white/60">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                {{ $audience }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======== PANDUAN PENGGUNAAN (SOP) ======== --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-12 reveal">
                <span class="section-badge mb-4">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z" />
                    </svg>
                    Panduan Penggunaan
                </span>
                <h2 class="section-title mb-3">Tata Cara Penggunaan</h2>
                <p class="section-subtitle">
                    Ikuti langkah-langkah berikut untuk mengakses dan menggunakan layanan {{ $layanan['name'] }}.
                </p>
            </div>

            {{-- SOP Steps --}}
            <div class="space-y-0">
                @foreach($layanan['sop'] as $index => $step)
                    <div class="sop-step reveal reveal-delay-{{ ($index % 4) + 1 }}">
                        <div class="sop-step-number">{{ $index + 1 }}</div>
                        <div
                            class="bg-surface-alt rounded-xl p-6 border border-border hover:border-primary-100 transition-colors">
                            <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $step['title'] }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ======== INFO TAMBAHAN ======== --}}
    <section class="py-16 lg:py-20 bg-surface-alt">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 reveal">

                {{-- Siapa yang dapat mengakses --}}
                <div class="profile-card">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900">Hak Akses</h3>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Layanan ini dapat diakses oleh:</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($layanan['audiences'] as $audience)
                            <span class="access-badge">
                                <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $audience }}
                            </span>
                        @endforeach
                    </div>
                </div>

                {{-- Info Operasional --}}
                <div class="profile-card">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900">Informasi Operasional</h3>
                    </div>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-green-400"></div>
                            <span>Status: <strong class="text-green-600">Online — Aktif</strong></span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                            <span>Jam Akses: <strong class="text-gray-700">24 jam / 7 hari</strong></span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-amber-400"></div>
                            <span>Dukungan: <strong class="text-gray-700">Senin – Jumat, 08.00 – 16.00 WITA</strong></span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom CTA --}}
            <div class="mt-10 text-center reveal">
                <a href="{{ $layanan['url'] }}" target="_blank" rel="noopener noreferrer"
                    class="btn-primary text-base px-10 py-4">
                    Buka {{ $layanan['name'] }} Sekarang
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                </a>
                <p class="text-gray-400 text-sm mt-4">Anda akan diarahkan ke platform layanan asli.</p>
            </div>
        </div>
    </section>

    {{-- ======== LAYANAN LAINNYA ======== --}}
    <section class="py-16 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 reveal">
                <h2 class="text-xl font-bold text-gray-900">Layanan Lainnya</h2>
                <p class="text-gray-400 text-sm mt-2">Jelajahi layanan digital lainnya yang tersedia</p>
            </div>

            @php
                $allLayanan = [
                    'e-raport' => ['name' => 'E-Raport', 'tagline' => 'Sistem Penilaian Digital', 'color' => 'blue', 'icon' => 'document-chart-bar'],
                    'lms' => ['name' => 'LMS', 'tagline' => 'Learning Management System', 'color' => 'green', 'icon' => 'book'],
                    'dapodik' => ['name' => 'Dapodik', 'tagline' => 'Data Pokok Pendidikan', 'color' => 'amber', 'icon' => 'academic-cap'],
                    'pekael' => ['name' => 'PeKaeL', 'tagline' => 'Praktek Kerja Lapangan', 'color' => 'purple', 'icon' => 'briefcase'],
                ];
                $otherLayanan = collect($allLayanan)->except($layanan['slug']);
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-3xl mx-auto">
                @foreach($otherLayanan as $slug => $other)
                    @php
                        $oc = $colorMap[$other['color']] ?? $colorMap['blue'];
                    @endphp
                    <a href="{{ route('layanan.detail', $slug) }}"
                        class="profile-card flex items-center gap-4 hover:border-primary-100 reveal">
                        <div
                            class="w-11 h-11 rounded-xl {{ str_replace('/20', '/10', $oc['bg']) }} flex items-center justify-center flex-shrink-0">
                            @if($other['icon'] === 'document-chart-bar')
                                <svg class="w-5 h-5 {{ $oc['text'] }}" style="color: #2563EB" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM9.75 17.25a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75Zm2.25-3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 .75-.75Zm3.75-1.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-5.25Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                </svg>
                            @elseif($other['icon'] === 'book')
                                <svg class="w-5 h-5" style="color: #059669" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                </svg>
                            @elseif($other['icon'] === 'academic-cap')
                                <svg class="w-5 h-5" style="color: #D97706" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.174v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                    <path
                                        d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286a48.4 48.4 0 0 1 9.786 3.283.75.75 0 0 0 .832-.005h-.002Z" />
                                    <path
                                        d="M7.084 14.292a.75.75 0 0 0-1.5.036 20.026 20.026 0 0 0 .345 4.084.75.75 0 0 0 1.472-.29 18.56 18.56 0 0 1-.317-3.83Z" />
                                </svg>
                            @elseif($other['icon'] === 'briefcase')
                                <svg class="w-5 h-5" style="color: #7C3AED" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75a24.726 24.726 0 0 1-7.814-1.259c-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25ZM13.5 4.5h-3a1.5 1.5 0 0 0-1.5 1.5v.054A50.352 50.352 0 0 1 12 6a50.352 50.352 0 0 1 3 .054V6a1.5 1.5 0 0 0-1.5-1.5Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.93 0 5.738-.478 8.287-1.336.252-.085.5-.18.713-.31V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm">{{ $other['name'] }}</h3>
                            <p class="text-gray-400 text-xs">{{ $other['tagline'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection