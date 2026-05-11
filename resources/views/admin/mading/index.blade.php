@extends('layouts.admin')

@section('title', 'Manajemen Mading')

@section('content')
    <div class="reveal">
        {{-- Header --}}
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Kelola Mading</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola seluruh postingan Majalah Dinding Digital sekolah.</p>
            </div>
            <a href="{{ route('admin.mading.create') }}"
               class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-purple-600 text-white font-bold hover:bg-purple-700 transition-all shadow-lg shadow-purple-200">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Postingan Baru
            </a>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400">Postingan</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400">Kategori</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400">Penulis</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400 text-center">Status</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($mading as $post)
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                {{-- Title + image --}}
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-10 rounded-xl overflow-hidden flex-shrink-0
                                            @switch($post->color_accent)
                                                @case('red')    bg-red-100 @break
                                                @case('blue')   bg-blue-100 @break
                                                @case('green')  bg-green-100 @break
                                                @case('yellow') bg-yellow-100 @break
                                                @case('purple') bg-purple-100 @break
                                                @case('orange') bg-orange-100 @break
                                                @case('pink')   bg-pink-100 @break
                                                @case('teal')   bg-teal-100 @break
                                                @default        bg-gray-100
                                            @endswitch">
                                            @if($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900 group-hover:text-purple-600 transition-colors text-sm">
                                                {{ Str::limit($post->title, 50) }}
                                            </div>
                                            @if($post->is_pinned)
                                                <span class="text-[0.6rem] font-black uppercase tracking-widest text-yellow-600 bg-yellow-50 px-2 py-0.5 rounded-full">📌 Pinned</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                {{-- Category --}}
                                <td class="px-8 py-5">
                                    <span class="text-[10px] font-black uppercase tracking-widest px-2 py-1 rounded-md
                                        @switch($post->category)
                                            @case('pengumuman')    bg-red-50 text-red-600 @break
                                            @case('karya-siswa')   bg-blue-50 text-blue-600 @break
                                            @case('cerpen')        bg-purple-50 text-purple-600 @break
                                            @case('tips')          bg-green-50 text-green-600 @break
                                            @case('foto-kegiatan') bg-orange-50 text-orange-600 @break
                                            @default               bg-gray-50 text-gray-500
                                        @endswitch">
                                        {{ $post->category_label }}
                                    </span>
                                </td>
                                {{-- Author --}}
                                <td class="px-8 py-5">
                                    <div class="text-sm font-semibold text-gray-700">{{ $post->author_name }}</div>
                                    @if($post->author_class)
                                        <div class="text-xs text-gray-400">{{ $post->author_class }}</div>
                                    @endif
                                </td>
                                {{-- Status --}}
                                <td class="px-8 py-5 text-center">
                                    @if($post->published_at && $post->published_at <= now())
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-[0.65rem] font-black uppercase tracking-widest">
                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                            Live
                                        </span>
                                        <div class="text-[10px] text-gray-400 mt-1">{{ $post->published_at->format('d M Y') }}</div>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-orange-50 text-orange-600 text-[0.65rem] font-black uppercase tracking-widest">
                                            <span class="w-1.5 h-1.5 bg-orange-500 rounded-full"></span>
                                            Pending
                                        </span>
                                        <div class="text-[10px] text-gray-400 mt-1">Butuh Review</div>
                                    @endif
                                </td>
                                {{-- Actions --}}
                                <td class="px-8 py-5">
                                    <div class="flex items-center justify-end gap-2">
                                        @if(!$post->published_at)
                                            <form action="{{ route('admin.mading.approve', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-600 hover:bg-emerald-100 font-bold text-xs transition-all mr-2" title="Setujui & Terbitkan">
                                                    Setujui
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('mading.show', $post->slug) }}" target="_blank"
                                           class="p-2 rounded-xl bg-gray-50 text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition-all" title="Lihat">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.mading.edit', $post->id) }}"
                                           class="p-2 rounded-xl bg-gray-50 text-gray-400 hover:bg-purple-50 hover:text-purple-600 transition-all" title="Edit">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.mading.destroy', $post->id) }}" method="POST"
                                              onsubmit="return confirm('Hapus postingan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-xl bg-gray-50 text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-200 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p class="text-gray-400 font-bold">Belum ada postingan mading.</p>
                                        <a href="{{ route('admin.mading.create') }}" class="text-purple-600 text-sm font-black uppercase tracking-widest mt-4 hover:underline">Buat Sekarang</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($mading->hasPages())
                <div class="px-8 py-6 border-t border-gray-50">
                    {{ $mading->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
