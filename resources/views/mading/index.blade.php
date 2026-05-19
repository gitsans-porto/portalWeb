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
                    <h1 style="font-size:2.5rem;font-weight:900;color:#1e293b;line-height:1;margin:0;">Mading <span style="color:#dc2626;">Sekolah</span></h1>
                </div>
                <p style="color:#64748b;font-size:1rem;max-width:500px;line-height:1.6;margin:0;">
                    Ruang kreasi dan berbagi untuk cerpen, cerita organisasi, dan pengumuman.
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

{{-- ===== MAIN CONTENT & SIDEBAR ===== --}}
<section style="background:#f8f9fc;padding:40px 0 80px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div style="display:flex; flex-wrap:wrap; gap:30px;">
            
            {{-- Main Column (Posts List) --}}
            <div style="flex: 1 1 65%; min-width:320px;">
                @if($mading->count() > 0)
                    <div style="display:flex; flex-direction:column; gap:24px;">
                        @foreach($mading as $post)
                        <div style="background:white; border-radius:16px; overflow:hidden; border:1px solid #f1f5f9; box-shadow:0 4px 15px rgba(0,0,0,0.02); display:flex; flex-wrap:wrap;">
                            
                            {{-- Image Left --}}
                            <div style="flex: 0 0 250px; height:200px; position:relative;">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    <div style="width:100%; height:100%; background:linear-gradient(135deg,#dc2626,#f97316); display:flex; align-items:center; justify-content:center;">
                                        <svg style="width:40px;height:40px;color:rgba(255,255,255,0.3);" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                <div style="position:absolute; top:12px; left:12px;">
                                    <span style="background:rgba(255,255,255,0.9); padding:4px 10px; border-radius:8px; font-size:0.7rem; font-weight:800; color:#1e293b; text-transform:uppercase;">
                                        {{ $post->category_label }}
                                    </span>
                                </div>
                            </div>

                            {{-- Content Right --}}
                            <div style="flex: 1; padding:20px; display:flex; flex-direction:column; justify-content:space-between;">
                                <div>
                                    <h3 style="font-size:1.25rem; font-weight:800; color:#1e293b; margin:0 0 8px; line-height:1.3;">
                                        <a href="{{ route('mading.show', $post->slug) }}" style="text-decoration:none; color:inherit;">{{ $post->title }}</a>
                                    </h3>
                                    <div style="font-size:0.8rem; color:#64748b; margin-bottom:12px;">
                                        Oleh <span style="font-weight:700; color:#334155;">{{ $post->author_name }}</span> &bull; {{ $post->published_at?->format('d M Y') }}
                                    </div>
                                    <p style="font-size:0.9rem; color:#64748b; line-height:1.5; margin:0 0 16px; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                        {{ $post->short_excerpt }}
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('mading.show', $post->slug) }}" style="display:inline-block; padding:8px 20px; background:#f1f5f9; color:#1e293b; border-radius:8px; font-size:0.85rem; font-weight:700; text-decoration:none; transition:all 0.2s;"
                                       onmouseenter="this.style.background='#e2e8f0'" onmouseleave="this.style.background='#f1f5f9'">
                                        Lebih Lanjut
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    @if($mading->hasPages())
                        <div style="margin-top:40px; display:flex; justify-content:center;">
                            {{ $mading->links() }}
                        </div>
                    @endif

                @else
                    <div style="text-align:center;padding:80px 20px;background:white;border-radius:24px;border:2px dashed #e2e8f0;">
                        <h3 style="font-size:1.25rem;font-weight:800;color:#1e293b;margin:0 0 8px;">Mading masih kosong</h3>
                        <p style="font-size:0.95rem;color:#64748b;margin:0 auto 24px;">Jadilah yang pertama membagikan karya!</p>
                        <a href="{{ route('mading.create') }}" style="display:inline-flex;padding:12px 24px;background:#dc2626;color:white;border-radius:12px;font-weight:700;text-decoration:none;">Buat Postingan</a>
                    </div>
                @endif
            </div>

            {{-- Sidebar (Widgets) --}}
            <div style="flex: 1 1 30%; min-width:280px; display:flex; flex-direction:column; gap:24px;">
                
                {{-- Search Widget --}}
                <div style="background:white; padding:20px; border-radius:16px; border:1px solid #f1f5f9; box-shadow:0 4px 15px rgba(0,0,0,0.02);">
                    <h4 style="font-size:1rem; font-weight:800; color:#1e293b; margin:0 0 16px;">Cari Mading</h4>
                    <form action="" method="GET" style="display:flex;">
                        <input type="text" name="search" placeholder="Cari karya..." style="flex:1; padding:10px 16px; border:1px solid #e2e8f0; border-radius:8px 0 0 8px; font-size:0.9rem; outline:none;">
                        <button type="submit" style="padding:10px 16px; background:#3b82f6; color:white; border:none; border-radius:0 8px 8px 0; font-weight:700; cursor:pointer;">Cari</button>
                    </form>
                </div>

                {{-- Tabs Widget (Terpopuler / Baru) --}}
                <div style="background:white; border-radius:16px; border:1px solid #f1f5f9; box-shadow:0 4px 15px rgba(0,0,0,0.02); overflow:hidden;">
                    <div style="display:flex; border-bottom:1px solid #e2e8f0;">
                        <div id="tab-btn-populer" onclick="switchTab('populer')" style="flex:1; text-align:center; padding:12px; font-size:0.9rem; font-weight:800; color:#3b82f6; border-bottom:2px solid #3b82f6; cursor:pointer; transition:all 0.2s;">Terpopuler</div>
                        <div id="tab-btn-baru" onclick="switchTab('baru')" style="flex:1; text-align:center; padding:12px; font-size:0.9rem; font-weight:700; color:#64748b; cursor:pointer; transition:all 0.2s;">Baru Diupload</div>
                    </div>
                    <div style="padding:16px; display:flex; flex-direction:column; gap:16px; position:relative;">
                        
                        {{-- Popular List --}}
                        <div id="tab-content-populer" style="display:flex; flex-direction:column; gap:16px;">
                            @forelse($popularMading as $pop)
                                <a href="{{ route('mading.show', $pop->slug) }}" style="display:flex; gap:12px; text-decoration:none; align-items:center;">
                                    @if($pop->image)
                                        <img src="{{ asset('storage/' . $pop->image) }}" style="width:60px; height:60px; border-radius:8px; object-fit:cover; flex-shrink:0;">
                                    @else
                                        <div style="width:60px; height:60px; border-radius:8px; background:#e2e8f0; flex-shrink:0; display:flex; align-items:center; justify-content:center; font-size:0.7rem; color:#94a3b8;">No Img</div>
                                    @endif
                                    <div>
                                        <h5 style="font-size:0.9rem; font-weight:800; color:#1e293b; margin:0 0 4px; line-height:1.2; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ $pop->title }}</h5>
                                        <div style="font-size:0.75rem; color:#64748b;">{{ $pop->views }}x dilihat</div>
                                    </div>
                                </a>
                            @empty
                                <div style="text-align:center; color:#64748b; font-size:0.8rem;">Belum ada data.</div>
                            @endforelse
                        </div>

                        {{-- Recent List --}}
                        <div id="tab-content-baru" style="display:none; flex-direction:column; gap:16px;">
                            @forelse($recentMading as $baru)
                                <a href="{{ route('mading.show', $baru->slug) }}" style="display:flex; gap:12px; text-decoration:none; align-items:center;">
                                    @if($baru->image)
                                        <img src="{{ asset('storage/' . $baru->image) }}" style="width:60px; height:60px; border-radius:8px; object-fit:cover; flex-shrink:0;">
                                    @else
                                        <div style="width:60px; height:60px; border-radius:8px; background:#e2e8f0; flex-shrink:0; display:flex; align-items:center; justify-content:center; font-size:0.7rem; color:#94a3b8;">No Img</div>
                                    @endif
                                    <div>
                                        <h5 style="font-size:0.9rem; font-weight:800; color:#1e293b; margin:0 0 4px; line-height:1.2; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ $baru->title }}</h5>
                                        <div style="font-size:0.75rem; color:#64748b;">{{ $baru->published_at?->diffForHumans() }}</div>
                                    </div>
                                </a>
                            @empty
                                <div style="text-align:center; color:#64748b; font-size:0.8rem;">Belum ada data.</div>
                            @endforelse
                        </div>

                    </div>
                </div>

                <script>
                    function switchTab(tab) {
                        const btnPopuler = document.getElementById('tab-btn-populer');
                        const btnBaru = document.getElementById('tab-btn-baru');
                        const contentPopuler = document.getElementById('tab-content-populer');
                        const contentBaru = document.getElementById('tab-content-baru');

                        if (tab === 'populer') {
                            btnPopuler.style.color = '#3b82f6';
                            btnPopuler.style.borderBottom = '2px solid #3b82f6';
                            btnPopuler.style.fontWeight = '800';
                            
                            btnBaru.style.color = '#64748b';
                            btnBaru.style.borderBottom = 'none';
                            btnBaru.style.fontWeight = '700';

                            contentPopuler.style.display = 'flex';
                            contentBaru.style.display = 'none';
                        } else {
                            btnBaru.style.color = '#3b82f6';
                            btnBaru.style.borderBottom = '2px solid #3b82f6';
                            btnBaru.style.fontWeight = '800';
                            
                            btnPopuler.style.color = '#64748b';
                            btnPopuler.style.borderBottom = 'none';
                            btnPopuler.style.fontWeight = '700';

                            contentBaru.style.display = 'flex';
                            contentPopuler.style.display = 'none';
                        }
                    }
                </script>

                {{-- Academic Calendar Widget --}}
                <div style="background:white; padding:20px; border-radius:16px; border:1px solid #f1f5f9; box-shadow:0 4px 15px rgba(0,0,0,0.02);">
                    <h4 style="font-size:1rem; font-weight:800; color:#1e293b; margin:0 0 16px; display:flex; align-items:center; gap:8px;">
                        <svg style="width:18px;height:18px;color:#f59e0b;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Kalender Akademik
                    </h4>
                    <div style="display:grid; grid-template-columns:repeat(7, 1fr); gap:4px; text-align:center; font-size:0.8rem; font-weight:700; color:#64748b; margin-bottom:8px;">
                        <div style="color:#ef4444;">Su</div><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div>
                    </div>
                    <div style="display:grid; grid-template-columns:repeat(7, 1fr); gap:4px; text-align:center; font-size:0.85rem; color:#1e293b;">
                        @for($i=1; $i<=30; $i++)
                            <div style="padding:6px; {{ $i == 15 ? 'background:#3b82f6; color:white; border-radius:50%; font-weight:800;' : '' }}">{{ $i }}</div>
                        @endfor
                    </div>
                </div>

                {{-- Berita Sekolah Widget --}}
                <div style="background:white; padding:20px; border-radius:16px; border:1px solid #f1f5f9; box-shadow:0 4px 15px rgba(0,0,0,0.02);">
                    <h4 style="font-size:1rem; font-weight:800; color:#1e293b; margin:0 0 16px; display:flex; align-items:center; gap:8px;">
                        <svg style="width:18px;height:18px;color:#3b82f6;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3m0 0l3-3m-3 3V8"/></svg>
                        Berita Sekolah
                    </h4>
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        @forelse($recentNews as $news)
                            <a href="{{ route('berita.show', $news->slug) }}" style="display:block; padding:12px; background:#f8fafc; border-radius:12px; text-decoration:none; border:1px solid #e2e8f0; transition:all 0.2s;" onmouseenter="this.style.borderColor='#3b82f6'; this.style.background='#eff6ff';" onmouseleave="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc';">
                                <h5 style="font-size:0.85rem; font-weight:800; color:#1e293b; margin:0 0 4px; line-height:1.3; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ $news->title }}</h5>
                                <div style="font-size:0.7rem; color:#64748b;">{{ $news->published_at?->format('d M Y') }}</div>
                            </a>
                        @empty
                            <div style="text-align:center; padding:12px; color:#64748b; font-size:0.8rem;">Belum ada berita.</div>
                        @endforelse
                    </div>
                    <a href="{{ route('berita.index') }}" style="display:block; text-align:center; margin-top:16px; font-size:0.8rem; font-weight:700; color:#3b82f6; text-decoration:none;">Lihat Semua Berita &rarr;</a>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
