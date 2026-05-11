@extends('layouts.app')

@section('title', 'Mading Digital')
@section('meta_description', 'Majalah Dinding Digital SMKN 1 Limboto — karya siswa, cerpen, tips, pengumuman, dan kegiatan sekolah.')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section style="background: linear-gradient(135deg, #f8f9fc 0%, #eff6ff 100%); padding: 60px 0 40px; position: relative; overflow: hidden; border-bottom: 1px solid #e2e8f0;">
    <div style="position:absolute; top:-100px; right:-100px; width:400px; height:400px; background:rgba(220,38,38,0.03); border-radius:50%; blur:100px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="position:relative;z-index:1;">
        <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:20px;">
            <div>
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:8px;">
                    <span style="background:#fee2e2; color:#dc2626; padding:4px 12px; border-radius:99px; font-size:0.7rem; font-weight:800; text-transform:uppercase; letter-spacing:0.05em;">Community</span>
                    <h1 style="font-size:2.5rem;font-weight:900;color:#1e293b;line-height:1;margin:0;">Mading <span style="color:#dc2626;">Digital</span></h1>
                </div>
                <p style="color:#64748b;font-size:1rem;max-width:500px;line-height:1.6;margin:0;">
                    Ruang kreasi dan berbagi untuk seluruh warga SMKN 1 Limboto.
                </p>
            </div>
            <a href="{{ route('mading.create') }}"
               style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;border-radius:16px;background:#dc2626;color:white;font-weight:800;font-size:0.95rem;text-decoration:none;box-shadow:0 10px 25px -5px rgba(220,38,38,0.4);transition:all 0.3s;"
               onmouseenter="this.style.transform='translateY(-2px)';this.style.boxShadow='0 15px 30px -5px rgba(220,38,38,0.5)'"
               onmouseleave="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 25px -5px rgba(220,38,38,0.4)'">
                <svg style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Buat Postingan
            </a>
        </div>

        {{-- Category Pills --}}
        <div style="display:flex; gap:10px; margin-top:40px; overflow-x:auto; padding-bottom:10px; scrollbar-width: none;">
            <a href="#" style="white-space:nowrap; padding:8px 20px; border-radius:99px; background:#1e293b; color:white; font-size:0.85rem; font-weight:700; text-decoration:none; transition:all 0.2s;">Semua</a>
            @foreach(App\Models\Mading::categoryLabels() as $key => $label)
                <a href="#" style="white-space:nowrap; padding:8px 20px; border-radius:99px; background:white; color:#64748b; border:1px solid #e2e8f0; font-size:0.85rem; font-weight:600; text-decoration:none; transition:all 0.2s;"
                   onmouseenter="this.style.borderColor='#dc2626';this.style.color='#dc2626'"
                   onmouseleave="this.style.borderColor='#e2e8f0';this.style.color='#64748b'">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== SUCCESS MESSAGE ===== --}}
@if(session('success'))
<div style="background:#f0fdf4;border-bottom:1px solid #bbf7d0;padding:16px 0;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div style="display:flex;align-items:center;gap:12px;">
            <div style="width:24px;height:24px;border-radius:50%;background:#22c55e;color:white;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p style="color:#166534;font-size:0.9rem;font-weight:600;margin:0;">{{ session('success') }}</p>
        </div>
    </div>
</div>
@endif

{{-- ===== POSTS ===== --}}
<section style="background:#f8f9fc;padding:40px 0 80px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($mading->count() > 0)

            {{-- Grid --}}
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:30px;">
                @foreach($mading as $post)
                <div style="position:relative; group">
                    <a href="{{ route('mading.show', $post->slug) }}"
                       style="display:block;background:white;border-radius:24px;overflow:hidden;text-decoration:none;color:inherit;
                              box-shadow:0 4px 20px rgba(0,0,0,0.03);border:1px solid #f1f5f9;
                              transition:all 0.3s ease;"
                       onmouseenter="this.style.transform='translateY(-8px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.08)';this.style.borderColor='#e2e8f0'"
                       onmouseleave="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.03)';this.style.borderColor='#f1f5f9'">

                        {{-- Image Container --}}
                        <div style="position:relative; width:100%; height:220px; overflow:hidden;">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     alt="{{ $post->title }}"
                                     style="width:100%;height:100%;object-fit:cover;display:block;transition:transform 0.5s ease;"
                                     onmouseenter="this.style.transform='scale(1.05)'"
                                     onmouseleave="this.style.transform='scale(1)'">
                            @else
                                <div style="width:100%;height:100%;background:linear-gradient(135deg,#dc2626,#f97316);display:flex;align-items:center;justify-content:center;">
                                    <svg style="width:48px;height:48px;color:rgba(255,255,255,0.3);" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            
                            {{-- Badge --}}
                            <div style="position:absolute; top:16px; left:16px; z-index:2;">
                                <span style="background:rgba(255,255,255,0.95); backdrop-filter:blur(4px); color:#1e293b; padding:5px 12px; border-radius:10px; font-size:0.65rem; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                                    {{ $post->category_label }}
                                </span>
                            </div>

                            @if($post->is_pinned)
                            <div style="position:absolute; top:16px; right:16px; z-index:2;">
                                <div style="background:#fbbf24; color:#92400e; width:32px; height:32px; border-radius:50%; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                                    <svg style="width:16px;height:16px;" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05l-3.293 3.293a1 1 0 01-1.414 0l-3.293-3.293a1 1 0 01-.285-1.05l1.738-5.42-1.233-.616a1 1 0 01.894-1.79l1.599.8L9 4.323V3a1 1 0 011-1z" />
                                    </svg>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div style="padding:24px;">
                            {{-- Title --}}
                            <h3 style="font-size:1.15rem;font-weight:800;color:#1e293b;line-height:1.3;margin:0 0 10px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;height:3rem;">
                                {{ $post->title }}
                            </h3>

                            {{-- Snippet --}}
                            <p style="font-size:0.9rem;color:#64748b;line-height:1.5;margin:0 0 20px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                {{ $post->short_excerpt }}
                            </p>

                            {{-- Social Interactions (Simulated) --}}
                            <div style="display:flex; align-items:center; gap:16px; margin-bottom:20px; color:#94a3b8;">
                                <div style="display:flex; align-items:center; gap:5px; font-size:0.8rem; font-weight:600;">
                                    <svg style="width:18px;height:18px;color:#f43f5e;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    {{ rand(5, 50) }}
                                </div>
                                <div style="display:flex; align-items:center; gap:5px; font-size:0.8rem; font-weight:600;">
                                    <svg style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    {{ rand(1, 10) }}
                                </div>
                            </div>

                            {{-- Footer --}}
                            <div style="display:flex;align-items:center;justify-content:space-between;padding-top:16px;border-top:1px solid #f1f5f9;">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div style="width:32px;height:32px;border-radius:10px;background:linear-gradient(135deg,#dc2626,#ef4444);
                                                display:flex;align-items:center;justify-content:center;
                                                font-size:0.8rem;font-weight:900;color:white;">
                                        {{ strtoupper(substr($post->author_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-size:0.8rem;font-weight:700;color:#334155;">{{ $post->author_name }}</div>
                                        <div style="font-size:0.7rem;color:#94a3b8;">{{ $post->published_at?->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($mading->hasPages())
                <div style="margin-top:60px;display:flex;justify-content:center;">
                    {{ $mading->links() }}
                </div>
            @endif

        @else
            <div style="text-align:center;padding:100px 20px;background:white;border-radius:32px;border:2px dashed #e2e8f0;">
                <div style="width:80px;height:80px;background:#f8fafc;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
                    <svg style="width:40px;height:40px;color:#cbd5e1;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 style="font-size:1.25rem;font-weight:800;color:#1e293b;margin:0 0 8px;">Mading masih kosong</h3>
                <p style="font-size:0.95rem;color:#64748b;max-width:320px;margin:0 auto 24px;">Jadilah yang pertama untuk membagikan sesuatu yang menarik di sini!</p>
                <a href="{{ route('mading.create') }}" style="display:inline-flex;padding:12px 24px;background:#dc2626;color:white;border-radius:12px;font-weight:700;text-decoration:none;font-size:0.9rem;">Buat Postingan Pertama</a>
            </div>
        @endif

    </div>
</section>

@endsection
