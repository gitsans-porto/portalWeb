@extends('layouts.admin')

@section('title', 'Detail Laporan Masalah')

@section('content')
    <div class="reveal">
        {{-- Header Area --}}
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <a href="{{ route('admin.reports.index') }}" class="p-2 rounded-xl bg-gray-100 text-gray-500 hover:bg-gray-200 transition-all">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">Detail Laporan</h1>
                </div>
                <p class="text-gray-500 text-sm">Informasi lengkap mengenai kendala yang dilaporkan oleh pengguna.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- Detail Card --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 sm:p-10">
                    <div class="flex flex-wrap items-center gap-3 mb-8">
                        <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full bg-red-50 text-red-600">
                            {{ $report->category }}
                        </span>
                        <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                            ID Laporan: #{{ str_pad($report->id, 5, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>

                    <h2 class="text-2xl font-black text-gray-900 mb-6 leading-tight">
                        Kendala pada: {{ $report->service ? $report->service->name : 'Umum / Lainnya' }}
                    </h2>

                    <div class="prose prose-slate max-w-none">
                        <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-4">Deskripsi Kendala</h4>
                        <div class="bg-gray-50 rounded-2xl p-6 text-gray-700 leading-relaxed whitespace-pre-wrap">
                            {{ $report->description }}
                        </div>
                    </div>
                </div>

                {{-- Submitter Info --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 sm:p-10">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6">Informasi Pelapor</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Nama Lengkap</div>
                            <div class="font-bold text-gray-900 text-lg">{{ $report->full_name }}</div>
                        </div>
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Peran / Jabatan</div>
                            <div class="font-bold text-gray-900 text-lg">{{ $report->role }}</div>
                        </div>
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Kelas / NIP</div>
                            <div class="font-bold text-gray-900 text-lg">{{ $report->class_nip ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Waktu Laporan</div>
                            <div class="font-bold text-gray-900 text-lg">{{ $report->created_at->format('d F Y, H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar Status --}}
            <div class="space-y-8">
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6 text-center">Status Laporan</h4>
                    
                    <form action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="space-y-3 mb-8">
                            <label class="block relative cursor-pointer">
                                <input type="radio" name="status" value="pending" class="sr-only peer" {{ $report->status == 'pending' ? 'checked' : '' }}>
                                <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border-2 border-gray-50 bg-gray-50 peer-checked:border-amber-500 peer-checked:bg-amber-50 transition-all">
                                    <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                    <span class="text-sm font-bold text-gray-600 peer-checked:text-amber-700">Tertunda</span>
                                </div>
                            </label>

                            <label class="block relative cursor-pointer">
                                <input type="radio" name="status" value="in_progress" class="sr-only peer" {{ $report->status == 'in_progress' ? 'checked' : '' }}>
                                <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border-2 border-gray-50 bg-gray-50 peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all">
                                    <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                    <span class="text-sm font-bold text-gray-600 peer-checked:text-blue-700">Sedang Diproses</span>
                                </div>
                            </label>

                            <label class="block relative cursor-pointer">
                                <input type="radio" name="status" value="resolved" class="sr-only peer" {{ $report->status == 'resolved' ? 'checked' : '' }}>
                                <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border-2 border-gray-50 bg-gray-50 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 transition-all">
                                    <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                    <span class="text-sm font-bold text-gray-600 peer-checked:text-emerald-700">Selesai</span>
                                </div>
                            </label>
                        </div>

                        <button type="submit" class="w-full py-4 bg-gray-900 text-white font-bold rounded-2xl hover:bg-gray-800 transition-all shadow-lg">
                            Perbarui Status
                        </button>
                    </form>
                </div>

                {{-- Action Card --}}
                <div class="bg-red-600 rounded-[2.5rem] shadow-lg shadow-red-200 p-8 text-white">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-white/50 mb-4 text-center">Bantuan Cepat</h4>
                    <p class="text-sm text-white/90 text-center leading-relaxed mb-6">
                        Jika kendala bersifat mendesak, segera hubungi tim IT sekolah melalui saluran koordinasi utama.
                    </p>
                    <div class="flex flex-col gap-2">
                        <button class="w-full py-3 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-xs font-bold transition-all">
                            Kontak Tim IT
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
