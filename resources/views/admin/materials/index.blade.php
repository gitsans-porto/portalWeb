@extends('layouts.admin')

@section('title', 'Manajemen Materi Pembelajaran')

@section('content')
<div class="card-twit">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-black text-gray-900">Materi Pembelajaran</h2>
            <p class="text-gray-500 mt-1">Upload dan kelola file/link materi untuk setiap mata pelajaran.</p>
        </div>
        
        <button onclick="document.getElementById('uploadMaterialModal').classList.remove('hidden')" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors shadow-lg shadow-red-200 whitespace-nowrap">
            + Tambah Materi
        </button>
    </div>

    <!-- Toolbar: Search & Filters -->
    <div class="flex flex-col md:flex-row gap-3 mb-6 relative">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" id="searchInput" onkeyup="applyFilters()" placeholder="Cari judul materi..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium">
        </div>
        
        <div>
            <button type="button" onclick="document.getElementById('filterPanel').classList.toggle('hidden')" class="px-4 py-3 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                Filter
            </button>
        </div>
    </div>

    <!-- Filter Panel -->
    <div id="filterPanel" class="hidden mb-6 p-5 bg-gray-50 border border-gray-100 rounded-2xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Filter Jurusan -->
            <div>
                <label class="block text-xs font-bold text-gray-500 mb-1">Pilih Jurusan</label>
                <input type="text" id="filterJurusan" onchange="updateMapelOptions(); applyFilters()" placeholder="Pilih Jurusan" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm" list="listJurusanFilter">
                <datalist id="listJurusanFilter">
                    @foreach($majors as $major)
                        <option value="{{ $major->name }}"></option>
                    @endforeach
                </datalist>
            </div>
            <!-- Filter Tingkat -->
            <div>
                <label class="block text-xs font-bold text-gray-500 mb-1">Pilih Tingkat</label>
                <select id="filterTingkat" onchange="updateMapelOptions(); applyFilters()" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm">
                    <option value="">Semua Tingkat</option>
                    <option value="10">Kelas 10</option>
                    <option value="11">Kelas 11</option>
                    <option value="12">Kelas 12</option>
                </select>
            </div>
            <!-- Filter Jenis Mapel -->
            <div>
                <label class="block text-xs font-bold text-gray-500 mb-1">Pilih Jenis Mapel</label>
                <select id="filterJenis" onchange="updateMapelOptions(); applyFilters()" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm">
                    <option value="">Semua Jenis</option>
                    <option value="umum">Umum</option>
                    <option value="kejuruan">Kejuruan</option>
                    <option value="pilihan">Pilihan</option>
                </select>
            </div>
            <!-- Filter Mapel -->
            <div>
                <label class="block text-xs font-bold text-gray-500 mb-1">Pilih Mapel</label>
                <input type="text" id="filterMapel" onchange="applyFilters()" placeholder="Pilih Mapel" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm bg-gray-100" disabled list="listMapelFilter">
                <datalist id="listMapelFilter">
                    <!-- Terisi dinamis via JS -->
                </datalist>
            </div>
            <!-- Filter Tipe -->
            <div>
                <label class="block text-xs font-bold text-gray-500 mb-1">Pilih Tipe</label>
                <select id="filterTipe" onchange="applyFilters()" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm">
                    <option value="">Semua Tipe</option>
                    <option value="pdf">PDF</option>
                    <option value="ppt">PPT/PPTX</option>
                    <option value="link">Link</option>
                </select>
            </div>
            <!-- Filter Status -->
            <div>
                <label class="block text-xs font-bold text-gray-500 mb-1">Pilih Status</label>
                <select id="filterStatus" onchange="applyFilters()" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm">
                    <option value="">Semua Status</option>
                    <option value="published">Dipublikasikan</option>
                    <option value="draft">Draf</option>
                </select>
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="button" onclick="resetFilters()" class="text-sm font-bold text-red-500 hover:text-red-700">Reset Filter</button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse" id="materialsTable">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Judul Materi</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Mata Pelajaran</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Tipe</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($materials as $material)
                <tr class="hover:bg-gray-50 transition-colors material-row" 
                    data-title="{{ strtolower($material->title) }}"
                    data-mapel="{{ strtolower($material->subject->name) }}"
                    data-jurusan="{{ strtolower($material->major ?? '') }}"
                    data-tingkat="{{ $material->grade }}"
                    data-jenis="{{ strtolower($material->subject->category) }}"
                    data-tipe="{{ in_array($material->file_type, ['pdf', 'link']) ? $material->file_type : 'ppt' }}"
                    data-status="{{ $material->status }}">
                    <td class="py-4 px-6">
                        <p class="font-bold text-gray-900">{{ $material->title }}</p>
                        @if($material->description)
                            <p class="text-xs text-gray-500 mt-1 truncate max-w-xs">{{ $material->description }}</p>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        <p class="font-bold text-gray-800">{{ $material->subject->name }}</p>
                        <p class="text-xs text-gray-500">{{ $material->major ?? '-' }} • Kls {{ $material->grade }} ({{ ucfirst($material->subject->category) }})</p>
                    </td>
                    <td class="py-4 px-6">
                        @if($material->file_type == 'pdf')
                            <span class="px-2 py-1 rounded-md text-xs font-bold uppercase bg-red-50 text-red-600">PDF</span>
                        @elseif($material->file_type == 'link')
                            <span class="px-2 py-1 rounded-md text-xs font-bold uppercase bg-blue-50 text-blue-600">LINK</span>
                        @else
                            <span class="px-2 py-1 rounded-md text-xs font-bold uppercase bg-orange-50 text-orange-600">PPT</span>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        @if($material->status == 'published')
                            <span class="px-2 py-1 rounded-md text-xs font-bold bg-green-50 text-green-600">Dipublikasikan</span>
                        @else
                            <span class="px-2 py-1 rounded-md text-xs font-bold bg-gray-100 text-gray-600">Draf</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-right">
                        @php 
                            $url = $material->file_type == 'link' ? $material->file_url : Storage::url($material->file_path);
                        @endphp
                        <a href="{{ $url }}" target="_blank" class="text-blue-500 hover:text-blue-700 font-bold text-sm mr-3">Lihat</a>
                        <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr id="emptyRowGlobal">
                    <td colspan="5" class="py-8 text-center text-gray-500">Belum ada materi yang diunggah.</td>
                </tr>
                @endforelse
                <tr id="emptyRowFiltered" class="hidden">
                    <td colspan="5" class="py-8 text-center text-gray-500">Materi tidak ditemukan dengan filter saat ini.</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Upload Materi -->
<div id="uploadMaterialModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('uploadMaterialModal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-xl bg-white rounded-3xl p-8 shadow-2xl max-h-[90vh] overflow-y-auto">
        <h3 class="text-xl font-black text-gray-900 mb-6">Tambah Materi Baru</h3>
        <form action="{{ route('admin.materials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Materi</label>
                <input type="text" name="title" required placeholder="Contoh: Modul Aljabar Dasar" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Mata Pelajaran</label>
                <input type="text" id="mapelInput" placeholder="Cari mapel atau kelas..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium" list="listAllCurriculums">
                <input type="hidden" name="subject_id" id="subjectIdHidden" required>
                <datalist id="listAllCurriculums">
                    @foreach($curriculums as $curr)
                        <option value="{{ $curr->subject->name }} — {{ $curr->major->name ?? '-' }} Kelas {{ $curr->grade }} ({{ ucfirst($curr->subject->category) }})" data-id="{{ $curr->subject_id }}"></option>
                    @endforeach
                </datalist>
                <p class="text-xs text-gray-500 mt-1">Ketik untuk mencari mapel, jurusan, atau kelas.</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat (Opsional)</label>
                <textarea name="description" rows="2" placeholder="Jelaskan sedikit mengenai materi ini" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium text-sm"></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-3">Tipe Materi</label>
                <div class="flex gap-4 mb-4">
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="material_type" value="file" checked class="peer sr-only" onchange="toggleMaterialInput()">
                        <div class="text-center py-3 px-4 rounded-xl border-2 border-gray-200 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-700 font-bold text-gray-500 transition-all">
                            Unggah File
                        </div>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="material_type" value="link" class="peer sr-only" onchange="toggleMaterialInput()">
                        <div class="text-center py-3 px-4 rounded-xl border-2 border-gray-200 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-700 font-bold text-gray-500 transition-all">
                            Tempel Link
                        </div>
                    </label>
                </div>

                <!-- Input File (Dropzone) -->
                <div id="fileInputContainer" class="block">
                    <div class="relative border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:bg-gray-50 transition-colors">
                        <input type="file" name="file" id="actualFileInput" accept=".pdf,.ppt,.pptx" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="text-sm font-bold text-gray-700">Drop file di sini atau klik untuk upload</p>
                        <p class="text-xs text-gray-500 mt-1">PDF atau PPT (Maks 10MB)</p>
                    </div>
                </div>

                <!-- Input Link -->
                <div id="linkInputContainer" class="hidden">
                    <input type="url" name="file_url" placeholder="https://docs.google.com/..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium">
                    <p class="text-xs text-gray-500 mt-2">Bisa berupa Google Drive, YouTube, atau tautan lainnya.</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('uploadMaterialModal').classList.add('hidden')" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Batal</button>
                <button type="submit" name="status" value="draft" class="px-6 py-3 bg-orange-100 text-orange-700 font-bold rounded-xl hover:bg-orange-200 transition-colors">Simpan Sebagai Draf</button>
                <button type="submit" name="status" value="published" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors shadow-lg shadow-red-200">Publikasikan Sekarang</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Data kurikulum untuk filter dinamis Mapel
    const curriculums = @json($curriculums);

    function toggleMaterialInput() {
        const type = document.querySelector('input[name="material_type"]:checked').value;
        const fileInput = document.getElementById('fileInputContainer');
        const linkInput = document.getElementById('linkInputContainer');
        const actualFile = document.getElementById('actualFileInput');
        const actualLink = document.querySelector('input[name="file_url"]');

        if (type === 'file') {
            fileInput.classList.remove('hidden');
            linkInput.classList.add('hidden');
            actualFile.required = true;
            actualLink.required = false;
        } else {
            fileInput.classList.add('hidden');
            linkInput.classList.remove('hidden');
            actualFile.required = false;
            actualLink.required = true;
        }
    }

    // Set mapel hidden ID on input
    document.getElementById('mapelInput').addEventListener('input', function(e) {
        const val = this.value;
        const opts = document.getElementById('listAllCurriculums').options;
        for(let i=0; i<opts.length; i++) {
            if(opts[i].value === val) {
                document.getElementById('subjectIdHidden').value = opts[i].getAttribute('data-id');
                break;
            }
        }
    });

    // Update Filter Mapel berdasarkan 3 filter sebelumnya
    function updateMapelOptions() {
        const jurusan = document.getElementById('filterJurusan').value.toLowerCase();
        const tingkat = document.getElementById('filterTingkat').value;
        const jenis = document.getElementById('filterJenis').value.toLowerCase();
        
        const filterMapelInput = document.getElementById('filterMapel');
        const listMapelFilter = document.getElementById('listMapelFilter');
        
        // Reset and disable Mapel if any of the 3 is missing
        if (!jurusan || !tingkat || !jenis) {
            filterMapelInput.disabled = true;
            filterMapelInput.classList.add('bg-gray-100');
            filterMapelInput.value = '';
            listMapelFilter.innerHTML = '';
            return;
        }

        // Enable mapel filter
        filterMapelInput.disabled = false;
        filterMapelInput.classList.remove('bg-gray-100');
        listMapelFilter.innerHTML = '';

        // Find matching subjects
        let addedNames = new Set();
        curriculums.forEach(curr => {
            const mJur = (curr.major ? curr.major.name.toLowerCase() : '');
            const mTing = curr.grade;
            const mJen = curr.subject.category.toLowerCase();
            const mName = curr.subject.name;

            if (mJur.includes(jurusan) && mTing === tingkat && mJen === jenis) {
                if(!addedNames.has(mName)) {
                    addedNames.add(mName);
                    const opt = document.createElement('option');
                    opt.value = mName;
                    listMapelFilter.appendChild(opt);
                }
            }
        });
    }

    // Apply All Filters
    function applyFilters() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const jurusan = document.getElementById('filterJurusan').value.toLowerCase();
        const tingkat = document.getElementById('filterTingkat').value;
        const jenis = document.getElementById('filterJenis').value.toLowerCase();
        const mapel = document.getElementById('filterMapel').value.toLowerCase();
        const tipe = document.getElementById('filterTipe').value.toLowerCase();
        const status = document.getElementById('filterStatus').value.toLowerCase();

        const rows = document.querySelectorAll('.material-row');
        let hasVisible = false;

        rows.forEach(row => {
            const rTitle = row.getAttribute('data-title');
            const rJurusan = row.getAttribute('data-jurusan');
            const rTingkat = row.getAttribute('data-tingkat');
            const rJenis = row.getAttribute('data-jenis');
            const rMapel = row.getAttribute('data-mapel');
            const rTipe = row.getAttribute('data-tipe');
            const rStatus = row.getAttribute('data-status');

            const matchSearch = search === '' || rTitle.includes(search);
            const matchJurusan = jurusan === '' || rJurusan.includes(jurusan);
            const matchTingkat = tingkat === '' || rTingkat === tingkat;
            const matchJenis = jenis === '' || rJenis === jenis;
            const matchMapel = mapel === '' || rMapel.includes(mapel);
            const matchTipe = tipe === '' || (tipe === 'ppt' ? rTipe === 'ppt' : rTipe === tipe);
            const matchStatus = status === '' || rStatus === status;

            if (matchSearch && matchJurusan && matchTingkat && matchJenis && matchMapel && matchTipe && matchStatus) {
                row.classList.remove('hidden');
                hasVisible = true;
            } else {
                row.classList.add('hidden');
            }
        });

        // Toggle Empty States
        const emptyGlobal = document.getElementById('emptyRowGlobal');
        const emptyFiltered = document.getElementById('emptyRowFiltered');
        
        if(emptyGlobal) emptyGlobal.classList.add('hidden');

        if (!hasVisible && rows.length > 0) {
            emptyFiltered.classList.remove('hidden');
        } else if (emptyFiltered) {
            emptyFiltered.classList.add('hidden');
        }
    }

    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('filterJurusan').value = '';
        document.getElementById('filterTingkat').value = '';
        document.getElementById('filterJenis').value = '';
        document.getElementById('filterMapel').value = '';
        document.getElementById('filterTipe').value = '';
        document.getElementById('filterStatus').value = '';
        
        updateMapelOptions();
        applyFilters();
    }
</script>
@endpush
@endsection
