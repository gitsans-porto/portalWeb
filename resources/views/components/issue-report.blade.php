@php
    $services = \App\Models\Service::select('id', 'name')->get();
@endphp

{{-- Floating Button --}}
<button id="issue-report-btn" class="fixed bottom-6 right-6 w-14 h-14 bg-[#FE0002] text-white rounded-full shadow-lg hover:bg-[#CC0001] transition-all duration-300 z-[999] flex items-center justify-center group" title="Laporkan Masalah">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
    </svg>
</button>

{{-- Modal Overlay --}}
<div id="issue-report-overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[1000] hidden flex items-center justify-center p-4 transition-opacity duration-300 opacity-0">
    {{-- Modal Content --}}
    <div id="issue-report-modal" class="bg-white w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300">
        {{-- Header --}}
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-red-50 text-[#FE0002] rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-lg">Pusat Bantuan & Layanan IT</h3>
            </div>
            <button id="issue-report-close" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Form Body --}}
        <div class="p-6 max-h-[70vh] overflow-y-auto">
            <div class="mb-6 text-center">
                <h4 class="text-[#FE0002] font-bold border-b-2 border-[#FE0002] inline-block pb-2 px-4 mb-4">Lapor Kendala</h4>
                <p class="text-gray-500 text-sm italic">Sistem bermasalah? Laporkan kendala teknis Anda di sini.</p>
            </div>

            <form id="issue-report-form" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Nama Lengkap --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                        <input type="text" name="full_name" required class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-red-100 focus:border-[#FE0002] outline-none transition-all" placeholder="Budi Santoso">
                    </div>
                    {{-- Peran --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Peran</label>
                        <select name="role" required class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-red-100 focus:border-[#FE0002] outline-none transition-all">
                            <option value="">Pilih...</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Guru">Guru</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Staff">Staff</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Kelas/NIP --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Kelas/NIP (Opsional)</label>
                        <input type="text" name="class_nip" class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-red-100 focus:border-[#FE0002] outline-none transition-all" placeholder="Contoh: XII TKJ 1">
                    </div>
                    {{-- Layanan Bermasalah --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Layanan Bermasalah</label>
                        <select name="service_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-red-100 focus:border-[#FE0002] outline-none transition-all">
                            <option value="">Pilih Layanan...</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Kategori Kendala --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Kategori Kendala</label>
                    <select name="category" required class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-red-100 focus:border-[#FE0002] outline-none transition-all">
                        <option value="">Pilih...</option>
                        <option value="Teknis">Masalah Teknis</option>
                        <option value="Akses">Masalah Akses/Login</option>
                        <option value="Konten">Kesalahan Konten</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                {{-- Deskripsi Kendala --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Deskripsi Kendala</label>
                    <textarea name="description" required rows="4" class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-red-100 focus:border-[#FE0002] outline-none transition-all resize-none" placeholder="Jelaskan detail kendala..."></textarea>
                </div>

                {{-- Submit Button --}}
                <button type="submit" id="issue-report-submit" class="w-full py-4 bg-[#FE0002] text-white font-bold rounded-2xl hover:bg-[#CC0001] transition-all shadow-lg hover:shadow-red-200 disabled:opacity-50 disabled:cursor-not-allowed">
                    Kirim Laporan
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('issue-report-btn');
    const overlay = document.getElementById('issue-report-overlay');
    const modal = document.getElementById('issue-report-modal');
    const closeBtn = document.getElementById('issue-report-close');
    const form = document.getElementById('issue-report-form');
    const submitBtn = document.getElementById('issue-report-submit');

    // Toggle Modal
    function openModal() {
        overlay.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.add('opacity-100');
            modal.classList.add('scale-100');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        overlay.classList.remove('opacity-100');
        modal.classList.remove('scale-100');
        setTimeout(() => {
            overlay.classList.add('hidden');
        }, 300);
        document.body.style.overflow = '';
    }

    btn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) closeModal();
    });

    // Handle Form Submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Mengirim...';

        const formData = new FormData(form);

        try {
            const response = await fetch('{{ route('report.store') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const result = await response.json();

            if (response.ok) {
                // Success
                form.reset();
                submitBtn.innerHTML = 'Berhasil Terkirim!';
                submitBtn.classList.remove('bg-[#FE0002]');
                submitBtn.classList.add('bg-green-600');
                
                setTimeout(() => {
                    closeModal();
                    // Reset button state after closing
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Kirim Laporan';
                        submitBtn.classList.add('bg-[#FE0002]');
                        submitBtn.classList.remove('bg-green-600');
                    }, 500);
                }, 1500);
            } else {
                // Validation or other errors
                alert(result.message || 'Terjadi kesalahan saat mengirim laporan.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Kirim Laporan';
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan jaringan.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Kirim Laporan';
        }
    });
});
</script>
