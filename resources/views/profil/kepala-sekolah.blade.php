@extends('layouts.app')

@section('title', 'Kepala Sekolah')

@section('content')
    {{-- ======== HERO SECTION ======== --}}
    <section class="detail-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col items-center text-center">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white/10 text-white/90 text-xs font-bold tracking-wide mb-6 backdrop-blur-md border border-white/10">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Pimpinan Sekolah
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    {{ $profile->title }}
                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    {{ $profile->short_description }}
                </p>
            </div>
        </div>
        
        {{-- Decorative Elements --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-500/10 blur-[80px] rounded-full pointer-events-none"></div>
    </section>

    {{-- ======== CARD SECTION ======== --}}
    <div class="py-20 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-4">
            
            <div class="bg-white rounded-3xl shadow-[0_15px_60px_-15px_rgba(0,0,0,0.1)] overflow-hidden reveal">
                <div class="p-8 md:p-16 lg:p-20">
                    
                    {{-- Title --}}
                    <h1 class="text-2xl md:text-4xl font-black text-gray-800 text-center mb-12 lg:mb-20 uppercase tracking-tight">
                        Sambutan Kepala Sekolah SMKN 1 LIMBOTO
                    </h1>

                    <style>
                        .principal-container {
                            display: flex;
                            flex-direction: column;
                            gap: 3rem;
                        }
                        @media (min-width: 1024px) {
                            .principal-container {
                                flex-direction: row;
                                align-items: flex-start;
                                gap: 4rem;
                            }
                            .principal-content {
                                flex: 1;
                                order: 1;
                            }
                            .principal-photo-area {
                                width: 35%;
                                order: 2;
                            }
                        }
                    </style>

                    <div class="principal-container">
                        
                        {{-- Content --}}
                        <div class="principal-content">
                            <div class="text-gray-700 leading-relaxed text-base md:text-lg text-justify space-y-6">
                                {!! nl2br(e($profile->content)) !!}
                            </div>
                            
                            @if(!empty($profile->additional_data['phone']))
                                <div class="mt-12 text-2xl font-black text-gray-900 tracking-tight">
                                    {{ $profile->additional_data['phone'] }}
                                </div>
                            @endif
                        </div>

                        {{-- Photo --}}
                        <div class="principal-photo-area flex flex-col items-center">
                            <div class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-[12px] border-white shadow-xl mb-8 bg-gray-50 flex-shrink-0">
                                <img src="{{ $profile->image && Storage::disk('public')->exists($profile->image) ? asset('storage/' . $profile->image) : asset($profile->image) }}" alt="{{ $profile->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-base md:text-lg font-black text-gray-900 leading-tight uppercase">{{ $profile->title }}</h3>
                                <div class="w-12 h-0.5 bg-red-600 mx-auto my-3"></div>
                                <p class="text-[0.65rem] md:text-xs text-gray-400 font-bold uppercase tracking-widest">{{ $profile->short_description }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Back Button --}}
            <div class="mt-12 text-center">
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-red-600 rounded-2xl shadow-sm border border-red-100 font-bold hover:bg-red-50 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
@endsection
