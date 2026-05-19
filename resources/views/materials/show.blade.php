@extends('layouts.app')

@section('title', 'Bahan Ajar ' . $major->name)

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
@endpush

@section('content')
    {{-- ======== DETAIL HERO ======== --}}
    <section class="detail-hero">
        <div class="detail-hero-bg" style="background-image: url('{{ $major->image_path ? Storage::url($major->image_path) : asset('images/gambarSekolah.jpeg') }}')"></div>
        <div class="detail-hero-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center justify-center gap-2 text-sm text-white/40 mb-8">
                <a href="{{ route('beranda') }}" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <a href="{{ route('materials.index') }}" class="hover:text-white/70 transition-colors">Bahan Ajar</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white/70">{{ $major->name }}</span>
            </nav>

            <div class="flex flex-col items-center text-center">
                <span class="px-4 py-1.5 rounded-full bg-red-600 text-white text-xs font-black uppercase tracking-widest mb-6">
                    Bahan Ajar Jurusan
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    {{ $major->name }}
                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    Unduh berbagai modul, materi presentasi, dan bahan ajar lainnya untuk mendukung kegiatan belajar mandiri Anda.
                </p>
            </div>
        </div>
    </section>

    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Search & Filters Row --}}
            <div class="flex flex-col xl:flex-row gap-4 mb-10">
                {{-- Search Bar --}}
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari bahan ajar..." class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200 bg-white focus:bg-white focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm font-bold text-gray-700 placeholder-gray-500 shadow-sm">
                </div>

                {{-- Filter Kelas --}}
                <div class="relative w-full xl:w-48">
                    <select id="filterKelas" class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white focus:bg-white focus:border-red-500 outline-none transition-all text-sm font-bold text-gray-600 appearance-none cursor-pointer shadow-sm">
                        <option value="">Pilih Kelas</option>
                        <option value="10">Kelas 10</option>
                        <option value="11">Kelas 11</option>
                        <option value="12">Kelas 12</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                {{-- Filter Jenis Mapel --}}
                <div class="relative w-full xl:w-56">
                    <select id="filterJenisMapel" class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white focus:bg-white focus:border-red-500 outline-none transition-all text-sm font-bold text-gray-600 appearance-none cursor-pointer shadow-sm">
                        <option value="">Semua Jenis Mapel</option>
                        <option value="umum">Umum</option>
                        <option value="kejuruan">Kejuruan</option>
                        <option value="pilihan">Pilihan</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                {{-- Filter Mapel --}}
                <div class="relative w-full xl:w-64">
                    <select id="filterMapel" class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white focus:bg-white focus:border-red-500 outline-none transition-all text-sm font-bold text-gray-600 appearance-none cursor-pointer shadow-sm disabled:opacity-50 disabled:bg-gray-100">
                        <option value="">Pilih Mapel</option>
                        {{-- Opsi mapel akan dimuat dinamis oleh JS berdasarkan bahan ajar yang tersedia --}}
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Materials List --}}
            <div class="flex flex-col gap-4" id="materialsContainer">
                @forelse($materials as $material)
                    @php
                        $displayType = $material->file_type;
                        if ($displayType === 'link' && $material->file_url && preg_match('/youtube\.com|youtu\.be/i', $material->file_url)) {
                            $displayType = 'video';
                        }
                    @endphp
                    <div class="material-card bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-5 flex flex-col md:flex-row md:items-center gap-4 transition-all duration-300 hover:shadow-md"
                         data-title="{{ strtolower($material->title) }}"
                         data-grade="{{ $material->grade }}"
                         data-category="{{ strtolower($material->subject->category ?? 'umum') }}"
                         data-subject="{{ strtolower($material->subject->name ?? 'unknown') }}">
                        
                        {{-- Left Box Icon --}}
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 rounded-xl bg-[#e52129] text-white flex items-center justify-center shadow-sm">
                                @if($displayType == 'pdf')
                                    <span class="material-symbols-outlined text-4xl">file_save</span>
                                @elseif($displayType == 'link')
                                    <span class="material-symbols-outlined text-4xl">drive_export</span>
                                @elseif($displayType == 'video')
                                    <span class="material-symbols-outlined text-4xl">video_template</span>
                                @else
                                    <span class="material-symbols-outlined text-4xl">description</span>
                                @endif
                            </div>
                        </div>

                        {{-- Main Content --}}
                        <div class="flex-1 min-w-0 flex flex-col justify-center">
                            <h3 class="text-xl font-bold text-black mb-1 truncate">{{ $material->title }}</h3>
                            <p class="text-gray-600 text-sm font-bold mb-2 truncate">{{ $material->subject->name ?? 'Unknown' }} - {{ $material->teacher_name ?? 'Guru Tidak Diketahui' }}</p>
                            <p class="text-gray-800 text-sm">
                                {{ $major->code ?? $major->name }} <span class="mx-1 text-gray-400">|</span> 
                                Kelas {{ $material->grade }} <span class="mx-1 text-gray-400">|</span> 
                                {{ ucfirst($material->subject->category ?? 'umum') }}
                            </p>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex-shrink-0 flex items-center gap-3 mt-4 md:mt-0">
                            @if($displayType == 'pdf')
                                <a href="{{ Storage::url($material->file_path) }}" target="_blank" class="flex items-center justify-center p-2.5 bg-black text-white rounded-md hover:bg-gray-800 transition-colors" title="Lihat PDF">
                                    <span class="material-symbols-outlined text-xl">preview</span>
                                </a>
                                <a href="{{ Storage::url($material->file_path) }}" download class="flex items-center gap-2 px-4 py-2.5 bg-[#e52129] text-white text-sm font-bold rounded-md hover:bg-red-700 transition-colors">
                                    <span class="material-symbols-outlined text-[18px]">download</span>
                                    Unduh PDF
                                </a>
                            @elseif($displayType == 'link')
                                <a href="{{ $material->file_url }}" target="_blank" class="flex items-center gap-2 px-4 py-2.5 bg-[#e52129] text-white text-sm font-bold rounded-md hover:bg-red-700 transition-colors">
                                    <span class="material-symbols-outlined text-[18px]">arrow_outward</span>
                                    Lihat Drive
                                </a>
                            @elseif($displayType == 'video')
                                <a href="{{ $material->file_url }}" target="_blank" class="flex items-center gap-2 px-4 py-2.5 bg-[#e52129] text-white text-sm font-bold rounded-md hover:bg-red-700 transition-colors">
                                    <span class="material-symbols-outlined text-[18px]">play_arrow</span>
                                    Tonton Video
                                </a>
                            @else
                                <a href="{{ Storage::url($material->file_path) }}" download class="flex items-center gap-2 px-4 py-2.5 bg-[#e52129] text-white text-sm font-bold rounded-md hover:bg-red-700 transition-colors">
                                    <span class="material-symbols-outlined text-[18px]">download</span>
                                    Unduh File
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="py-20 text-center col-span-full">
                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-gray-300 text-4xl">folder_off</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada bahan ajar</h3>
                        <p class="text-gray-500">Silakan kembali lagi nanti atau periksa filter Anda.</p>
                    </div>
                @endforelse
                
                {{-- Empty State untuk filter (tersembunyi secara default) --}}
                <div id="emptyFilterState" class="hidden py-20 text-center col-span-full">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-symbols-outlined text-gray-300 text-4xl">search_off</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Bahan ajar tidak ditemukan</h3>
                    <p class="text-gray-500">Coba ubah kriteria pencarian atau filter Anda.</p>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const filterKelas = document.getElementById('filterKelas');
            const filterJenisMapel = document.getElementById('filterJenisMapel');
            const filterMapel = document.getElementById('filterMapel');
            const cards = document.querySelectorAll('.material-card');
            const emptyState = document.getElementById('emptyFilterState');
            
            // Simpan semua data dari kartu agar mudah difilter dan populating select mapel
            const materialsData = Array.from(cards).map(card => {
                return {
                    element: card,
                    title: card.getAttribute('data-title'),
                    grade: card.getAttribute('data-grade'),
                    category: card.getAttribute('data-category'),
                    subject: card.getAttribute('data-subject')
                };
            });

            // Fungsi untuk update dropdown mapel
            function updateMapelDropdown() {
                const selectedKelas = filterKelas.value;
                const selectedJenis = filterJenisMapel.value;
                
                // Simpan mapel yang sedang dipilih
                const currentMapel = filterMapel.value;

                // Reset dan disable filter mapel
                filterMapel.innerHTML = '<option value="">Pilih Mapel</option>';
                
                // Cari mapel apa saja yang unik berdasarkan kelas & jenis yang dipilih
                let validSubjects = new Set();
                
                materialsData.forEach(data => {
                    const matchKelas = selectedKelas === '' || data.grade === selectedKelas;
                    const matchJenis = selectedJenis === '' || data.category === selectedJenis;
                    
                    if (matchKelas && matchJenis) {
                        validSubjects.add(data.subject);
                    }
                });

                // Populate kembali dropdown mapel
                if (validSubjects.size > 0) {
                    Array.from(validSubjects).sort().forEach(subject => {
                        const option = document.createElement('option');
                        // Ubah jadi title case untuk display
                        option.value = subject;
                        option.textContent = subject.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
                        filterMapel.appendChild(option);
                    });
                    
                    filterMapel.disabled = false;
                    
                    // Kembalikan mapel yang dipilih jika masih ada di daftar opsi yang baru
                    if (validSubjects.has(currentMapel)) {
                        filterMapel.value = currentMapel;
                    }
                } else {
                    filterMapel.disabled = true;
                }
            }

            // Fungsi utama untuk filter card
            function filterCards() {
                const search = searchInput.value.toLowerCase();
                const kelas = filterKelas.value;
                const jenis = filterJenisMapel.value;
                const mapel = filterMapel.value.toLowerCase(); // huruf kecil di dataset

                let visibleCount = 0;

                materialsData.forEach(data => {
                    const matchSearch = data.title.includes(search) || data.subject.includes(search);
                    const matchKelas = kelas === '' || data.grade === kelas;
                    const matchJenis = jenis === '' || data.category === jenis;
                    const matchMapel = mapel === '' || data.subject === mapel;

                    if (matchSearch && matchKelas && matchJenis && matchMapel) {
                        data.element.style.display = 'flex';
                        visibleCount++;
                    } else {
                        data.element.style.display = 'none';
                    }
                });

                // Tampilkan pesan kosong jika tidak ada yg cocok
                if (visibleCount === 0 && materialsData.length > 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }
            }

            // Event Listeners
            searchInput.addEventListener('input', filterCards);
            
            filterKelas.addEventListener('change', () => {
                updateMapelDropdown();
                filterCards();
            });
            
            filterJenisMapel.addEventListener('change', () => {
                updateMapelDropdown();
                filterCards();
            });
            
            filterMapel.addEventListener('change', filterCards);

            // Inisialisasi mapel pertama kali
            updateMapelDropdown();
        });
    </script>
    @endpush
@endsection
