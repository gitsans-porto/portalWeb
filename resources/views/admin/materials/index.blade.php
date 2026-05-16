@extends('layouts.admin')

@section('title', 'Manajemen Materi Pembelajaran')

@section('content')
<div class="card-twit">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-black text-gray-900">Materi Pembelajaran</h2>
            <p class="text-gray-500 mt-1">Upload dan kelola file PDF/PPT untuk setiap mata pelajaran.</p>
        </div>
        
        <button onclick="document.getElementById('uploadMaterialModal').classList.remove('hidden')" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors shadow-lg shadow-red-200 whitespace-nowrap">
            + Unggah Materi
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Judul Materi</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Mata Pelajaran</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Kelas</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Tipe</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($materials as $material)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6 font-bold text-gray-900">{{ $material->title }}</td>
                    <td class="py-4 px-6 text-gray-500">{{ $material->subject->name }}</td>
                    <td class="py-4 px-6 text-gray-500">Kelas {{ $material->grade }}</td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-1 rounded-md text-xs font-bold uppercase {{ $material->file_type == 'pdf' ? 'bg-red-50 text-red-600' : 'bg-orange-50 text-orange-600' }}">
                            {{ $material->file_type }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <a href="{{ Storage::url($material->file_path) }}" target="_blank" class="text-blue-500 hover:text-blue-700 font-bold text-sm mr-3">Lihat</a>
                        <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">Belum ada materi yang diunggah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Upload Materi -->
<div id="uploadMaterialModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('uploadMaterialModal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl">
        <h3 class="text-xl font-black text-gray-900 mb-6">Unggah Materi Baru</h3>
        <form action="{{ route('admin.materials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Materi</label>
                <input type="text" name="title" required placeholder="Contoh: Modul Aljabar Dasar" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Mata Pelajaran</label>
                <select name="subject_id" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all bg-white font-medium">
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }} ({{ ucfirst($subject->category) }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Untuk Kelas</label>
                <select name="grade" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all bg-white font-medium">
                    <option value="10">Kelas 10</option>
                    <option value="11">Kelas 11</option>
                    <option value="12">Kelas 12</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Jurusan</label>
                <input type="text" name="major" placeholder="Contoh: Teknik Komputer & Jaringan" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Pilih File (PDF/PPT)</label>
                <input type="file" name="file" accept=".pdf,.ppt,.pptx" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm font-medium">
                <p class="text-xs text-gray-500 mt-2">Maksimal ukuran file: 10MB</p>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('uploadMaterialModal').classList.add('hidden')" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Batal</button>
                <button type="submit" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">Unggah Materi</button>
            </div>
        </form>
    </div>
</div>
@endsection
