@extends('layouts.app')

@section('title', 'Pusat Pengaduan')

@section('content')

    {{-- ======== HERO ======== --}}
    <section class="detail-hero">
        <div class="detail-hero-bg" style="background-image: url('{{ asset('images/gambarSekolah.jpeg') }}')"></div>
        <div class="detail-hero-overlay"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/40 mb-8">
                <a href="{{ route('beranda') }}" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                <span class="text-white/70">Pusat Pengaduan</span>
            </nav>
            <div class="flex flex-col items-center text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    Pusat Pengaduan &amp; Aspirasi
                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    Sampaikan keluhan, saran, atau aspirasi Anda. Dapat dilakukan secara anonim. Jika menyertakan email, Anda akan mendapat notifikasi langsung saat ada pembaruan.
                </p>
            </div>
        </div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-red-500/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-orange-500/10 blur-[80px] rounded-full pointer-events-none"></div>
    </section>

    <div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">

            {{-- FORMULIR LAPORAN --}}
            <div class="bg-white rounded-[3rem] shadow-xl shadow-gray-200/50 border border-gray-100 p-8 sm:p-12 mb-10 reveal">
                <div class="flex items-center gap-5 mb-10">
                    <span class="w-14 h-14 bg-red-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-red-100">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </span>
                    <div>
                        <h2 class="text-3xl font-black text-gray-900 tracking-tight">Buat Laporan Baru</h2>
                        <p class="text-gray-400 text-sm">Isi detail laporan di bawah ini. Semua laporan akan ditindaklanjuti.</p>
                    </div>
                </div>

                <form id="complaint-form" class="space-y-8">
                    @csrf

                    {{-- Jenis Laporan --}}
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Pilih Klasifikasi Laporan</label>
                        <div class="flex flex-col sm:flex-row rounded-xl overflow-hidden border border-red-600 bg-white">
                            <label class="flex-1 cursor-pointer relative group">
                                <input type="radio" name="type" value="Pengaduan" class="btn-radio-input peer sr-only" required>
                                <div class="btn-radio-content px-5 py-4 font-black text-red-600 bg-white peer-checked:bg-red-600 peer-checked:text-white transition-colors border-b sm:border-b-0 sm:border-r border-red-600 flex items-center justify-center sm:justify-start gap-3">
                                    <svg class="radio-checked w-5 h-5 text-red-200" viewBox="0 0 24 24" fill="none" style="display:none;"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="5" fill="currentColor"/></svg>
                                    <svg class="radio-unchecked w-5 h-5 text-red-600" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/></svg>
                                    PENGADUAN
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer relative group">
                                <input type="radio" name="type" value="Aspirasi" class="btn-radio-input peer sr-only">
                                <div class="btn-radio-content px-5 py-4 font-black text-red-600 bg-white peer-checked:bg-red-600 peer-checked:text-white transition-colors border-b sm:border-b-0 sm:border-r border-red-600 flex items-center justify-center sm:justify-start gap-3">
                                    <svg class="radio-checked w-5 h-5 text-red-200" viewBox="0 0 24 24" fill="none" style="display:none;"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="5" fill="currentColor"/></svg>
                                    <svg class="radio-unchecked w-5 h-5 text-red-600" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/></svg>
                                    ASPIRASI
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer relative group">
                                <input type="radio" name="type" value="Lainnya" class="btn-radio-input peer sr-only">
                                <div class="btn-radio-content px-5 py-4 font-black text-red-600 bg-white peer-checked:bg-red-600 peer-checked:text-white transition-colors flex items-center justify-center sm:justify-start gap-3">
                                    <svg class="radio-checked w-5 h-5 text-red-200" viewBox="0 0 24 24" fill="none" style="display:none;"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="5" fill="currentColor"/></svg>
                                    <svg class="radio-unchecked w-5 h-5 text-red-600" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/></svg>
                                    LAINNYA
                                </div>
                            </label>
                        </div>
                    </div>

                    <style>
                        .btn-radio-input:checked + .btn-radio-content .radio-checked { display: block !important; }
                        .btn-radio-input:checked + .btn-radio-content .radio-unchecked { display: none !important; }
                    </style>

                    {{-- Nama & Role --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Nama Lengkap</label>
                            <input type="text" name="full_name" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-red-500 outline-none transition-all text-gray-700 font-medium" placeholder="Masukkan nama lengkap Anda">
                            <p class="text-xs text-gray-400 mt-2 pl-1">nama bisa dikosongkan dan laporan anda tetap dikirim secara anonim.</p>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Pilih Role</label>
                            <select name="role" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-red-500 outline-none transition-all text-gray-700 font-medium" required>
                                <option value="">Pilih Role...</option>
                                <option value="Siswa">Siswa</option>
                                <option value="Guru">Guru</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Masyarakat Umum">Umum</option>
                            </select>
                        </div>
                    </div>

                    {{-- Email (Opsional) --}}
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">
                            Email <span class="text-gray-300 font-normal normal-case tracking-normal ml-1">— Opsional, untuk menerima notifikasi pembaruan</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" class="w-full pl-14 pr-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-red-500 outline-none transition-all text-gray-700 font-medium" placeholder="contoh@gmail.com">
                        </div>
                        <p class="text-xs text-gray-400 mt-2 pl-1">
                            Jika diisi: Anda akan mendapat email konfirmasi saat laporan diterima, dan notifikasi saat admin mengubah status atau memberikan tanggapan.<br>
                            Jika dikosongkan: maka anda tidak akan dapat notifikasi feedback apapun dari admin
                        </p>
                    </div>

                    {{-- Topik & Layanan --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Topik Singkat</label>
                            <input type="text" name="category" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-red-500 outline-none transition-all text-gray-700 font-medium" placeholder="Contoh: AC Kelas Rusak, Login LMS" required>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Layanan Terkait <span class="text-gray-300 font-normal">(Opsional)</span></label>
                            <select name="service_id" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-red-500 outline-none transition-all text-gray-700 font-medium">
                                <option value="">Tidak ada / Lainnya</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Detail --}}
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Detail Laporan</label>
                        <textarea name="description" rows="5" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-red-500 outline-none transition-all text-gray-700 font-medium resize-none" placeholder="Jelaskan secara detail masalah atau aspirasi Anda..." required></textarea>
                    </div>

                    <button type="submit" class="w-full py-5 bg-red-600 text-white font-black rounded-2xl hover:bg-red-700 transition-all shadow-xl shadow-red-100 flex items-center justify-center gap-3 text-lg group">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Kirim Laporan Sekarang
                    </button>
                </form>
            </div>

        </div>
    </div>
    </div>

    {{-- ===== SUCCESS MODAL — dengan email ===== --}}
    <div id="success-modal-email" class="hidden fixed inset-0 z-[999] items-center justify-center p-4">
        <div class="absolute inset-0 bg-red-950/60 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-[3rem] max-w-md w-full p-10 text-center shadow-2xl">
            <div class="w-20 h-20 bg-green-100 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h3 class="text-3xl font-black text-gray-900 mb-3 tracking-tight">Laporan Terkirim!</h3>
            <p class="text-gray-500 mb-6 leading-relaxed">Laporan Anda berhasil diterima dan akan segera ditindaklanjuti.</p>

            <div class="bg-blue-50 rounded-2xl p-5 mb-6 flex items-start gap-3 text-left">
                <svg class="w-5 h-5 text-blue-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <div>
                    <p class="text-blue-900 font-bold text-sm">Cek Inbox Email Anda</p>
                    <p class="text-blue-600 text-xs mt-0.5">Email konfirmasi telah dikirim. Anda akan mendapat notifikasi lagi jika admin memberikan pembaruan atau tanggapan.</p>
                </div>
            </div>

            <button onclick="closeModal('success-modal-email')" class="w-full bg-gray-900 text-white font-black py-4 rounded-2xl hover:bg-black transition-all">
                Tutup
            </button>
        </div>
    </div>

    {{-- ===== SUCCESS MODAL — anonim (tanpa email) ===== --}}
    <div id="success-modal-anon" class="hidden fixed inset-0 z-[999] items-center justify-center p-4">
        <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-[3rem] max-w-md w-full p-10 text-center shadow-2xl">
            <div class="w-20 h-20 bg-green-100 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h3 class="text-3xl font-black text-gray-900 mb-3 tracking-tight">Laporan Terkirim!</h3>
            <p class="text-gray-500 mb-6 leading-relaxed">Laporan Anda berhasil dikirim secara anonim dan akan segera ditindaklanjuti oleh admin.</p>

            <div class="bg-gray-50 rounded-2xl p-5 mb-6 flex items-start gap-3 text-left border border-gray-100">
                <svg class="w-5 h-5 text-gray-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <p class="text-gray-700 font-bold text-sm">Laporan Anonim</p>
                    <p class="text-gray-400 text-xs mt-0.5">Karena tidak menyertakan email, Anda tidak akan mendapat notifikasi pembaruan. Laporan tetap tercatat dan akan diproses.</p>
                </div>
            </div>

            <button onclick="closeModal('success-modal-anon')" class="w-full bg-gray-900 text-white font-black py-4 rounded-2xl hover:bg-black transition-all">
                Tutup
            </button>
        </div>
    </div>

@push('scripts')
<script>
    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    const complaintForm = document.getElementById('complaint-form');
    const submitBtn = complaintForm.querySelector('button[type="submit"]');

    complaintForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const originalHTML = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> <span>Mengirim...</span>`;

        try {
            const response = await fetch('{{ route("report.store") }}', {
                method: 'POST',
                body: new FormData(complaintForm),
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const data = await response.json();

            if (data.success) {
                // Tampilkan modal yang sesuai
                const modalId = data.has_email ? 'success-modal-email' : 'success-modal-anon';
                const modal = document.getElementById(modalId);
                modal.classList.remove('hidden');
                modal.classList.add('flex');

                complaintForm.reset();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                alert(data.message || 'Terjadi kesalahan. Silakan coba lagi.');
            }
        } catch (error) {
            console.error(error);
            alert('Gagal terhubung ke server. Periksa koneksi internet Anda.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
        }
    });
</script>
@endpush

@endsection
