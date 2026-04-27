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
                        <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full bg-indigo-50 text-indigo-600">
                            {{ $report->type }}
                        </span>
                        <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full bg-red-50 text-red-600">
                            {{ $report->category }}
                        </span>
                        <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                            Tracking ID: {{ $report->tracking_code }}
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
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Waktu Laporan</div>
                            <div class="font-bold text-gray-900 text-lg">{{ $report->created_at->format('d F Y, H:i') }}</div>
                        </div>
                    </div>
                </div>

                {{-- Feedback Section --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 sm:p-10">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6">Feedback & Penyelesaian</h4>
                    
                    <form action="{{ route('admin.reports.updateFeedback', $report->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-6">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Pesan Tanggapan (Terlihat oleh Pelapor)</label>
                            <textarea name="admin_feedback" rows="4" class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none text-gray-700 transition-all" placeholder="Tuliskan solusi atau progres pengerjaan..." required>{{ $report->admin_feedback }}</textarea>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <div class="w-full sm:w-auto">
                                <select name="status" class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-none font-bold text-gray-700 outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Masih Pending</option>
                                    <option value="in_progress" {{ $report->status == 'in_progress' ? 'selected' : '' }}>Sedang Diproses</option>
                                    <option value="resolved" {{ $report->status == 'resolved' ? 'selected' : '' }}>Selesaikan Laporan</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full sm:flex-1 py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Kirim Feedback
                            </button>
                        </div>
                    </form>
                    
                    @if($report->handled_at)
                    <div class="mt-6 flex items-center gap-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Terakhir diupdate: {{ $report->handled_at->format('d M Y, H:i') }}
                    </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar Status --}}
            <div class="space-y-8">
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6 text-center">Status Saat Ini</h4>
                    
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border-2 {{ $report->status == 'pending' ? 'border-amber-500 bg-amber-50' : 'border-gray-50 bg-gray-50 opacity-50' }} transition-all">
                            <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                            <span class="text-sm font-bold {{ $report->status == 'pending' ? 'text-amber-700' : 'text-gray-400' }}">Tertunda</span>
                        </div>

                        <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border-2 {{ $report->status == 'in_progress' ? 'border-blue-500 bg-blue-50' : 'border-gray-50 bg-gray-50 opacity-50' }} transition-all">
                            <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                            <span class="text-sm font-bold {{ $report->status == 'in_progress' ? 'text-blue-700' : 'text-gray-400' }}">Sedang Diproses</span>
                        </div>

                        <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border-2 {{ $report->status == 'resolved' ? 'border-emerald-500 bg-emerald-50' : 'border-gray-50 bg-gray-50 opacity-50' }} transition-all">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            <span class="text-sm font-bold {{ $report->status == 'resolved' ? 'text-emerald-700' : 'text-gray-400' }}">Selesai</span>
                        </div>
                    </div>

                    <p class="mt-6 text-[10px] text-center text-gray-400 font-medium leading-relaxed italic">
                        Ubah status melalui panel <br> <strong>Feedback & Penyelesaian</strong>
                    </p>
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
