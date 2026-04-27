@extends('layouts.app')

@section('title', 'Pusat Pengaduan')

@section('content')

    {{-- ======== DETAIL HERO ======== --}}
    <section class="detail-hero">
        {{-- Photo background + dark overlay --}}
        <div class="detail-hero-bg" style="background-image: url('{{ asset('images/gambarSekolah.jpeg') }}')"></div>
        <div class="detail-hero-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center justify-center gap-2 text-sm text-white/40 mb-8">
                <a href="{{ route('beranda') }}" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white/70">Pusat Pengaduan</span>
            </nav>

            <div class="flex flex-col items-center text-center">
                <p class="text-white/40 text-xs sm:text-sm font-bold uppercase tracking-[0.2em] mb-4">Suara Anda Adalah Perubahan</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    Pusat Pengaduan & Aspirasi
                </h1>
                <p class="text-lg text-white/70 max-w-2xl leading-relaxed">
                    Sampaikan keluhan, saran, atau aspirasi Anda demi kemajuan layanan SMKN 1 Limboto. 
                    Kami menjamin setiap laporan akan ditindaklanjuti secara profesional.
                </p>
            </div>
        </div>

        {{-- Decorative Circles --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-500/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500/10 blur-[80px] rounded-full pointer-events-none"></div>
    </section>

    <div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="max-w-4xl mx-auto">
            
            {{-- 1. FORMULIR LAPORAN (ATAS) --}}
            <div class="bg-white rounded-[3rem] shadow-xl shadow-gray-200/50 border border-gray-100 p-8 sm:p-12 mb-12 reveal">
                <div class="flex items-center gap-5 mb-10">
                    <span class="w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-indigo-100">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </span>
                    <div>
                        <h2 class="text-3xl font-black text-gray-900 tracking-tight">Buat Laporan Baru</h2>
                        <p class="text-gray-400 text-sm">Isi detail laporan Anda di bawah ini.</p>
                    </div>
                </div>

                <form id="complaint-form" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Nama Lengkap</label>
                            <input type="text" name="full_name" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-gray-700 font-medium" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Pilih Role</label>
                            <select name="role" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-gray-700 font-medium" required>
                                <option value="">Pilih Role...</option>
                                <option value="Siswa">Siswa</option>
                                <option value="Guru">Guru</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Masyarakat Umum">Umum</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Kategori Pengaduan</label>
                            <select name="type" id="type-select" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-gray-700 font-medium" required>
                                <option value="general">Aspirasi Umum / Saran</option>
                                <option value="service">Layanan Sekolah (E-Raport, LMS, dll)</option>
                                <option value="facility">Fasilitas & Infrastruktur</option>
                                <option value="academic">Kegiatan Akademik</option>
                            </select>
                        </div>
                        <div id="service-field" class="hidden">
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Layanan Terkait</label>
                            <select name="service_id" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-gray-700 font-medium">
                                <option value="">Pilih Layanan...</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Topik Singkat</label>
                        <input type="text" name="category" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-gray-700 font-medium" placeholder="Contoh: AC Kelas Rusak, Masalah Login LMS" required>
                    </div>

                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Detail Laporan</label>
                        <textarea name="description" rows="5" class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-gray-700 font-medium resize-none" placeholder="Jelaskan secara detail masalah atau aspirasi Anda..." required></textarea>
                    </div>

                    <button type="submit" class="w-full py-5 bg-indigo-600 text-white font-black rounded-2xl hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-100 flex items-center justify-center gap-3 text-lg group">
                        Kirim Laporan Sekarang
                        <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg>
                    </button>
                </form>
            </div>

            {{-- 2. PENGECEKAN STATUS (BAWAH) --}}
            <div class="space-y-8 reveal">
                <div class="bg-indigo-900 rounded-[3rem] p-10 sm:p-14 shadow-2xl shadow-indigo-200 text-white relative overflow-hidden">
                    {{-- Decorative Background --}}
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-20 -mt-20 blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-5 mb-8">
                            <span class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center text-white text-2xl backdrop-blur-md">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                            <div>
                                <h2 class="text-3xl font-black tracking-tight">Lacak Laporan Anda</h2>
                                <p class="text-indigo-200 text-sm">Masukkan kode tiket untuk melihat progres pengerjaan.</p>
                            </div>
                        </div>

                        <form id="track-form" class="flex flex-col sm:flex-row gap-4">
                            @csrf
                            <input type="text" name="tracking_code" class="flex-grow px-8 py-5 rounded-2xl bg-white/10 border-2 border-white/10 focus:border-white/30 outline-none text-xl font-black tracking-widest placeholder:text-white/30 placeholder:font-normal placeholder:tracking-normal transition-all" placeholder="Masukkan Kode Tiket (Contoh: TKT-XXXXXX)" required>
                            <button type="submit" class="px-10 py-5 bg-white text-indigo-900 font-black rounded-2xl hover:bg-indigo-50 transition-all shadow-xl text-lg shrink-0">
                                Cek Status
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Hasil Lacak (Full Width) --}}
                <div id="track-result" class="hidden reveal">
                    <div id="result-content" class="bg-white rounded-[3rem] p-10 sm:p-14 shadow-xl border border-gray-100">
                        {{-- Konten akan diisi via JS --}}
                    </div>
                </div>

                {{-- Alert Penting --}}
                <div class="bg-amber-50 border-2 border-amber-100 rounded-[2.5rem] p-8 sm:p-10">
                    <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start text-center sm:text-left">
                        <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center shrink-0">
                            <svg class="w-8 h-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-black text-amber-900 mb-2">Informasi Penting</h4>
                            <p class="text-amber-800 leading-relaxed text-lg">
                                Simpan kode tiket Anda dengan baik. Tanpa kode tersebut, Anda tidak dapat melihat balasan dari Admin karena sistem ini bersifat anonim dan tidak memerlukan akun.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- Success Modal --}}
    <div id="success-modal" class="hidden fixed inset-0 z-[999] items-center justify-center p-4">
        <div class="absolute inset-0 bg-indigo-950/60 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-[3rem] max-w-md w-full p-10 text-center shadow-2xl transition-all duration-300">
            <div class="w-20 h-20 bg-green-100 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-3xl font-black text-gray-900 mb-2 tracking-tight">Laporan Terkirim!</h3>
            <p class="text-gray-500 mb-8 leading-relaxed">Harap simpan kode tiket berikut untuk melacak laporan Anda:</p>
            
            <div class="bg-gray-50 rounded-[2rem] p-8 mb-8 border-2 border-dashed border-gray-200 group relative">
                <span id="display-tracking-code" class="text-4xl font-black text-indigo-700 tracking-widest font-mono"></span>
                <button onclick="copyTrackingCode()" class="block mx-auto mt-4 text-sm text-indigo-600 font-black hover:text-indigo-800 transition-all flex items-center justify-center gap-2 w-full py-2 bg-indigo-50 rounded-xl">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>Salin Kode</span>
                </button>
            </div>

            <button onclick="closeSuccessModal()" class="w-full bg-gray-900 text-white font-black py-5 rounded-2xl hover:bg-black transition-all shadow-xl shadow-gray-200 text-lg">
                Mengerti & Tutup
            </button>
        </div>
    </div>

    {{-- Modal Konfirmasi Penutupan (Kustom) --}}
    <div id="confirm-modal" class="hidden fixed inset-0 z-[1000] items-center justify-center p-4">
        <div class="absolute inset-0 bg-indigo-950/80 backdrop-blur-md"></div>
        <div class="relative bg-white rounded-[2.5rem] max-w-sm w-full p-10 text-center shadow-2xl">
            <div class="w-20 h-20 bg-amber-100 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-2xl font-black text-gray-900 mb-4">Sudah Simpan Kode?</h3>
            <p class="text-gray-500 mb-8 text-sm leading-relaxed text-center mx-auto">
                Tanpa kode ini, Anda tidak akan bisa melihat balasan dari Admin. Pastikan Anda sudah mencatat atau menyalinnya.
            </p>
            <div class="flex flex-col gap-3">
                <button onclick="finalClose()" class="w-full bg-indigo-600 text-white font-black py-4 rounded-2xl hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200">
                    Ya, Sudah Simpan
                </button>
                <button onclick="cancelClose()" class="w-full bg-gray-100 text-gray-500 font-bold py-4 rounded-2xl hover:bg-gray-200 transition-all">
                    Belum, Kembali
                </button>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    function closeSuccessModal() {
        const modal = document.getElementById('confirm-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function cancelClose() {
        const modal = document.getElementById('confirm-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function finalClose() {
        document.getElementById('confirm-modal').classList.add('hidden');
        document.getElementById('confirm-modal').classList.remove('flex');
        const successModal = document.getElementById('success-modal');
        successModal.classList.add('hidden');
        successModal.classList.remove('flex');
    }
    function copyTrackingCode() {
        const code = document.getElementById('display-tracking-code').innerText;
        const copyBtn = document.querySelector('button[onclick="copyTrackingCode()"]');
        
        navigator.clipboard.writeText(code).then(() => {
            const originalContent = copyBtn.innerHTML;
            copyBtn.innerHTML = `
                <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-green-600 font-black">Tersalin!</span>
            `;
            copyBtn.classList.add('bg-green-50');
            
            setTimeout(() => {
                copyBtn.innerHTML = originalContent;
                copyBtn.classList.remove('bg-green-50');
            }, 2000);
        });
    }

    const typeSelect = document.getElementById('type-select');
    const serviceField = document.getElementById('service-field');

    if(typeSelect) {
        typeSelect.addEventListener('change', function() {
            if (this.value === 'service') {
                serviceField.classList.remove('hidden');
            } else {
                serviceField.classList.add('hidden');
            }
        });
    }

    // Handle Form Submit
    const complaintForm = document.getElementById('complaint-form');
    const submitBtn = complaintForm.querySelector('button[type="submit"]');

    complaintForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Loading State
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> <span>Mengirim Laporan...</span>`;

        const formData = new FormData(complaintForm);
        
        try {
            const response = await fetch('{{ route("report.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                document.getElementById('display-tracking-code').innerText = data.tracking_code;
                const successModal = document.getElementById('success-modal');
                successModal.classList.remove('hidden');
                successModal.classList.add('flex');
                
                // Reset Form
                complaintForm.reset();
                serviceField.classList.add('hidden');
                
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                alert(data.message || 'Terjadi kesalahan saat mengirim laporan.');
            }
        } catch (error) {
            console.error(error);
            alert('Gagal terhubung ke server. Silakan periksa koneksi internet Anda.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });


    // Handle Track Status
    const trackForm = document.getElementById('track-form');
    const trackResult = document.getElementById('track-result');
    const resultContent = document.getElementById('result-content');

    trackForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(trackForm);
        
        resultContent.innerHTML = '<div class="flex justify-center py-12"><div class="animate-spin rounded-full h-12 w-12 border-t-4 border-indigo-600"></div></div>';
        trackResult.classList.remove('hidden');

        try {
            const response = await fetch('{{ route("pengaduan.track") }}', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            
            const data = await response.json();
            
            if (data.success) {
                const r = data.report;
                let statusBadge = '';
                if(r.status === 'pending') statusBadge = '<span class="px-4 py-2 bg-amber-100 text-amber-700 rounded-2xl text-xs font-black uppercase tracking-widest">Tertunda</span>';
                else if(r.status === 'in_progress') statusBadge = '<span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-2xl text-xs font-black uppercase tracking-widest">Diproses</span>';
                else statusBadge = '<span class="px-4 py-2 bg-green-100 text-green-700 rounded-2xl text-xs font-black uppercase tracking-widest">Selesai</span>';

                resultContent.innerHTML = `
                    <div class="mb-10 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <h2 class="text-3xl font-black text-gray-900 tracking-tight">Detail Aduan</h2>
                        ${statusBadge}
                    </div>
                    
                    <div class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <span class="text-gray-400 block text-[10px] uppercase font-black tracking-widest mb-2">Kategori</span>
                                <span class="text-gray-900 font-bold text-lg leading-tight">${r.type.toUpperCase()} - ${r.category}</span>
                            </div>
                            <div>
                                <span class="text-gray-400 block text-[10px] uppercase font-black tracking-widest mb-2">Waktu Laporan</span>
                                <span class="text-gray-900 font-bold text-lg leading-tight">${r.created_at}</span>
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-400 block text-[10px] uppercase font-black tracking-widest mb-2">Isi Laporan</span>
                            <div class="bg-gray-50 rounded-[2rem] p-8 text-gray-600 leading-relaxed italic border border-gray-100 text-lg">
                                "${r.description}"
                            </div>
                        </div>

                        ${r.admin_feedback ? `
                        <div class="mt-10 pt-10 border-t border-gray-100">
                            <span class="text-indigo-600 block text-[10px] uppercase font-black tracking-widest mb-4">Tanggapan Admin</span>
                            <div class="bg-indigo-50 rounded-[2.5rem] p-8 sm:p-10 text-indigo-900 border border-indigo-100 shadow-inner">
                                <p class="text-xl font-medium leading-relaxed mb-6">${r.admin_feedback}</p>
                                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/50 rounded-full text-[10px] text-indigo-400 font-bold uppercase tracking-wider">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    Dibalas pada: ${r.handled_at}
                                </div>
                            </div>
                        </div>
                        ` : `
                        <div class="mt-10 pt-10 border-t border-gray-100 text-center">
                            <div class="inline-flex items-center gap-3 px-8 py-4 bg-gray-50 rounded-full text-gray-400 italic font-medium">
                                <svg class="w-5 h-5 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Belum ada tanggapan dari admin. Harap cek kembali secara berkala.
                            </div>
                        </div>
                        `}
                    </div>
                `;
            } else {
                resultContent.innerHTML = `
                    <div class="py-12 text-center">
                        <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h4 class="text-xl font-black text-red-900 mb-2">Kode Tidak Ditemukan</h4>
                        <p class="text-red-600 font-medium">${data.message}</p>
                    </div>
                `;
            }
        } catch (error) {
            resultContent.innerHTML = `<div class="py-12 text-center text-red-500 font-black text-lg">Gagal menghubungkan ke server.</div>`;
        }
    });
</script>
@endpush
@endsection
