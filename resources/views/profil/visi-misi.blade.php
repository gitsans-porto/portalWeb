@extends('layouts.app')

@section('title', 'Visi & Misi')

@section('content')
    {{-- ======== HERO SECTION ======== --}}
    <section class="detail-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col items-center text-center">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white/10 text-white/90 text-xs font-bold tracking-wide mb-6 backdrop-blur-md border border-white/10">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                    </svg>
                    Tujuan & Arah
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
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-amber-500/10 blur-[80px] rounded-full pointer-events-none"></div>
    </section>

    {{-- ======== MAIN CONTENT ======== --}}
    <section class="py-16 bg-gray-50/50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/40 p-8 md:p-16 reveal border border-gray-100">
                
                {{-- Visi Section --}}
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-8 tracking-tight">Visi</h2>
                    <div class="max-w-3xl mx-auto">
                        <p class="text-xl md:text-2xl text-gray-700 font-medium italic leading-relaxed">
                            "{{ $profile->additional_data['vision'] ?? '' }}"
                        </p>
                    </div>
                </div>

                {{-- Misi Section --}}
                <div class="max-w-3xl mx-auto pt-12 border-t border-gray-100">
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 text-center mb-12 tracking-tight">Misi</h2>
                    <div class="text-gray-600">
                        @if(!empty($profile->additional_data['missions']))
                            <div class="space-y-8">
                                @foreach($profile->additional_data['missions'] as $index => $mission)
                                    <div class="flex gap-5">
                                        <span class="text-xl font-black text-gray-900 shrink-0">{{ $index + 1 }}.</span>
                                        <div class="space-y-1">
                                            <h4 class="text-xl font-bold text-gray-900 leading-tight">{{ $mission['title'] }}</h4>
                                            @if(!empty($mission['description']))
                                                <p class="text-gray-600 leading-relaxed">{{ $mission['description'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center text-gray-400 italic font-medium">Data misi belum diisi.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
