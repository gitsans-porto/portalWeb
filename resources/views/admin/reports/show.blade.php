@extends('layouts.admin')

@section('title', 'Detail Laporan')

@section('content')
    <div class="reveal">
        {{-- Header --}}
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <a href="{{ route('admin.reports.index') }}" class="p-2 rounded-xl bg-gray-100 text-gray-500 hover:bg-gray-200 transition-all">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    </a>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">Detail Laporan</h1>
                </div>
                <p class="text-gray-500 text-sm">Tinjau dan berikan tanggapan atas laporan berikut.</p>
            </div>
            {{-- Status Badge --}}
            @if($report->status === 'pending')
                <span class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-100 text-amber-700 rounded-2xl text-sm font-black uppercase tracking-widest">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span> Menunggu
                </span>
            @elseif($report->status === 'in_progress')
                <span class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-100 text-blue-700 rounded-2xl text-sm font-black uppercase tracking-widest">
                    <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span> Diproses
                </span>
            @else
                <span class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-100 text-emerald-700 rounded-2xl text-sm font-black uppercase tracking-widest">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Selesai
                </span>
            @endif
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 px-6 py-4 bg-green-50 border border-green-200 rounded-2xl text-green-800 font-medium text-sm">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- ===== Kolom Utama (2/3) ===== --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Isi Laporan --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 sm:p-10">
                    <div class="flex flex-wrap items-center gap-3 mb-6">
                        <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full bg-indigo-50 text-indigo-600">{{ $report->type }}</span>
                        <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full bg-red-50 text-red-600">{{ $report->category }}</span>
                        @if($report->service)
                            <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full bg-gray-100 text-gray-500">{{ $report->service->name }}</span>
                        @endif
                    </div>
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-3">Isi Laporan</h4>
                    <div class="bg-gray-50 rounded-2xl p-6 text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $report->description }}</div>
                </div>

                {{-- Informasi Pelapor --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 sm:p-10">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6">Informasi Pelapor</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Nama Lengkap</div>
                            <div class="font-bold text-gray-900 text-lg">{{ $report->full_name ?: 'Anonymous' }}</div>
                        </div>
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Peran</div>
                            <div class="font-bold text-gray-900 text-lg">{{ $report->role }}</div>
                        </div>
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Email Pelapor</div>
                            @if($report->email)
                                @php
                                    $displayEmail = $report->email;
                                    $isAnon = empty($report->full_name);
                                    if ($isAnon) {
                                        $parts = explode('@', $report->email);
                                        $displayEmail = count($parts) == 2 ? '********@' . $parts[1] : '********';
                                    }
                                @endphp
                                @if($isAnon)
                                    <span class="font-bold text-gray-600">{{ $displayEmail }}</span>
                                    <span class="ml-2 text-[10px] px-2 py-0.5 bg-gray-100 text-gray-500 rounded-full font-bold">Anonim</span>
                                @else
                                    <a href="mailto:{{ $report->email }}" class="font-bold text-blue-600 hover:underline">{{ $report->email }}</a>
                                @endif
                                <span class="ml-2 text-[10px] px-2 py-0.5 bg-green-100 text-green-600 rounded-full font-bold">✉ Notifikasi Aktif</span>
                            @else
                                <span class="text-gray-400 italic text-sm">Tidak disertakan</span>
                                <span class="ml-2 text-[10px] px-2 py-0.5 bg-gray-100 text-gray-400 rounded-full font-bold">Anonim</span>
                            @endif
                        </div>
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Tanggal Laporan</div>
                            <div class="font-bold text-gray-900">{{ $report->created_at->format('d F Y, H:i') }}</div>
                        </div>
                    </div>
                </div>

                {{-- ===== FORM GABUNGAN: Status + Tanggapan ===== --}}
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 sm:p-10">
                    <h4 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-2">Tindak Lanjut Laporan</h4>
                    <p class="text-gray-400 text-sm mb-6">Ubah status dan/atau tulis tanggapan, lalu klik simpan. Notifikasi email otomatis dikirim ke pelapor jika ada email.</p>

                    @if(!$report->email)
                        <div class="mb-6 flex items-start gap-3 px-5 py-4 bg-amber-50 rounded-2xl border border-amber-100 text-sm text-amber-700">
                            <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            <span>Laporan ini <strong>anonim</strong> — tidak ada email yang disertakan. Tanggapan tetap tersimpan, tapi notifikasi tidak akan terkirim.</span>
                        </div>
                    @endif

                    <form action="{{ route('admin.reports.updateFeedback', $report->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        {{-- Pilih Status --}}
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3">Status Laporan</label>
                            <div class="grid grid-cols-3 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="pending" {{ $report->status == 'pending' ? 'checked' : '' }} class="sr-only peer" required>
                                    <div class="px-4 py-3 rounded-2xl border-2 text-center font-bold text-sm transition-all peer-checked:border-amber-400 peer-checked:bg-amber-50 peer-checked:text-amber-700 border-gray-100 text-gray-400 hover:border-amber-200 cursor-pointer">
                                        🟡 Tertunda
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="in_progress" {{ $report->status == 'in_progress' ? 'checked' : '' }} class="sr-only peer">
                                    <div class="px-4 py-3 rounded-2xl border-2 text-center font-bold text-sm transition-all peer-checked:border-blue-400 peer-checked:bg-blue-50 peer-checked:text-blue-700 border-gray-100 text-gray-400 hover:border-blue-200 cursor-pointer">
                                        🔵 Diproses
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="resolved" {{ $report->status == 'resolved' ? 'checked' : '' }} class="sr-only peer">
                                    <div class="px-4 py-3 rounded-2xl border-2 text-center font-bold text-sm transition-all peer-checked:border-emerald-400 peer-checked:bg-emerald-50 peer-checked:text-emerald-700 border-gray-100 text-gray-400 hover:border-emerald-200 cursor-pointer">
                                        ✅ Selesai
                                    </div>
                                </label>
                            </div>
                        </div>

                        {{-- Tanggapan Admin (opsional) --}}
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">
                                Tanggapan / Catatan
                                <span class="text-gray-300 font-normal normal-case tracking-normal ml-1">— Opsional</span>
                            </label>
                            <textarea name="admin_feedback" rows="4"
                                class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none text-gray-700 transition-all"
                                placeholder="Tuliskan solusi, progres, atau catatan untuk pelapor...">{{ $report->admin_feedback }}</textarea>
                            <p class="text-xs text-gray-400 mt-2">Jika diisi, pelapor akan mendapat email berisi tanggapan ini. Jika dikosongkan, hanya notifikasi perubahan status yang dikirim.</p>
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                            class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Perubahan
                            @if($report->email)
                                <span class="text-indigo-200 text-xs font-normal">+ Kirim Notifikasi Email</span>
                            @endif
                        </button>
                    </form>

                    @if($report->handled_at)
                        <div class="mt-4 flex items-center gap-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Terakhir diperbarui: {{ $report->handled_at->format('d M Y, H:i') }}
                        </div>
                    @endif
                </div>

            </div>

            {{-- ===== Sidebar Kanan (1/3) ===== --}}
            <div class="space-y-6">

                {{-- Tanggapan Sebelumnya (jika ada) --}}
                @if($report->admin_feedback)
                    <div class="bg-indigo-50 rounded-[2rem] border border-indigo-100 p-6">
                        <h4 class="text-xs font-black uppercase tracking-widest text-indigo-400 mb-3">Tanggapan Sebelumnya</h4>
                        <p class="text-indigo-900 text-sm leading-relaxed">{{ $report->admin_feedback }}</p>
                        @if($report->handled_at)
                            <p class="text-indigo-400 text-xs mt-3">{{ $report->handled_at->format('d M Y, H:i') }}</p>
                        @endif
                    </div>
                @endif

                {{-- Info Notifikasi --}}
                <div class="bg-{{ $report->email ? 'blue' : 'gray' }}-50 border border-{{ $report->email ? 'blue' : 'gray' }}-100 rounded-[2rem] p-6 text-center">
                    @if($report->email)
                        <svg class="w-8 h-8 text-blue-500 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <p class="text-blue-800 text-sm font-bold mb-1">Notifikasi Email Aktif</p>
                        <p class="text-blue-500 text-xs break-all">{{ $report->email }}</p>
                        <p class="text-blue-400 text-xs mt-2">Pelapor akan menerima email saat ada perubahan status atau tanggapan baru.</p>
                    @else
                        <svg class="w-8 h-8 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                        <p class="text-gray-600 text-sm font-bold mb-1">Laporan Anonim</p>
                        <p class="text-gray-400 text-xs">Pelapor tidak menyertakan email. Tanggapan tetap tersimpan tapi tidak ada notifikasi yang dikirim.</p>
                    @endif
                </div>

                {{-- Info Waktu --}}
                <div class="bg-white rounded-[2rem] border border-gray-100 p-6 space-y-3">
                    <div>
                        <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Dikirim</div>
                        <div class="font-bold text-gray-900 text-sm">{{ $report->created_at->format('d M Y, H:i') }}</div>
                    </div>
                    @if($report->handled_at)
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">Diperbarui</div>
                            <div class="font-bold text-gray-900 text-sm">{{ $report->handled_at->format('d M Y, H:i') }}</div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
