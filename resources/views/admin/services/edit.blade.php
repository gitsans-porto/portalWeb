@extends('layouts.admin')

@section('title', 'Edit Layanan & Prosedur - ' . $service->name)

@section('content')
<div class="p-6">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Layanan, Tata Cara & FAQ</h1>
        <p class="text-gray-500 text-sm">Sesuaikan detail, langkah-langkah prosedur, dan FAQ untuk layanan <span class="font-bold text-red-600">{{ $service->name }}</span>.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-lg flex items-center gap-3">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-medium">Mohon perbaiki kesalahan pada input Anda.</span>
        </div>
    @endif

    <form id="edit-service-form" action="{{ route('admin.services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            {{-- Service Info --}}
            <div class="bg-gray-50 border border-gray-100 rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Nama Layanan</label>
                        <input type="text" value="{{ $service->name }}" disabled class="w-full px-4 py-3 bg-white border border-gray-100 rounded-md text-gray-400 font-medium">
                    </div>
                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Slug (Internal URL)</label>
                        <input type="text" value="{{ $service->slug }}" disabled class="w-full px-4 py-3 bg-white border border-gray-100 rounded-md text-gray-400 font-medium font-mono">
                    </div>
                </div>
                <div class="mt-6">
                    <label class="block text-xs font-black text-gray-900 uppercase tracking-widest mb-2">Link Akses Layanan</label>
                    <input type="url" name="url" value="{{ old('url', $service->url) }}" placeholder="https://..." class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md text-gray-900 font-medium focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all" required>
                    <p class="text-xs text-gray-500 mt-2">URL tujuan saat tombol "Akses Layanan" ditekan.</p>
                </div>
            </div>

            {{-- Tabs Navigation --}}
            <div class="flex gap-2 mb-2 border-b border-gray-200">
                <button type="button" onclick="switchAdminTab('info')" id="btn-tab-info" class="px-6 py-3 font-bold text-sm rounded-t-md border-b-2 border-red-600 text-red-600 bg-white shadow-sm transition-all focus:outline-none">
                    Tentang & Fitur Layanan
                </button>
                <button type="button" onclick="switchAdminTab('sop')" id="btn-tab-sop" class="px-6 py-3 font-bold text-sm rounded-t-md border-b-2 border-transparent text-gray-500 hover:text-gray-900 transition-all focus:outline-none">
                    Tata Cara Prosedur (SOP)
                </button>
                <button type="button" onclick="switchAdminTab('faq')" id="btn-tab-faq" class="px-6 py-3 font-bold text-sm rounded-t-md border-b-2 border-transparent text-gray-500 hover:text-gray-900 transition-all focus:outline-none">
                    FAQ (Pertanyaan Umum)
                </button>
            </div>

            {{-- Info Editor (Tentang & Fitur) --}}
            <div id="content-tab-info" class="bg-white border border-gray-200 rounded-lg p-8 space-y-10">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 border-l-4 border-red-600 pl-4 mb-6">Tentang Layanan (Deskripsi Panjang)</h3>
                    <div class="flex flex-col gap-3">
                        <textarea id="long_description" name="long_description" rows="6" class="w-full px-5 py-4 rounded-md border border-gray-200 bg-gray-50 focus:bg-white focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all font-medium leading-relaxed" placeholder="Tulis deskripsi lengkap layanan di sini..." required>{{ old('long_description', $service->long_description) }}</textarea>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-8 border-b border-gray-50 pb-4">
                        <h3 class="text-lg font-bold text-gray-900 border-l-4 border-red-600 pl-4">Fitur Layanan ("Apa saja yang bisa dilakukan?")</h3>
                        <button type="button" id="add-feature" class="px-4 py-2 bg-red-600 text-white rounded-md text-xs font-bold hover:bg-red-700 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Tambah Fitur
                        </button>
                    </div>

                    <div id="features-container" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @php
                            $featuresData = old('features', $service->features ?? []);
                        @endphp
                        @foreach($featuresData as $index => $feature)
                            <div class="feature-item bg-gray-50 rounded-lg p-6 border border-gray-100 relative shadow-sm" data-index="{{ $index }}">
                                <div class="flex items-start justify-between gap-4 mb-4">
                                    <div class="flex items-center gap-3">
                                        <span class="feature-number w-6 h-6 rounded-md bg-red-600 text-white flex items-center justify-center text-xs font-bold">{{ $index + 1 }}</span>
                                        <h5 class="text-sm font-bold text-gray-900">Fitur #<span class="feature-index-num">{{ $index + 1 }}</span></h5>
                                    </div>
                                    <button type="button" class="remove-feature text-gray-400 hover:text-red-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Judul Fitur</label>
                                            <input type="text" name="features[{{ $index }}][title]" value="{{ $feature['title'] ?? '' }}" placeholder="Contoh: Input Nilai Digital" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-bold text-gray-900 text-sm" required>
                                        </div>
                                        <div>
                                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Icon (Heroicon name)</label>
                                            <input type="text" name="features[{{ $index }}][icon]" value="{{ $feature['icon'] ?? 'chart-bar' }}" placeholder="Contoh: chart-bar, book, users" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-mono text-gray-900 text-sm" required>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Deskripsi Fitur</label>
                                        <textarea name="features[{{ $index }}][desc]" rows="3" placeholder="Jelaskan secara singkat apa yang bisa dilakukan..." class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all text-sm text-gray-600 leading-relaxed" required>{{ $feature['desc'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="empty-features" class="py-12 border-2 border-dashed border-gray-100 rounded-lg text-center col-span-2 {{ count($featuresData) > 0 ? 'hidden' : '' }}">
                        <p class="text-gray-400 italic">Belum ada fitur yang ditambahkan.</p>
                    </div>
                </div>
            </div>

            {{-- SOP Editor --}}
            <div id="content-tab-sop" class="bg-white border border-gray-200 rounded-lg p-8" style="display: none;">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-lg font-bold text-gray-900 border-l-4 border-red-600 pl-4">Langkah-langkah Prosedur</h3>
                    <button type="button" id="add-step" class="px-4 py-2 bg-red-600 text-white rounded-md text-xs font-bold hover:bg-red-700 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Langkah
                    </button>
                </div>

                <div id="sop-container" class="space-y-6">
                    @php
                        $sopData = old('sop', $service->sop ?? []);
                    @endphp
                    
                    @foreach($sopData as $index => $step)
                        <div class="sop-step group bg-gray-50 rounded-lg p-6 border border-gray-100 relative" data-index="{{ $index }}">
                            <div class="flex items-start justify-between gap-4 mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="step-number w-8 h-8 bg-red-600 text-white rounded-md flex items-center justify-center font-bold text-sm">
                                        {{ $index + 1 }}
                                    </div>
                                    <h4 class="font-bold text-gray-900">Langkah <span class="index-num">{{ $index + 1 }}</span></h4>
                                </div>
                                <button type="button" class="remove-step text-gray-400 hover:text-red-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 gap-4">
                                <input type="text" name="sop[{{ $index }}][title]" value="{{ $step['title'] ?? '' }}" placeholder="Judul Langkah (Contoh: Login ke Sistem)" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-bold text-gray-900" required>
                                
                                @php
                                    $hasSub = isset($step['sub_chapters']) && count($step['sub_chapters']) > 0;
                                @endphp
                                <div class="quill-container bg-white rounded-md main-quill-container {{ $hasSub ? 'hidden' : '' }}">
                                    <div class="quill-editor" style="height: 200px;">{!! $step['desc'] ?? '' !!}</div>
                                    <textarea name="sop[{{ $index }}][desc]" class="hidden-quill-input" style="display:none;"></textarea>
                                </div>
                                <div class="sub-chapter-notice text-sm text-amber-600 bg-amber-50 p-3 rounded-md border border-amber-100 flex items-start gap-2 {{ $hasSub ? '' : 'hidden' }}">
                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Pengeditan deskripsi utama dinonaktifkan karena bab ini memiliki sub-bab. Halaman publik hanya akan menampilkan sub-bab.</span>
                                </div>
                                
                                {{-- Sub Chapters --}}
                                <div class="mt-4 pl-4 md:pl-8 border-l-2 border-red-100">
                                    <div class="flex items-center justify-between mb-3">
                                        <h5 class="text-xs font-black uppercase text-gray-500 tracking-widest">Sub-Bab (Opsional)</h5>
                                        <button type="button" class="add-sub-step text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md transition-colors flex items-center gap-1">
                                            + Tambah Sub-Bab
                                        </button>
                                    </div>
                                    <div class="sub-chapters-container space-y-4">
                                        @foreach($step['sub_chapters'] ?? [] as $subIndex => $subStep)
                                            <div class="sub-step bg-white rounded-md p-5 border border-gray-200 relative shadow-sm" data-subindex="{{ $subIndex }}">
                                                <div class="flex justify-between items-center mb-4">
                                                    <div class="flex items-center gap-2">
                                                        <div class="w-6 h-6 bg-red-100 text-red-600 rounded-md flex items-center justify-center font-bold text-xs">{{ $index + 1 }}.<span class="sub-index-num">{{ $subIndex + 1 }}</span></div>
                                                        <h6 class="text-sm font-bold text-gray-700">Sub-Bab</h6>
                                                    </div>
                                                    <button type="button" class="remove-sub-step text-gray-400 hover:text-red-500 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                    </button>
                                                </div>
                                                <div class="grid grid-cols-1 gap-3">
                                                    <input type="text" name="sop[{{ $index }}][sub_chapters][{{ $subIndex }}][title]" value="{{ $subStep['title'] ?? '' }}" placeholder="Judul Sub-Bab (Contoh: Tahap 1)" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-semibold text-gray-800 text-sm" required>
                                                    <div class="quill-container bg-white rounded-md">
                                                        <div class="quill-editor" style="height: 150px;">{!! $subStep['desc'] ?? '' !!}</div>
                                                        <textarea name="sop[{{ $index }}][sub_chapters][{{ $subIndex }}][desc]" class="hidden-quill-input" style="display:none;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(empty($sopData) || count($sopData) == 0)
                    <div id="empty-sop" class="py-12 border-2 border-dashed border-gray-100 rounded-lg text-center">
                        <p class="text-gray-400 italic">Belum ada langkah yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            {{-- FAQ Editor --}}
            <div id="content-tab-faq" class="bg-white border border-gray-200 rounded-lg p-8" style="display: none;">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-lg font-bold text-gray-900 border-l-4 border-red-600 pl-4">FAQ (Pertanyaan Umum)</h3>
                    <button type="button" id="add-faq" class="px-4 py-2 bg-red-600 text-white rounded-md text-xs font-bold hover:bg-red-700 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah FAQ
                    </button>
                </div>

                <div id="faq-container" class="space-y-6">
                    @php
                        $defaultFaqList = [
                            [
                                'q' => 'Siapa saja yang bisa mengakses layanan ' . $service->name . '?',
                                'a' => 'Layanan ini dapat diakses oleh ' . implode(', ', $service->audiences ?? ['pengguna terdaftar']) . '. Pastikan Anda sudah memiliki akun yang aktif dan telah terdaftar oleh administrator sekolah.',
                            ],
                            [
                                'q' => 'Apa yang harus dilakukan jika lupa password?',
                                'a' => 'Hubungi operator atau administrator sekolah melalui ruang Tata Usaha. Anda juga dapat menggunakan fitur "Laporkan Kendala" di portal ini agar permintaan reset password Anda tercatat secara resmi dan diproses sesuai antrian.',
                            ],
                            [
                                'q' => 'Apakah layanan ini bisa diakses dari smartphone?',
                                'a' => 'Ya, layanan ' . $service->name . ' dapat diakses melalui browser di smartphone maupun laptop/komputer. Pastikan koneksi internet Anda stabil untuk pengalaman terbaik.',
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
                        
                        $faqData = old('faq', !empty($service->faq) ? $service->faq : $defaultFaqList);
                    @endphp
                    
                    @foreach($faqData as $index => $item)
                        <div class="faq-item-edit group bg-gray-50 rounded-lg p-6 border border-gray-100 relative" data-index="{{ $index }}">
                            <div class="flex items-start justify-between gap-4 mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="faq-number w-8 h-8 bg-red-600 text-white rounded-md flex items-center justify-center font-bold text-sm">
                                        {{ $index + 1 }}
                                    </div>
                                    <h4 class="font-bold text-gray-900">Pertanyaan <span class="faq-index-num">{{ $index + 1 }}</span></h4>
                                </div>
                                <button type="button" class="remove-faq text-gray-400 hover:text-red-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 gap-4">
                                <input type="text" name="faq[{{ $index }}][q]" value="{{ $item['q'] ?? '' }}" placeholder="Pertanyaan (Contoh: Siapa yang bisa akses layanan ini?)" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-bold text-gray-900" required>
                                <textarea name="faq[{{ $index }}][a]" rows="3" placeholder="Jawaban..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all text-sm text-gray-600 leading-relaxed" required>{{ $item['a'] ?? '' }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(count($faqData) == 0)
                    <div id="empty-faq" class="py-12 border-2 border-dashed border-gray-100 rounded-lg text-center">
                        <p class="text-gray-400 italic">Belum ada FAQ yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="px-8 py-4 bg-red-600 text-white rounded-md font-bold hover:bg-red-700 shadow-lg shadow-red-600/20 transition-all flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<template id="feature-template">
    <div class="feature-item bg-gray-50 rounded-lg p-6 border border-gray-100 relative shadow-sm" data-index="__INDEX__">
        <div class="flex items-start justify-between gap-4 mb-4">
            <div class="flex items-center gap-3">
                <span class="feature-number w-6 h-6 rounded-md bg-red-600 text-white flex items-center justify-center text-xs font-bold">__NUM__</span>
                <h5 class="text-sm font-bold text-gray-900">Fitur #<span class="feature-index-num">__NUM__</span></h5>
            </div>
            <button type="button" class="remove-feature text-gray-400 hover:text-red-500 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Judul Fitur</label>
                    <input type="text" name="features[__INDEX__][title]" placeholder="Contoh: Input Nilai Digital" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-bold text-gray-900 text-sm" required>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Icon (Heroicon name)</label>
                    <input type="text" name="features[__INDEX__][icon]" placeholder="Contoh: chart-bar, book, users" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-mono text-gray-900 text-sm" required>
                </div>
            </div>
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Deskripsi Fitur</label>
                <textarea name="features[__INDEX__][desc]" rows="3" placeholder="Jelaskan secara singkat apa yang bisa dilakukan..." class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all text-sm text-gray-600 leading-relaxed" required></textarea>
            </div>
        </div>
    </div>
</template>

<template id="sop-template">
    <div class="sop-step group bg-gray-50 rounded-lg p-6 border border-gray-100 relative" data-index="__INDEX__">
        <div class="flex items-start justify-between gap-4 mb-4">
            <div class="flex items-center gap-3">
                <div class="step-number w-8 h-8 bg-red-600 text-white rounded-md flex items-center justify-center font-bold text-sm">
                    __NUM__
                </div>
                <h4 class="font-bold text-gray-900">Langkah <span class="index-num">__NUM__</span></h4>
            </div>
            <button type="button" class="remove-step text-gray-400 hover:text-red-500 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <input type="text" name="sop[__INDEX__][title]" placeholder="Judul Langkah" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-bold text-gray-900" required>
            
            <div class="quill-container bg-white rounded-md main-quill-container">
                <div class="quill-editor" style="height: 200px;"></div>
                <textarea name="sop[__INDEX__][desc]" class="hidden-quill-input" style="display:none;"></textarea>
            </div>
            <div class="sub-chapter-notice text-sm text-amber-600 bg-amber-50 p-3 rounded-md border border-amber-100 flex items-start gap-2 hidden">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Pengeditan deskripsi utama dinonaktifkan karena bab ini memiliki sub-bab. Halaman publik hanya akan menampilkan sub-bab.</span>
            </div>
            
            {{-- Sub Chapters --}}
            <div class="mt-4 pl-4 md:pl-8 border-l-2 border-red-100">
                <div class="flex items-center justify-between mb-3">
                    <h5 class="text-xs font-black uppercase text-gray-500 tracking-widest">Sub-Bab (Opsional)</h5>
                    <button type="button" class="add-sub-step text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md transition-colors flex items-center gap-1">
                        + Tambah Sub-Bab
                    </button>
                </div>
                <div class="sub-chapters-container space-y-4"></div>
            </div>
        </div>
    </div>
</template>

<template id="sub-sop-template">
    <div class="sub-step bg-white rounded-md p-5 border border-gray-200 relative shadow-sm" data-subindex="__SUBINDEX__">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-red-100 text-red-600 rounded-md flex items-center justify-center font-bold text-xs">__PINDEX__.<span class="sub-index-num">__NUM__</span></div>
                <h6 class="text-sm font-bold text-gray-700">Sub-Bab</h6>
            </div>
            <button type="button" class="remove-sub-step text-gray-400 hover:text-red-500 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            </button>
        </div>
        <div class="grid grid-cols-1 gap-3">
            <input type="text" name="sop[__INDEX__][sub_chapters][__SUBINDEX__][title]" placeholder="Judul Sub-Bab (Contoh: Tahap 1)" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-semibold text-gray-800 text-sm" required>
            <div class="quill-container bg-white rounded-md">
                <div class="quill-editor" style="height: 150px;"></div>
                <textarea name="sop[__INDEX__][sub_chapters][__SUBINDEX__][desc]" class="hidden-quill-input" style="display:none;"></textarea>
            </div>
        </div>
    </div>
</template>

<template id="faq-template">
    <div class="faq-item-edit group bg-gray-50 rounded-lg p-6 border border-gray-100 relative" data-index="__INDEX__">
        <div class="flex items-start justify-between gap-4 mb-4">
            <div class="flex items-center gap-3">
                <div class="faq-number w-8 h-8 bg-red-600 text-white rounded-md flex items-center justify-center font-bold text-sm">
                    __NUM__
                </div>
                <h4 class="font-bold text-gray-900">Pertanyaan <span class="faq-index-num">__NUM__</span></h4>
            </div>
            <button type="button" class="remove-faq text-gray-400 hover:text-red-500 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <input type="text" name="faq[__INDEX__][q]" placeholder="Pertanyaan" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all font-bold text-gray-900" required>
            <textarea name="faq[__INDEX__][a]" rows="3" placeholder="Jawaban..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md focus:ring-2 focus:ring-red-500 outline-none transition-all text-sm text-gray-600 leading-relaxed" required></textarea>
        </div>
    </div>
</template>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<style>
    .ql-toolbar.ql-snow {
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
        border-color: #e5e7eb;
        background-color: #f9fafb;
        padding-right: 45px !important; /* Make room for fullscreen button */
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 0.375rem;
        border-bottom-right-radius: 0.375rem;
        border-color: #e5e7eb;
    }
    .ql-editor {
        font-family: inherit;
        font-size: 0.875rem;
        color: #4b5563;
    }

    /* Custom ordered list numbering continuity inside Quill */
    .ql-editor {
        counter-reset: ql-ol-counter;
    }
    .ql-editor ol {
        list-style-type: none !important;
        counter-reset: none !important;
    }
    .ql-editor ol li:not([class*="ql-indent-"]) {
        counter-increment: ql-ol-counter;
    }
    .ql-editor ol li:not([class*="ql-indent-"])::before {
        content: counter(ql-ol-counter) ". " !important;
        display: inline-block !important;
        white-space: nowrap !important;
        width: 1.5em !important;
        margin-left: -1.5em !important;
        margin-right: 0.3em !important;
        text-align: right !important;
        font-weight: bold !important;
    }

    /* Fullscreen editor styles */
    .quill-container.is-fullscreen {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        z-index: 99999 !important;
        margin: 0 !important;
        padding: 1.5rem !important;
        background-color: rgba(15, 23, 42, 0.6) !important; /* backdrop color */
        backdrop-filter: blur(8px) !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
        align-items: center !important;
    }
    .quill-container.is-fullscreen .ql-toolbar {
        width: 90% !important;
        max-width: 1100px !important;
        border-top-left-radius: 0.5rem !important;
        border-top-right-radius: 0.5rem !important;
        background-color: #f9fafb !important;
        border: 1px solid #e5e7eb !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
    }
    .quill-container.is-fullscreen .ql-container {
        width: 90% !important;
        max-width: 1100px !important;
        height: 70vh !important;
        background-color: white !important;
        border: 1px solid #e5e7eb !important;
        border-top: none !important;
        border-bottom-left-radius: 0.5rem !important;
        border-bottom-right-radius: 0.5rem !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
    }
    .quill-container.is-fullscreen .btn-fullscreen-quill {
        right: calc(5% + 10px) !important;
        top: 22px !important;
    }

    /* CSS rules to guarantee visibility toggling of expand/shrink icons */
    .quill-container .icon-shrink {
        display: none !important;
    }
    .quill-container .icon-expand {
        display: block !important;
    }
    .quill-container.is-fullscreen .icon-shrink {
        display: block !important;
    }
    .quill-container.is-fullscreen .icon-expand {
        display: none !important;
    }
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    window.switchAdminTab = function(tabName) {
        const tabInfo = document.getElementById('content-tab-info');
        const tabSop = document.getElementById('content-tab-sop');
        const tabFaq = document.getElementById('content-tab-faq');
        
        const btnInfo = document.getElementById('btn-tab-info');
        const btnSop = document.getElementById('btn-tab-sop');
        const btnFaq = document.getElementById('btn-tab-faq');

        if (tabInfo) tabInfo.style.display = 'none';
        if (tabSop) tabSop.style.display = 'none';
        if (tabFaq) tabFaq.style.display = 'none';

        [btnInfo, btnSop, btnFaq].forEach(btn => {
            if (btn) {
                btn.classList.remove('border-red-600', 'text-red-600', 'bg-white', 'shadow-sm');
                btn.classList.add('border-transparent', 'text-gray-500');
            }
        });

        if (tabName === 'info') {
            if (tabInfo) tabInfo.style.display = 'block';
            if (btnInfo) {
                btnInfo.classList.add('border-red-600', 'text-red-600', 'bg-white', 'shadow-sm');
                btnInfo.classList.remove('border-transparent', 'text-gray-500');
            }
        } else if (tabName === 'sop') {
            if (tabSop) tabSop.style.display = 'block';
            if (btnSop) {
                btnSop.classList.add('border-red-600', 'text-red-600', 'bg-white', 'shadow-sm');
                btnSop.classList.remove('border-transparent', 'text-gray-500');
            }
        } else if (tabName === 'faq') {
            if (tabFaq) tabFaq.style.display = 'block';
            if (btnFaq) {
                btnFaq.classList.add('border-red-600', 'text-red-600', 'bg-white', 'shadow-sm');
                btnFaq.classList.remove('border-transparent', 'text-gray-500');
            }
        }
    };
    
    // Quill Image Handler
    function imageHandler() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = () => {
            const file = input.files[0];
            
            // Validate file size (max 200KB)
            if (file.size > 200 * 1024) {
                alert('Ukuran gambar melebihi batas 200KB! Silakan kompres gambar Anda terlebih dahulu.');
                return;
            }

            const formData = new FormData();
            formData.append('file', file);
            
            fetch('{{ route("admin.tinymce.upload") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(result => {
                if(result.location) {
                    const range = this.quill.getSelection();
                    this.quill.insertEmbed(range.index, 'image', result.location);
                } else {
                    alert('Upload gagal');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengunggah gambar');
            });
        };
    }

    const quillOptions = {
        theme: 'snow',
        modules: {
            imageResize: {
                displaySize: true
            },
            keyboard: {
                bindings: {
                    disableListAutofill: {
                        key: ' ',
                        collapsed: true,
                        format: { list: false },
                        prefix: /^\s*?([a-zA-Z0-9]+\.|-|\*)$/,
                        handler: function(range, context) {
                            this.quill.insertText(range.index, ' ');
                            return false;
                        }
                    }
                }
            },
            toolbar: {
                container: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['link', 'image'],
                    ['clean']
                ],
                handlers: {
                    image: imageHandler
                }
            }
        }
    };

    const quillInstances = [];

    function addFullscreenButton(container) {
        if (!container || container.querySelector('.btn-fullscreen-quill')) return;
        
        container.classList.add('relative');
        
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'btn-fullscreen-quill absolute top-2 right-2 z-20 p-1.5 bg-white border border-gray-200 rounded text-gray-500 hover:text-gray-900 hover:bg-gray-50 hover:border-gray-300 transition-all flex items-center justify-center';
        btn.title = 'Perbesar / Perkecil Editor';
        btn.style.height = '28px';
        btn.style.width = '28px';
        btn.innerHTML = `
            <svg class="w-4 h-4 icon-expand" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
            </svg>
            <svg class="w-4 h-4 icon-shrink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        `;
        
        container.appendChild(btn);
        
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isFullscreen = container.classList.toggle('is-fullscreen');
            
            if (isFullscreen) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
    }

    // Inisialisasi Quill awal
    document.querySelectorAll('.quill-editor').forEach(function(el) {
        const quill = new Quill(el, quillOptions);
        const container = el.closest('.quill-container');
        quillInstances.push({
            quill: quill,
            container: container
        });
        addFullscreenButton(container);
    });

    // Form submit trigger save for Quill
    const form = document.getElementById('edit-service-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Remove old error messages and red borders
            document.querySelectorAll('.quill-error-msg').forEach(el => el.remove());
            document.querySelectorAll('.quill-container').forEach(el => {
                el.classList.remove('border', 'border-red-500');
            });

            quillInstances.forEach(instance => {
                const hiddenInput = instance.container.querySelector('.hidden-quill-input');
                const isHidden = instance.container.classList.contains('hidden');
                
                let content = instance.quill.root.innerHTML;
                let textContent = instance.quill.getText().trim();
                
                if (hiddenInput) {
                    hiddenInput.value = content;
                }

                // If this editor is visible, validate it
                if (!isHidden) {
                    // It is empty if there's no text and no images
                    if (textContent === '' && !content.includes('<img')) {
                        isValid = false;
                        
                        // Add red border
                        instance.container.classList.add('border', 'border-red-500');
                        
                        // Add error message text
                        const errorMsg = document.createElement('p');
                        errorMsg.className = 'quill-error-msg text-xs text-red-600 font-bold mt-1.5 ml-1';
                        errorMsg.textContent = 'Bagian ini tidak boleh kosong!';
                        instance.container.parentNode.insertBefore(errorMsg, instance.container.nextSibling);
                    }
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Terdapat bagian deskripsi tata cara yang masih kosong. Mohon periksa kembali!');
                
                // Switch to SOP tab if needed
                const tabSop = document.getElementById('content-tab-sop');
                if (tabSop && tabSop.style.display === 'none') {
                    window.switchAdminTab('sop');
                }
            }
        });
    }

    // Features logic
    const featuresContainer = document.getElementById('features-container');
    const addFeatureButton = document.getElementById('add-feature');
    const featureTemplate = document.getElementById('feature-template').innerHTML;
    const emptyFeatureMsg = document.getElementById('empty-features');

    function updateFeatureNumbers() {
        const items = featuresContainer.querySelectorAll('.feature-item');
        items.forEach((item, index) => {
            const num = index + 1;
            item.querySelector('.feature-number').textContent = num;
            item.querySelector('.feature-index-num').textContent = num;
            
            // Update input/textarea names
            const inputs = item.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/features\[\d+\]/, `features[${index}]`));
                }
            });
        });

        if (items.length > 0 && emptyFeatureMsg) {
            emptyFeatureMsg.classList.add('hidden');
        } else if (emptyFeatureMsg) {
            emptyFeatureMsg.classList.remove('hidden');
        }
    }

    if (addFeatureButton) {
        addFeatureButton.addEventListener('click', function() {
            const index = featuresContainer.querySelectorAll('.feature-item').length;
            const html = featureTemplate
                .replace(/__INDEX__/g, index)
                .replace(/__NUM__/g, index + 1);
            
            const div = document.createElement('div');
            div.innerHTML = html;
            featuresContainer.appendChild(div.firstElementChild);
            updateFeatureNumbers();
        });
    }

    if (featuresContainer) {
        featuresContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-feature')) {
                e.target.closest('.feature-item').remove();
                updateFeatureNumbers();
            }
        });
    }

    // SOP logic
    const container = document.getElementById('sop-container');
    const addButton = document.getElementById('add-step');
    const template = document.getElementById('sop-template').innerHTML;
    const subTemplate = document.getElementById('sub-sop-template').innerHTML;
    const emptyMsg = document.getElementById('empty-sop');

    function updateNumbers() {
        const steps = container.querySelectorAll('.sop-step');
        steps.forEach((step, index) => {
            const num = index + 1;
            step.dataset.index = index;
            step.querySelector('.step-number').textContent = num;
            step.querySelector('.index-num').textContent = num;
            
            // Update input names for main chapter
            const titleInput = step.querySelector(`input[name^="sop["]`);
            if (titleInput) titleInput.setAttribute('name', `sop[${index}][title]`);
            const descInput = step.querySelector(`textarea[name^="sop["]`);
            if (descInput) descInput.setAttribute('name', `sop[${index}][desc]`);

            // Update sub chapters
            const subSteps = step.querySelectorAll('.sub-step');
            const mainQuill = step.querySelector('.main-quill-container');
            const notice = step.querySelector('.sub-chapter-notice');

            if (subSteps.length > 0) {
                if (mainQuill) mainQuill.classList.add('hidden');
                if (notice) notice.classList.remove('hidden');
            } else {
                if (mainQuill) mainQuill.classList.remove('hidden');
                if (notice) notice.classList.add('hidden');
            }

            subSteps.forEach((subStep, subIndex) => {
                const subNum = subIndex + 1;
                subStep.dataset.subindex = subIndex;
                subStep.querySelector('.sub-index-num').textContent = subNum;
                
                const subTitleInput = subStep.querySelector(`input[name*="[sub_chapters]"]`);
                if (subTitleInput) subTitleInput.setAttribute('name', `sop[${index}][sub_chapters][${subIndex}][title]`);
                const subDescInput = subStep.querySelector(`textarea[name*="[sub_chapters]"]`);
                if (subDescInput) subDescInput.setAttribute('name', `sop[${index}][sub_chapters][${subIndex}][desc]`);
            });
        });

        if (steps.length > 0 && emptyMsg) {
            emptyMsg.classList.add('hidden');
        } else if (emptyMsg) {
            emptyMsg.classList.remove('hidden');
        }
    }

    if (addButton) {
        addButton.addEventListener('click', function() {
            const index = container.querySelectorAll('.sop-step').length;
            const html = template
                .replace(/__INDEX__/g, index)
                .replace(/__NUM__/g, index + 1);
            
            const div = document.createElement('div');
            div.innerHTML = html;
            container.appendChild(div.firstElementChild);
            updateNumbers();
            
            // Inisialisasi Quill untuk elemen yang baru ditambahkan
            const newEditor = container.lastElementChild.querySelector('.quill-editor');
            if (newEditor) {
                const quill = new Quill(newEditor, quillOptions);
                const newContainer = newEditor.closest('.quill-container');
                quillInstances.push({
                    quill: quill,
                    container: newContainer
                });
                addFullscreenButton(newContainer);
            }
        });
    }

    if (container) {
        container.addEventListener('click', function(e) {
            // Remove Main Chapter
            if (e.target.closest('.remove-step')) {
                const stepEl = e.target.closest('.sop-step');
                // Remove all quills in this step from quillInstances array
                const editorEls = stepEl.querySelectorAll('.quill-editor');
                editorEls.forEach(editorEl => {
                    const qIndex = quillInstances.findIndex(i => i.container.contains(editorEl));
                    if(qIndex > -1) {
                        quillInstances.splice(qIndex, 1);
                    }
                });
                stepEl.remove();
                updateNumbers();
            }

            // Add Sub Chapter
            if (e.target.closest('.add-sub-step')) {
                const stepEl = e.target.closest('.sop-step');
                const subContainer = stepEl.querySelector('.sub-chapters-container');
                const index = stepEl.dataset.index;
                const pIndex = parseInt(index) + 1;
                const subIndex = subContainer.querySelectorAll('.sub-step').length;

                const html = subTemplate
                    .replace(/__INDEX__/g, index)
                    .replace(/__SUBINDEX__/g, subIndex)
                    .replace(/__PINDEX__/g, pIndex)
                    .replace(/__NUM__/g, subIndex + 1);

                const div = document.createElement('div');
                div.innerHTML = html;
                subContainer.appendChild(div.firstElementChild);
                updateNumbers();

                const newEditor = subContainer.lastElementChild.querySelector('.quill-editor');
                if (newEditor) {
                    const quill = new Quill(newEditor, quillOptions);
                    const newContainer = newEditor.closest('.quill-container');
                    quillInstances.push({
                        quill: quill,
                        container: newContainer
                    });
                    addFullscreenButton(newContainer);
                }
            }

            // Remove Sub Chapter
            if (e.target.closest('.remove-sub-step')) {
                const subStepEl = e.target.closest('.sub-step');
                const editorEl = subStepEl.querySelector('.quill-editor');
                if(editorEl) {
                    const qIndex = quillInstances.findIndex(i => i.container.contains(editorEl));
                    if(qIndex > -1) {
                        quillInstances.splice(qIndex, 1);
                    }
                }
                subStepEl.remove();
                updateNumbers();
            }
        });
    }

    // FAQ logic
    const faqContainer = document.getElementById('faq-container');
    const addFaqButton = document.getElementById('add-faq');
    const faqTemplate = document.getElementById('faq-template').innerHTML;
    const emptyFaqMsg = document.getElementById('empty-faq');

    function updateFaqNumbers() {
        const items = faqContainer.querySelectorAll('.faq-item-edit');
        items.forEach((item, index) => {
            const num = index + 1;
            item.querySelector('.faq-number').textContent = num;
            item.querySelector('.faq-index-num').textContent = num;
            
            // Update input names
            const inputs = item.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/\[\d+\]/, `[${index}]`));
                }
            });
        });

        if (items.length > 0 && emptyFaqMsg) {
            emptyFaqMsg.classList.add('hidden');
        } else if (emptyFaqMsg) {
            emptyFaqMsg.classList.remove('hidden');
        }
    }

    if (addFaqButton) {
        addFaqButton.addEventListener('click', function() {
            const index = faqContainer.querySelectorAll('.faq-item-edit').length;
            const html = faqTemplate
                .replace(/__INDEX__/g, index)
                .replace(/__NUM__/g, index + 1);
            
            const div = document.createElement('div');
            div.innerHTML = html;
            faqContainer.appendChild(div.firstElementChild);
            updateFaqNumbers();
        });
    }

    if (faqContainer) {
        faqContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-faq')) {
                e.target.closest('.faq-item-edit').remove();
                updateFaqNumbers();
            }
        });
    }
});
</script>
@endsection
