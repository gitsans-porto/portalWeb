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

        {{-- Filter Buttons (Segmented Control) --}}
        <div class="flex justify-center mb-10">
            <div class="relative bg-white shadow-md border border-gray-100 rounded-full p-1.5 inline-flex" id="filter-container">
                {{-- Sliding Highlight --}}
                <div id="filter-highlight" class="absolute top-1.5 bottom-1.5 bg-red-600 rounded-full transition-all duration-300 pointer-events-none"></div>
                
                <button class="filter-btn relative z-10 px-8 py-2.5 rounded-full font-bold text-sm text-white transition-colors" data-filter="10">
                    Kelas 10
                </button>
                <button class="filter-btn relative z-10 px-8 py-2.5 rounded-full font-bold text-sm text-gray-500 hover:text-gray-900 transition-colors" data-filter="11">
                    Kelas 11
                </button>
                <button class="filter-btn relative z-10 px-8 py-2.5 rounded-full font-bold text-sm text-gray-500 hover:text-gray-900 transition-colors" data-filter="12">
                    Kelas 12
                </button>
            </div>
        </div>

        {{-- Search & Filters Row --}}
        <div class="flex flex-col md:flex-row gap-4 mb-10">
            {{-- Search Bar --}}
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" id="searchInput" placeholder="search bar" class="w-full pl-12 pr-4 py-3.5 rounded-full border border-gray-200 bg-gray-400/20 focus:bg-white focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm font-bold text-gray-700 placeholder-gray-500">
            </div>

            {{-- Jurusan Dropdown --}}
            <div class="relative w-full md:w-48">
                <select class="w-full px-6 py-3.5 rounded-full border border-gray-200 bg-gray-400/20 focus:bg-white focus:border-red-500 outline-none transition-all text-sm font-bold text-gray-600 appearance-none cursor-pointer">
                    <option value="">Jurusan</option>
                    <option value="tkj">Teknik Komputer Jaringan</option>
                    <option value="rpl">Rekayasa Perangkat Lunak</option>
                    <option value="mm">Multimedia</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            {{-- Mapel Dropdown --}}
            <div class="relative w-full md:w-56">
                <select id="mapelDropdown" class="w-full px-6 py-3.5 rounded-full border border-gray-200 bg-gray-400/20 focus:bg-white focus:border-red-500 outline-none transition-all text-sm font-bold text-gray-600 appearance-none cursor-pointer">
                    <option value="">Mata Pelajaran</option>
                    <option value="umum">Umum</option>
                    <option value="kejuruan">Kejuruan</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="subjects-container">
            @foreach($subjects as $subject)
            <a href="{{ route('materials.show', $subject->slug) }}" class="subject-card flex flex-col bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 transition-all duration-300 overflow-hidden hover:shadow-2xl hover:-translate-y-1" data-category="{{ $subject->category }}">
                @if($subject->image)
                    <div class="h-40 w-full relative bg-gray-100">
                        <img src="{{ Storage::url($subject->image) }}" class="w-full h-full object-cover" alt="{{ $subject->name }}">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-black text-gray-900 mb-2">{{ $subject->name }}</h3>
                        <div class="flex items-center text-sm font-bold text-gray-400 gap-2">
                            <svg class="w-4 h-4 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Mata Pelajaran {{ ucfirst($subject->category) }}
                        </div>
                    </div>
                @else
                    <div class="p-8">
                        <div class="w-16 h-16 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-black text-gray-900 mb-2">{{ $subject->name }}</h3>
                        <div class="flex items-center text-sm font-bold text-gray-400 gap-2">
                            <svg class="w-4 h-4 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Mata Pelajaran {{ ucfirst($subject->category) }}
                        </div>
                    </div>
                @endif
            </a>
            @endforeach
        </div>

    </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const subjectCards = document.querySelectorAll('.subject-card');
            const highlight = document.getElementById('filter-highlight');
            const searchInput = document.getElementById('searchInput');
            const mapelDropdown = document.getElementById('mapelDropdown');
            
            let currentFilter = '10'; // kelas

            function updateHighlight(btn) {
                highlight.style.width = btn.offsetWidth + 'px';
                highlight.style.left = btn.offsetLeft + 'px';
            }

            function filterCards() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedMapel = mapelDropdown ? mapelDropdown.value : '';

                subjectCards.forEach(card => {
                    const matchesCategory = selectedMapel === '' || card.dataset.category === selectedMapel;
                    const subjectName = card.querySelector('h3').textContent.toLowerCase();
                    const matchesSearch = subjectName.includes(searchTerm);

                    if (matchesCategory && matchesSearch) {
                        card.style.display = 'block';
                        card.animate([{opacity: 0, transform: 'scale(0.95)'}, {opacity: 1, transform: 'scale(1)'}], {duration: 300, fill: 'forwards'});
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Inisialisasi posisi highlight dan filter data
            const initialBtn = document.querySelector('.filter-btn[data-filter="10"]');
            
            setTimeout(() => {
                if (initialBtn) updateHighlight(initialBtn);
                filterCards();
            }, 50);

            // Listener setiap kali window resize agar highlight tidak meleset
            window.addEventListener('resize', () => {
                const activeBtn = document.querySelector('.filter-btn.text-white');
                if(activeBtn) updateHighlight(activeBtn);
            });

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Update text color
                    filterBtns.forEach(b => {
                        b.classList.remove('text-white');
                        b.classList.add('text-gray-500');
                    });
                    btn.classList.remove('text-gray-500');
                    btn.classList.add('text-white');

                    // Geser highlight background
                    updateHighlight(btn);

                    // Filter item & Update current filter
                    currentFilter = btn.dataset.filter;
                    filterCards();
                });
            });

            // Listener untuk search input
            if (searchInput) {
                searchInput.addEventListener('input', () => {
                    filterCards();
                });
            }

            // Listener untuk dropdown mapel
            if (mapelDropdown) {
                mapelDropdown.addEventListener('change', () => {
                    filterCards();
                });
            }
        });
    </script>
    @endpush
@endsection
