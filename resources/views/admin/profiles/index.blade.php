@extends('layouts.admin')

@section('title', 'Kelola Profil Sekolah')

@section('content')
    <div class="reveal">
        <div class="mb-10">
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Manajemen Konten Profil</h1>
            <p class="text-gray-500 mt-2">Daftar bagian profil sekolah yang dapat dikelola secara dinamis.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($profiles as $profile)
                <div class="admin-card group hover:shadow-2xl transition-all duration-500 border-t-4 {{ $profile->section === 'tentang_sekolah' ? 'border-red-600' : ($profile->section === 'visi_misi' ? 'border-emerald-600' : 'border-amber-600') }}">
                    <div class="flex flex-col h-full">
                        <div class="mb-6">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 {{ $profile->section === 'tentang_sekolah' ? 'bg-red-50 text-red-600' : ($profile->section === 'visi_misi' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600') }}">
                                @if($profile->section === 'tentang_sekolah')
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                @elseif($profile->section === 'visi_misi')
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                @else
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-xl font-black text-gray-900 mb-2">{{ $profile->title }}</h3>
                            <p class="text-sm text-gray-400 leading-relaxed line-clamp-3">
                                {{ Str::limit($profile->short_description, 100) }}
                            </p>
                        </div>

                        <div class="mt-auto pt-8 border-t border-gray-50 flex items-center justify-between">
                            <span class="text-[0.65rem] font-black uppercase tracking-widest text-gray-300">Update: {{ $profile->updated_at->diffForHumans() }}</span>
                            <a href="{{ route('admin.profiles.edit', $profile->section) }}" class="admin-btn admin-btn-primary scale-90 origin-right">
                                Kelola
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
