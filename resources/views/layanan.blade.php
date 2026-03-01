@extends('layouts.app')

@section('title', $layanan['name'])
@section('meta_description', $layanan['description'])

@section('content')

    {{-- ======== DETAIL HERO ======== --}}
    <section class="detail-hero">
        {{-- Decorative --}}
        <div class="absolute top-1/3 right-10 w-64 h-64 rounded-full bg-white/[0.03] blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-48 h-48 rounded-full bg-red-500/[0.05] blur-2xl"></div>

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
                        @if($layanan['icon'] === 'chart')
                            <svg class="w-8 h-8 {{ $c['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                        @elseif($layanan['icon'] === 'book')
                            <svg class="w-8 h-8 {{ $c['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        @elseif($layanan['icon'] === 'database')
                            <svg class="w-8 h-8 {{ $c['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>
                        @elseif($layanan['icon'] === 'briefcase')
                            <svg class="w-8 h-8 {{ $c['text'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        @endif
                    </div>

                    <p class="text-white/40 text-sm font-semibold uppercase tracking-wider mb-2">{{ $layanan['tagline'] }}
                    </p>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-4 tracking-tight">
                        {{ $layanan['name'] }}</h1>
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
                    'e-raport' => ['name' => 'E-Raport', 'tagline' => 'Sistem Penilaian Digital', 'color' => 'blue', 'icon' => 'chart'],
                    'lms' => ['name' => 'LMS', 'tagline' => 'Learning Management System', 'color' => 'green', 'icon' => 'book'],
                    'dapodik' => ['name' => 'Dapodik', 'tagline' => 'Data Pokok Pendidikan', 'color' => 'amber', 'icon' => 'database'],
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
                            @if($other['icon'] === 'chart')
                                <svg class="w-5 h-5 {{ $oc['text'] }}" style="color: #2563EB" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                </svg>
                            @elseif($other['icon'] === 'book')
                                <svg class="w-5 h-5" style="color: #059669" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            @elseif($other['icon'] === 'database')
                                <svg class="w-5 h-5" style="color: #D97706" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                </svg>
                            @elseif($other['icon'] === 'briefcase')
                                <svg class="w-5 h-5" style="color: #7C3AED" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0" />
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