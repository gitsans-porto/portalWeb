@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Portal Layanan Sistem Informasi Terpadu SMKN 1 Limboto — Akses E-Raport, LMS, Dapodik, dan PeKaeL dengan mudah.')

@section('content')

    {{-- ======== HERO SECTION ======== --}}
    <section class="hero-section" id="layanan">
        {{-- Decorative Elements --}}
        <div class="absolute top-1/4 left-10 w-64 h-64 rounded-full bg-white/[0.02] blur-3xl"
            style="animation: float 8s ease-in-out infinite;"></div>
        <div class="absolute bottom-1/4 right-10 w-80 h-80 rounded-full bg-red-500/[0.04] blur-3xl"
            style="animation: float 10s ease-in-out infinite 2s;"></div>
        <div class="absolute top-20 right-1/4 w-40 h-40 rounded-full bg-white/[0.015] blur-2xl"
            style="animation: float 6s ease-in-out infinite 1s;"></div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-0">
            <div class="text-center mb-12 lg:mb-16">
                {{-- School Badge --}}
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/[0.08] border border-white/[0.12] rounded-full mb-6 backdrop-blur-sm">
                    <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
                    <span class="text-white/70 text-sm font-medium">Portal Aktif — SMKN 1 Limboto</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.1] mb-5 tracking-tight">
                    Portal Layanan
                    <span class="block text-white/90 mt-1">SMKN 1 Limboto</span>
                </h1>

                <p class="text-lg text-white/70 max-w-2xl mx-auto leading-relaxed">
                    Akses seluruh layanan digital SMKN 1 Limboto dalam satu platform terpadu.
                    Temukan panduan lengkap dan akses cepat ke setiap layanan.
                </p>
            </div>

            {{-- ======== SERVICE CARDS GRID ======== --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-5 max-w-5xl mx-auto">

                @foreach($layananList as $index => $item)
                    @php
                        $colors = [
                            'blue' => ['bg' => 'bg-blue-500/20', 'text' => 'text-blue-300', 'border' => 'border-blue-400/20'],
                            'green' => ['bg' => 'bg-emerald-500/20', 'text' => 'text-emerald-300', 'border' => 'border-emerald-400/20'],
                            'amber' => ['bg' => 'bg-amber-500/20', 'text' => 'text-amber-300', 'border' => 'border-amber-400/20'],
                            'purple' => ['bg' => 'bg-purple-500/20', 'text' => 'text-purple-300', 'border' => 'border-purple-400/20'],
                        ];
                        $c = $colors[$item['color']] ?? $colors['blue'];
                    @endphp

                    <a href="{{ route('layanan.detail', $item['slug']) }}"
                        class="service-card reveal reveal-delay-{{ $index + 1 }}">

                        <div class="flex flex-col items-center text-center mb-4">
                            <div class="mb-4">
                                @if($item['icon'] === 'document-chart-bar')
                                    <svg class="w-10 h-10 {{ $c['text'] }}" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM9.75 17.25a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75Zm2.25-3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 .75-.75Zm3.75-1.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-5.25Z" clip-rule="evenodd" />
                                        <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                    </svg>
                                @elseif($item['icon'] === 'book')
                                    <svg class="w-10 h-10 {{ $c['text'] }}" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                    </svg>
                                @elseif($item['icon'] === 'academic-cap')
                                    <svg class="w-10 h-10 {{ $c['text'] }}" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.174v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                        <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286a48.4 48.4 0 0 1 9.786 3.283.75.75 0 0 0 .832-.005h-.002Z" />
                                        <path d="M7.084 14.292a.75.75 0 0 0-1.5.036 20.026 20.026 0 0 0 .345 4.084.75.75 0 0 0 1.472-.29 18.56 18.56 0 0 1-.317-3.83Z" />
                                    </svg>
                                @elseif($item['icon'] === 'briefcase')
                                    <svg class="w-10 h-10 {{ $c['text'] }}" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75a24.726 24.726 0 0 1-7.814-1.259c-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25ZM13.5 4.5h-3a1.5 1.5 0 0 0-1.5 1.5v.054A50.352 50.352 0 0 1 12 6a50.352 50.352 0 0 1 3 .054V6a1.5 1.5 0 0 0-1.5-1.5Z" clip-rule="evenodd" />
                                        <path d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.93 0 5.738-.478 8.287-1.336.252-.085.5-.18.713-.31V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                                    </svg>
                                @endif
                            </div>

                            <h3 class="text-white font-bold text-lg mb-1">{{ $item['name'] }}</h3>
                            <p class="text-white text-xs font-medium uppercase tracking-wider opacity-70">{{ $item['tagline'] }}</p>
                        </div>

                        <p class="text-white text-sm leading-relaxed mb-4 opacity-80">{{ Str::limit($item['description'], 80) }}</p>

                        <div
                            class="flex items-center gap-1.5 text-white text-sm font-medium opacity-80 hover:opacity-100 transition-opacity">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </a>
                @endforeach

            </div>

            {{-- Quick Stats below cards --}}
            <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-14 mt-14 text-center">
                <div>
                    <div class="text-2xl font-bold text-white">4</div>
                    <div class="text-white text-xs font-medium mt-1 uppercase tracking-wider opacity-80">Layanan Aktif</div>
                </div>
                <div class="w-px h-8 bg-white/10 hidden sm:block"></div>
                <div>
                    <div class="text-2xl font-bold text-white">3</div>
                    <div class="text-white text-xs font-medium mt-1 uppercase tracking-wider opacity-80">Platform Terintegrasi</div>
                </div>
                <div class="w-px h-8 bg-white/10 hidden sm:block"></div>
                <div>
                    <div class="text-2xl font-bold text-white">24/7</div>
                    <div class="text-white text-xs font-medium mt-1 uppercase tracking-wider opacity-80">Akses Online</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======== PROFIL SEKOLAH ======== --}}
    <section class="py-20 lg:py-28 bg-white" id="profil">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-14 reveal">
                <span class="section-badge mb-4">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                    </svg>
                    Profil Sekolah
                </span>
                <h2 class="section-title mb-4">SMKN 1 Limboto</h2>
                <p class="section-subtitle mx-auto">
                    Sekolah Menengah Kejuruan yang berkomitmen mencetak lulusan berkompeten dan siap kerja.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Visi --}}
                <div class="profile-card reveal reveal-delay-1">
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Visi</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Menjadi lembaga pendidikan kejuruan unggulan yang menghasilkan lulusan berkarakter, berkompeten, dan
                        berdaya saing di era digital dan global.
                    </p>
                </div>

                {{-- Misi --}}
                <div class="profile-card reveal reveal-delay-2">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Misi</h3>
                    <ul class="text-gray-500 text-sm leading-relaxed space-y-2">
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary mt-2 flex-shrink-0"></span>
                            <span>Menyelenggarakan pendidikan berbasis teknologi informasi</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary mt-2 flex-shrink-0"></span>
                            <span>Mengembangkan kemitraan dengan dunia usaha dan industri</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary mt-2 flex-shrink-0"></span>
                            <span>Membentuk karakter peserta didik yang berintegritas</span>
                        </li>
                    </ul>
                </div>

                {{-- Keunggulan --}}
                <div class="profile-card reveal reveal-delay-3 md:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.562.562 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Keunggulan</h3>
                    <ul class="text-gray-500 text-sm leading-relaxed space-y-2">
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mt-2 flex-shrink-0"></span>
                            <span>Fasilitas laboratorium lengkap dan modern</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mt-2 flex-shrink-0"></span>
                            <span>Teaching Factory dengan mitra industri ternama</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mt-2 flex-shrink-0"></span>
                            <span>Sistem informasi digital terintegrasi</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ======== STATISTIK ======== --}}
    <section class="py-16 lg:py-20 bg-surface-alt">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                <div class="stat-card reveal reveal-delay-1">
                    <div class="stat-number" data-counter="1200" data-suffix="+">0</div>
                    <div class="text-gray-500 text-sm font-medium mt-2">Siswa Aktif</div>
                </div>
                <div class="stat-card reveal reveal-delay-2">
                    <div class="stat-number" data-counter="85" data-suffix="+">0</div>
                    <div class="text-gray-500 text-sm font-medium mt-2">Tenaga Pendidik</div>
                </div>
                <div class="stat-card reveal reveal-delay-3">
                    <div class="stat-number" data-counter="9">0</div>
                    <div class="text-gray-500 text-sm font-medium mt-2">Kompetensi Keahlian</div>
                </div>
                <div class="stat-card reveal reveal-delay-4">
                    <div class="stat-number" data-counter="50" data-suffix="+">0</div>
                    <div class="text-gray-500 text-sm font-medium mt-2">Mitra Industri</div>
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
                <a href="#" class="btn-outline text-sm flex-shrink-0 self-start sm:self-auto">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- News 1 --}}
                <div class="news-card reveal reveal-delay-1">
                    <div class="news-card-image"
                        style="background: linear-gradient(135deg, #FE0002 0%, #CC0001 100%); display:flex; align-items:center; justify-content:center;">
                        <svg class="w-16 h-16 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="text-xs font-semibold text-primary bg-red-50 px-2.5 py-1 rounded-full">Akademik</span>
                            <span class="text-xs text-gray-400">28 Feb 2026</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2 leading-snug">Peluncuran Sistem E-Raport Semester Genap
                            Tahun Ajaran 2025/2026</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Sistem E-Raport telah diperbarui dengan fitur baru
                            untuk memudahkan proses penilaian semester genap.</p>
                    </div>
                </div>

                {{-- News 2 --}}
                <div class="news-card reveal reveal-delay-2">
                    <div class="news-card-image"
                        style="background: linear-gradient(135deg, #059669 0%, #047857 100%); display:flex; align-items:center; justify-content:center;">
                        <svg class="w-16 h-16 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">PKL</span>
                            <span class="text-xs text-gray-400">25 Feb 2026</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2 leading-snug">Penerjunan PKL Gelombang II ke 25 Perusahaan
                            Mitra</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Sebanyak 200 siswa kelas XI resmi diterjunkan ke
                            lokasi PKL di berbagai perusahaan mitra industri.</p>
                    </div>
                </div>

                {{-- News 3 --}}
                <div class="news-card reveal reveal-delay-3">
                    <div class="news-card-image"
                        style="background: linear-gradient(135deg, #7C3AED 0%, #6D28D9 100%); display:flex; align-items:center; justify-content:center;">
                        <svg class="w-16 h-16 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span
                                class="text-xs font-semibold text-purple-600 bg-purple-50 px-2.5 py-1 rounded-full">Teknologi</span>
                            <span class="text-xs text-gray-400">20 Feb 2026</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2 leading-snug">Workshop Digitalisasi Pendidikan bagi Guru dan
                            Tenaga Kependidikan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Pelatihan penggunaan platform LMS dan tools digital
                            untuk meningkatkan kualitas pembelajaran.</p>
                    </div>
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