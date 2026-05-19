@extends('layouts.admin')

@section('title', 'Manajemen Materi Pembelajaran')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>

<div class="card-twit">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-black text-gray-900">Materi Pembelajaran</h2>
            <p class="text-gray-500 mt-1">Upload dan kelola file/link materi untuk setiap mata pelajaran.</p>
        </div>
        
        <button onclick="openAddMaterialModal()" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors shadow-lg shadow-red-200 whitespace-nowrap">
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
                    <td class="py-4 px-6 align-top">
                        <span class="text-sm text-gray-900 uppercase">{{ in_array($material->file_type, ['pdf', 'link']) ? $material->file_type : 'ppt' }}</span>
                    </td>
                    <td class="py-4 px-6 align-top">
                        <div class="relative group/status inline-block status-dropdown-wrapper">
                            <div class="flex items-center gap-1.5 cursor-pointer hover:bg-gray-100 py-1.5 px-2 -ml-2 rounded-lg transition-colors" tabindex="0" onclick="toggleStatusDropdown(this, event)">
                                @if($material->status == 'published')
                                    <span class="material-symbols-outlined text-green-600 !text-[20px]">public</span>
                                    <span class="text-sm font-bold text-gray-900">Publik</span>
                                @elseif($material->status == 'private')
                                    <span class="material-symbols-outlined text-gray-500 !text-[20px]">lock</span>
                                    <span class="text-sm text-gray-500">Privat</span>
                                @else
                                    <span class="material-symbols-outlined text-gray-500 !text-[20px]">draft</span>
                                    <span class="text-sm text-gray-500">Draf</span>
                                @endif
                                <svg class="w-4 h-4 text-gray-400 group-hover/status:text-gray-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            
                            <!-- Dropdown Menu -->
                            <div class="absolute left-0 top-full mt-1 w-44 bg-white border border-gray-100 rounded-xl shadow-lg z-50 hidden overflow-hidden status-dropdown-menu">
                                <form action="{{ route('admin.materials.update', $material->id) }}" method="POST" class="flex flex-col">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="update_status">
                                    
                                    @if($material->status == 'draft')
                                        <button type="button" class="w-full text-left px-4 py-3 text-sm text-gray-700 bg-gray-50 border-l-4 border-gray-400 font-bold flex items-center gap-2 cursor-default">
                                            <span class="material-symbols-outlined !text-[18px]">draft</span> Draf
                                        </button>
                                    @else
                                        <button type="submit" name="status" value="private" class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-gray-900 flex items-center gap-2 transition-colors {{ $material->status == 'private' ? 'bg-gray-50 border-l-4 border-gray-400 font-bold' : 'border-l-4 border-transparent' }}">
                                            <span class="material-symbols-outlined !text-[18px]">lock</span> Privat
                                        </button>
                                    @endif
                                    
                                    <button type="submit" name="status" value="published" class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-green-600 flex items-center gap-2 transition-colors {{ $material->status == 'published' ? 'bg-green-50 border-l-4 border-green-500 font-bold text-green-700' : 'border-l-4 border-transparent' }}">
                                        <span class="material-symbols-outlined !text-[18px]">public</span> Publikasi
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6 text-right align-top">
                        @php 
                            $url = $material->file_type == 'link' ? $material->file_url : Storage::url($material->file_path);
                        @endphp
                        <a href="{{ $url }}" target="_blank" class="text-blue-500 hover:text-blue-700 font-bold text-sm mr-3">Lihat</a>
                        <button type="button" onclick="openEditMaterialModal({{ $material->toJson() }})" class="text-indigo-500 hover:text-indigo-700 font-bold text-sm mr-3">Edit</button>
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

<div id="uploadMaterialModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('uploadMaterialModal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-5xl bg-white rounded-3xl p-8 shadow-2xl max-h-[90vh] overflow-y-auto relative">
        <button type="button" onclick="document.getElementById('uploadMaterialModal').classList.add('hidden')" class="absolute top-6 right-6 text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <h3 class="text-xl font-black text-gray-900 mb-8">Tambah Materi Baru</h3>
        
        <form action="{{ route('admin.materials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                <!-- Kolom Kiri -->
                <div class="flex flex-col gap-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Materi <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="Contoh: Pengenalan Algoritma & Pemrograman" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Jurusan <span class="text-red-500">*</span></label>
                            <input type="text" name="major_name" id="formJurusan" onchange="updateFormMapelOptions()" required placeholder="Pilih Jurusan" autocomplete="off" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium" list="formJurusanList">
                            <datalist id="formJurusanList">
                                @foreach($majors as $major)
                                    <option value="{{ $major->name }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tingkat Kelas <span class="text-red-500">*</span></label>
                            <select name="grade" id="formTingkat" onchange="updateFormMapelOptions()" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium bg-white">
                                <option value="">Pilih Kelas</option>
                                <option value="10">Kelas 10</option>
                                <option value="11">Kelas 11</option>
                                <option value="12">Kelas 12</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Mata Pelajaran <span class="text-red-500">*</span></label>
                        <input type="text" id="formMapelInput" placeholder="Pilih mata pelajaran" autocomplete="off" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium bg-gray-50 text-gray-400" disabled list="formMapelList">
                        <input type="hidden" name="subject_id" id="formSubjectIdHidden" required>
                        <datalist id="formMapelList">
                            <!-- Terisi dinamis via JS -->
                        </datalist>
                        <p id="formMapelHelper" class="text-xs text-red-500 mt-1">Silahkan pilih jurusan dan kelas terlebih dahulu.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi singkat</label>
                        <textarea name="description" rows="3" placeholder="Apa yang dipelajari dari bahan ajar ini?" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium text-sm"></textarea>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="flex flex-col">
                    <label class="block text-sm font-bold text-gray-700 mb-3">Tipe konten</label>
                    <div class="flex gap-3 mb-4">
                        <label class="cursor-pointer">
                            <input type="radio" name="material_type" value="file" checked class="peer sr-only" onchange="toggleMaterialInput()">
                            <div class="flex items-center gap-2 py-2 px-4 rounded-lg border-2 border-gray-200 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-700 font-bold text-gray-500 text-sm transition-all">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                Unggah file
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="material_type" value="link" class="peer sr-only" onchange="toggleMaterialInput()">
                            <div class="flex items-center gap-2 py-2 px-4 rounded-lg border-2 border-gray-200 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-700 font-bold text-gray-500 text-sm transition-all">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                Tempel link
                            </div>
                        </label>
                    </div>

                    <!-- Input File (Dropzone) -->
                    <div id="fileInputContainer" class="block mb-4">
                        <div id="dropzoneArea" class="relative flex flex-col justify-center border-2 border-dashed border-gray-300 rounded-xl py-10 px-6 text-center hover:bg-gray-50 transition-colors">
                            <input type="file" name="file" id="actualFileInput" accept=".pdf,.ppt,.pptx" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="handleFileUpload(this)">
                            
                            <div id="uploadIdleState">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                <p class="text-sm font-bold text-gray-700">Klik untuk pilih file</p>
                                <p class="text-xs text-gray-500 mt-1">PDF, PPT, PPTX — maks. 25 MB</p>
                            </div>

                            <div id="uploadProgressState" class="hidden">
                                <svg class="animate-spin mx-auto h-10 w-10 text-red-600 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <p class="text-sm font-bold text-gray-700">Sedang memproses file...</p>
                            </div>
                        </div>
                        <p id="fileUploadInfo" class="text-sm font-bold text-green-600 mt-2 hidden"></p>
                        <p id="fileUploadError" class="text-xs text-red-500 mt-2 hidden">Ukuran file melebihi batas maksimal 25 MB.</p>
                    </div>

                    <!-- Input Link -->
                    <div id="linkInputContainer" class="hidden flex-1">
                        <input type="url" name="file_url" placeholder="https://docs.google.com/..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium">
                        <p class="text-xs text-gray-500 mt-2">Bisa berupa tautan Google Drive, YouTube, dll.</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-5 pt-5 border-t border-gray-100">
                <div class="flex items-start gap-2 flex-1 hidden sm:flex">
                    <svg class="w-5 h-5 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-xs text-gray-500 leading-relaxed text-left">Simpan sebagai draft untuk dipublikasi nanti, atau langsung publikasikan sekarang.</p>
                </div>
                <div class="flex gap-3 w-full sm:w-auto flex-shrink-0">
                    <button type="submit" name="status" value="draft" class="flex-1 sm:flex-none px-5 py-2.5 bg-white border border-gray-900 text-gray-900 font-bold text-sm rounded-xl hover:bg-gray-50 transition-colors text-center leading-tight">
                        Simpan sebagai<br>draft
                    </button>
                    <button type="submit" name="status" value="published" class="flex-1 sm:flex-none px-5 py-2.5 bg-red-600 text-white font-bold text-sm rounded-xl hover:bg-red-700 transition-colors shadow-lg shadow-red-200 text-center leading-tight flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-left">Publikasikan<br>sekarang</span>
                    </button>
                </div>
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
            actualFile.required = !isEditMode; // Required if new, optional if edit
            actualLink.required = false;
        } else {
            fileInput.classList.add('hidden');
            linkInput.classList.remove('hidden');
            actualFile.required = false;
            actualLink.required = true;
        }
    }

    let isEditMode = false;

    function openAddMaterialModal() {
        isEditMode = false;
        const modal = document.getElementById('uploadMaterialModal');
        const form = modal.querySelector('form');
        const title = modal.querySelector('h3');
        
        title.innerText = 'Tambah Materi Baru';
        form.action = "{{ route('admin.materials.store') }}";
        
        // Remove _method input if exists
        const methodInput = form.querySelector('input[name="_method"]');
        if (methodInput) methodInput.remove();
        
        form.reset();
        
        document.getElementById('formSubjectIdHidden').value = '';
        document.getElementById('fileUploadInfo').classList.add('hidden');
        updateFormMapelOptions();
        toggleMaterialInput();
        
        modal.classList.remove('hidden');
    }

    function openEditMaterialModal(material) {
        isEditMode = true;
        const modal = document.getElementById('uploadMaterialModal');
        const form = modal.querySelector('form');
        const title = modal.querySelector('h3');
        
        title.innerText = 'Edit Materi';
        form.action = `/admin/materials/${material.id}`;
        
        let methodInput = form.querySelector('input[name="_method"]');
        if (!methodInput) {
            methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);
        }

        form.querySelector('input[name="title"]').value = material.title;
        form.querySelector('textarea[name="description"]').value = material.description || '';
        form.querySelector('input[name="major_name"]').value = material.major || '';
        form.querySelector('select[name="grade"]').value = material.grade || '';
        
        // Mapel
        const mapelInput = document.getElementById('formMapelInput');
        const subjectIdHidden = document.getElementById('formSubjectIdHidden');
        
        updateFormMapelOptions();
        
        if (material.subject) {
            const jenisCap = material.subject.category.charAt(0).toUpperCase() + material.subject.category.slice(1);
            mapelInput.value = `${material.subject.name} (${jenisCap})`;
        }
        subjectIdHidden.value = material.subject_id;
        
        // Material Type
        const typeLink = form.querySelector('input[name="material_type"][value="link"]');
        const typeFile = form.querySelector('input[name="material_type"][value="file"]');
        
        if (material.file_type === 'link') {
            typeLink.checked = true;
            form.querySelector('input[name="file_url"]').value = material.file_url;
        } else {
            typeFile.checked = true;
            const info = document.getElementById('fileUploadInfo');
            info.innerHTML = `File saat ini: <b>Sudah Terlampir</b> (Biarkan kosong jika tidak ingin mengubah)`;
            info.classList.remove('hidden');
        }
        
        toggleMaterialInput();
        modal.classList.remove('hidden');
    }

    // Update Filter Mapel di form
    function updateFormMapelOptions() {
        const jurusan = document.getElementById('formJurusan').value.toLowerCase();
        const tingkat = document.getElementById('formTingkat').value;
        const mapelInput = document.getElementById('formMapelInput');
        const mapelList = document.getElementById('formMapelList');
        const helperText = document.getElementById('formMapelHelper');
        
        mapelInput.value = '';
        document.getElementById('formSubjectIdHidden').value = '';

        if (!jurusan || !tingkat) {
            mapelInput.disabled = true;
            mapelInput.classList.add('bg-gray-50', 'text-gray-400');
            mapelInput.classList.remove('bg-white', 'text-gray-900');
            helperText.classList.remove('hidden');
            mapelList.innerHTML = '';
            return;
        }

        mapelInput.disabled = false;
        mapelInput.classList.remove('bg-gray-50', 'text-gray-400');
        mapelInput.classList.add('bg-white', 'text-gray-900');
        helperText.classList.add('hidden');
        mapelList.innerHTML = '';

        let addedNames = new Set();
        curriculums.forEach(curr => {
            const mJur = (curr.major ? curr.major.name.toLowerCase() : '');
            const mTing = curr.grade;
            
            if (mJur === jurusan && mTing === tingkat) {
                const jenisCap = curr.subject.category.charAt(0).toUpperCase() + curr.subject.category.slice(1);
                const optText = `${curr.subject.name} (${jenisCap})`;
                if(!addedNames.has(optText)) {
                    addedNames.add(optText);
                    const opt = document.createElement('option');
                    opt.value = optText;
                    opt.setAttribute('data-id', curr.subject_id);
                    mapelList.appendChild(opt);
                }
            }
        });
    }

    document.getElementById('formMapelInput').addEventListener('change', function(e) {
        const val = this.value;
        const helperText = document.getElementById('formMapelHelper');
        
        if (!val) {
            document.getElementById('formSubjectIdHidden').value = '';
            return;
        }

        const opts = document.getElementById('formMapelList').options;
        let found = false;
        
        for(let i=0; i<opts.length; i++) {
            if(opts[i].value === val) {
                document.getElementById('formSubjectIdHidden').value = opts[i].getAttribute('data-id');
                found = true;
                break;
            }
        }

        if (!found) {
            this.value = '';
            document.getElementById('formSubjectIdHidden').value = '';
            helperText.innerText = 'Mapel yang anda pilih tidak terdaftar pada jurusan dan tingkat kelas yang anda pilih. Silahkan pilih mapel yang terdaftar pada jurusan dan tingkat kelas yang dipilih!';
            helperText.classList.remove('hidden');
        } else {
            helperText.classList.add('hidden');
        }
    });

    function handleFileUpload(input) {
        const file = input.files[0];
        const info = document.getElementById('fileUploadInfo');
        const error = document.getElementById('fileUploadError');
        const idle = document.getElementById('uploadIdleState');
        const progress = document.getElementById('uploadProgressState');
        const dropzoneArea = document.getElementById('dropzoneArea');
        
        info.classList.add('hidden');
        error.classList.add('hidden');
        
        if(!file) return;

        // validate extension
        const ext = file.name.split('.').pop().toLowerCase();
        if(!['pdf', 'ppt', 'pptx'].includes(ext)) {
            error.innerText = 'Hanya file PDF dan PPT yang diizinkan.';
            error.classList.remove('hidden');
            input.value = '';
            return;
        }

        // validate size (25MB = 25 * 1024 * 1024 = 26214400)
        if(file.size > 26214400) {
            error.innerText = 'Ukuran file melebihi batas maksimal 25 MB.';
            error.classList.remove('hidden');
            input.value = '';
            return;
        }

        // show loading
        idle.classList.add('hidden');
        progress.classList.remove('hidden');
        dropzoneArea.classList.add('border-red-500');

        // simulate processing time
        setTimeout(() => {
            progress.classList.add('hidden');
            idle.classList.remove('hidden');
            dropzoneArea.classList.remove('border-red-500');
            dropzoneArea.classList.add('border-green-500', 'bg-green-50');
            
            const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
            info.innerHTML = `File: <b>${file.name}</b> (Ukuran: ${sizeMB} MB)`;
            info.classList.remove('hidden');
        }, 1200);
    }

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

<script>
    function toggleStatusDropdown(element, event) {
        // Prevent click from bubbling up
        if (event) {
            event.stopPropagation();
        }
        
        const menu = element.nextElementSibling;
        const isHidden = menu.classList.contains('hidden');
        
        // Close all dropdowns
        document.querySelectorAll('.status-dropdown-menu').forEach(el => el.classList.add('hidden'));
        
        // Toggle current dropdown
        if (isHidden) {
            menu.classList.remove('hidden');
        }
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.status-dropdown-wrapper')) {
            document.querySelectorAll('.status-dropdown-menu').forEach(el => el.classList.add('hidden'));
        }
    });
</script>
@endpush
@endsection
