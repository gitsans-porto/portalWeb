@extends('layouts.app')

@section('title', $post->title . ' — Mading')
@section('meta_description', $post->short_excerpt)

@section('content')

{{-- ===== HEADER ===== --}}
<section style="background:#f8f9fc; padding: 48px 0 60px; border-bottom: 1px solid #e2e8f0; position: relative; overflow: hidden;">
    <div style="position:absolute; top:-20px; left:-20px; width:150px; height:150px; background:rgba(220,38,38,0.03); border-radius:50%; blur:60px;"></div>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('mading.index') }}"
           style="display:inline-flex;align-items:center;gap:8px;color:#64748b;
                  font-size:0.85rem;font-weight:700;text-decoration:none;margin-bottom:28px;
                  padding:8px 16px; background:white; border:1px solid #e2e8f0; border-radius:12px; transition:all 0.2s;"
           onmouseenter="this.style.borderColor='#dc2626';this.style.color='#dc2626';this.style.transform='translateX(-4px)';" 
           onmouseleave="this.style.borderColor='#e2e8f0';this.style.color='#64748b';this.style.transform='translateX(0)';">
            <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Mading
        </a>

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">
            <span style="display:inline-block;font-size:0.7rem;font-weight:800;letter-spacing:0.05em;
                         text-transform:uppercase;padding:5px 14px;border-radius:10px;
                         background:#fee2e2;color:#dc2626;">
                {{ $post->category_label }}
            </span>
            <span style="color:#cbd5e1; font-size:0.8rem;">&bull;</span>
            <time style="color:#94a3b8; font-size:0.85rem; font-weight:500;">
                {{ $post->published_at?->translatedFormat('d F Y') }}
            </time>
        </div>

        <h1 style="font-size:clamp(1.75rem,5vw,2.5rem);font-weight:900;color:#1e293b;
                   line-height:1.2;margin:0 0 24px; letter-spacing:-0.02em;">
            {{ $post->title }}
        </h1>

        <div style="display:flex;align-items:center;gap:12px; padding:12px; background:white; border:1px solid #f1f5f9; border-radius:16px; width:fit-content; box-shadow:0 4px 6px -1px rgba(0,0,0,0.02);">
            <div style="width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,#dc2626,#ef4444);
                        display:flex;align-items:center;justify-content:center;
                        font-size:0.9rem;font-weight:900;color:white;flex-shrink:0;">
                {{ strtoupper(substr($post->author_name, 0, 1)) }}
            </div>
            <div>
                <div style="font-weight:800;color:#334155;font-size:0.95rem; line-height:1.2;">{{ $post->author_name }}</div>
                <div style="color:#94a3b8;font-size:0.75rem; font-weight:500; margin-top:2px;">
                    {{ $post->author_class ?: 'Warga Sekolah' }}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== ARTICLE ===== --}}
<section style="background:white;padding:60px 0 80px;">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Featured image --}}
        @if($post->image)
            <div style="border-radius:32px; overflow:hidden; box-shadow:0 20px 50px rgba(0,0,0,0.1); margin-bottom:48px;">
                <img src="{{ asset('storage/' . $post->image) }}"
                     alt="{{ $post->title }}"
                     style="width:100%;max-height:500px;object-fit:cover;display:block;">
            </div>
        @endif

        {{-- Content --}}
        <div style="font-size:1.15rem;line-height:1.8;color:#334155;
                    font-family:'Inter',sans-serif;">
            {!! $post->content !!}
        </div>

        {{-- Social Interactions --}}
        <div style="margin-top:60px; padding:32px; background:#f8fafc; border-radius:24px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:20px;">
            <div style="display:flex; align-items:center; gap:20px;">
                <button style="display:flex; align-items:center; gap:8px; background:white; border:1px solid #e2e8f0; padding:10px 20px; border-radius:14px; color:#1e293b; font-weight:700; font-size:0.9rem; cursor:pointer; transition:all 0.2s;"
                        onmouseenter="this.style.borderColor='#f43f5e';this.style.color='#f43f5e';this.style.transform='scale(1.05)';"
                        onmouseleave="this.style.borderColor='#e2e8f0';this.style.color='#1e293b';this.style.transform='scale(1)';">
                    <svg style="width:20px;height:20px;color:#f43f5e;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Suka
                </button>
                <div style="display:flex; align-items:center; gap:6px; color:#94a3b8; font-size:0.9rem; font-weight:600;">
                    <svg style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    {{ rand(100, 500) }} Dilihat
                </div>
            </div>
            
            <div style="display:flex; gap:12px;">
                <button style="width:40px; height:40px; border-radius:12px; background:white; border:1px solid #e2e8f0; display:flex; align-items:center; justify-content:center; color:#64748b; transition:all 0.2s;" title="Bagikan"
                        onmouseenter="this.style.borderColor='#3b82f6';this.style.color='#3b82f6';" onmouseleave="this.style.borderColor='#e2e8f0';this.style.color='#64748b';">
                    <svg style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-2.684 3 3 0 000 2.684zm0 9a3 3 0 100-2.684 3 3 0 000 2.684z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</section>

@endsection


@endsection
