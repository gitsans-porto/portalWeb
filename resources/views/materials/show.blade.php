@extends('layouts.app')

@section('title', 'Materi ' . $subject->name)

@section('content')
    {{-- ======== DETAIL HERO ======== --}}
    <section class="detail-hero">
        <div class="detail-hero-bg" style="background-image: url('{{ $subject->image ? Storage::url($subject->image) : asset('images/gambarSekolah.jpeg') }}')"></div>
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
                <span class="text-white/70">{{ $subject->name }}</span>
            </nav>

            <div class="flex flex-col items-center text-center">
                <span class="px-4 py-1.5 rounded-full bg-red-600 text-white text-xs font-black uppercase tracking-widest mb-6">
                    Mata Pelajaran {{ ucfirst($subject->category) }}
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    {{ $subject->name }}
                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    Unduh berbagai modul, materi presentasi, dan bahan ajar lainnya untuk mendukung kegiatan belajar mandiri Anda.
                </p>
            </div>
        </div>
    </section>

    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header Navigation & Search --}}
            <div class="flex flex-col gap-6 mb-10">
                <a href="{{ route('materials.index') }}" class="inline-flex items-center text-gray-500 hover:text-red-600 font-bold transition-colors group self-start">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Daftar Pelajaran
                </a>

                <div class="relative w-full">
                    <input type="text" id="materialSearch" placeholder="Cari materi..." class="w-full pl-14 pr-6 py-4 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-red-50 focus:border-red-500 outline-none transition-all shadow-sm font-medium text-gray-600 text-lg">
                    <svg class="w-6 h-6 text-gray-400 absolute left-5 top-1/2 transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            {{-- Materials Card --}}
            <div class="bg-white rounded-[32px] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
                <div class="divide-y divide-gray-100" id="materialsList">
                    @forelse($materials as $material)
                        <div class="material-item p-6 md:p-8 flex flex-col md:flex-row md:items-center gap-6 hover:bg-gray-50/50 transition-colors" data-title="{{ strtolower($material->title) }}">
                            {{-- Icon --}}
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center border border-red-100 shadow-sm relative group">
                                    <svg class="w-8 h-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    <div class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 bg-red-600 text-[8px] font-black text-white px-2 py-0.5 rounded-full uppercase">{{ $material->file_type }}</div>
                                </div>
                            </div>

                            {{-- Info --}}
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xl font-black text-gray-900 mb-1 truncate">{{ $material->title }}</h3>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-1">Materi pembelajaran {{ $subject->name }} untuk menunjang kegiatan belajar siswa SMKN 1 Limboto.</p>
                                
                                <div class="flex flex-wrap items-center gap-4">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-500 text-[10px] font-black uppercase tracking-wider rounded-lg">Kelas {{ $material->grade }}</span>
                                    <div class="flex items-center text-gray-400 text-[10px] font-bold">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        @if(Storage::disk('public')->exists($material->file_path))
                                            {{ number_format(Storage::disk('public')->size($material->file_path) / 1048576, 2) }} MB
                                        @else
                                            0.00 MB
                                        @endif
                                    </div>
                                    <div class="flex items-center text-gray-400 text-[10px] font-bold">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $material->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>

                            {{-- Action --}}
                            <div class="flex-shrink-0">
                                <a href="{{ Storage::url($material->file_path) }}" download class="flex items-center justify-center gap-2 px-8 py-3.5 bg-red-600 text-white font-black text-sm rounded-xl hover:bg-red-700 transition-all shadow-lg shadow-red-200 active:scale-95 min-w-[200px]">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download {{ strtoupper($material->file_type) }}
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="py-20 text-center">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada materi</h3>
                            <p class="text-gray-500">Silakan kembali lagi nanti.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('materialSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const items = document.querySelectorAll('.material-item');
            
            items.forEach(item => {
                const title = item.getAttribute('data-title');
                if (title.includes(searchTerm)) {
                    item.classList.remove('hidden');
                    item.classList.add('flex');
                } else {
                    item.classList.remove('flex');
                    item.classList.add('hidden');
                }
            });
        });
    </script>
    @endpush
@endsection
