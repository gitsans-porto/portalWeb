@extends('layouts.admin')

@section('title', 'Manajemen Mata Pelajaran')

@section('content')
<div class="card-twit">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-black text-gray-900">Mata Pelajaran</h2>
            <p class="text-gray-500 mt-1">Kelola daftar mata pelajaran untuk bahan ajar.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3">
            <form action="{{ route('admin.subjects.index') }}" method="GET" class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" onchange="this.form.submit()" placeholder="Cari pelajaran..." class="w-full sm:w-64 pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm font-medium">
            </form>
            
            <button onclick="document.getElementById('addSubjectModal').classList.remove('hidden')" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors shadow-lg shadow-red-200 whitespace-nowrap">
                + Tambah Pelajaran
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Pelajaran</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Kategori</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($subjects as $subject)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6 font-bold text-gray-900">{{ $subject->name }}</td>
                    <td class="py-4 px-6 text-gray-500 capitalize">{{ $subject->category }}</td>
                    <td class="py-4 px-6 text-right">
                        <button onclick="editSubject({{ $subject->id }}, '{{ addslashes($subject->name) }}', '{{ $subject->category }}')" class="text-blue-500 hover:text-blue-700 font-bold text-sm mr-3">Edit</button>
                        <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" class="inline-block" id="delete-form-{{ $subject->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="if(confirm('Yakin ingin menghapus mata pelajaran ini?')) document.getElementById('delete-form-{{ $subject->id }}').submit();" class="text-red-500 hover:text-red-700 font-bold text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-8 text-center text-gray-500">Belum ada mata pelajaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Pelajaran -->
<div id="addSubjectModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('addSubjectModal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl">
        <h3 class="text-xl font-black text-gray-900 mb-6">Tambah Pelajaran Baru</h3>
        <form action="{{ route('admin.subjects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mata Pelajaran</label>
                <input type="text" name="name" required placeholder="Contoh: Matematika" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Gambar Mata Pelajaran (Opsional)</label>
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm">
                <p class="text-xs text-gray-500 mt-1">Disarankan format JPG/PNG, ukuran maksimal 2MB. Gambar akan ditampilkan di bagian atas kartu.</p>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all bg-white">
                    <option value="umum">Umum</option>
                    <option value="kejuruan">Kejuruan</option>
                </select>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('addSubjectModal').classList.add('hidden')" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Batal</button>
                <button type="submit" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Pelajaran -->
<div id="editSubjectModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('editSubjectModal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl">
        <h3 class="text-xl font-black text-gray-900 mb-6">Edit Mata Pelajaran</h3>
        <form id="editSubjectForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mata Pelajaran</label>
                <input type="text" name="name" id="edit_name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Gambar (Opsional)</label>
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                <select name="category" id="edit_category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all bg-white">
                    <option value="umum">Umum</option>
                    <option value="kejuruan">Kejuruan</option>
                </select>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('editSubjectModal').classList.add('hidden')" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Batal</button>
                <button type="submit" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function editSubject(id, name, category) {
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_category').value = category;
        document.getElementById('editSubjectForm').action = '/admin/subjects/' + id;
        document.getElementById('editSubjectModal').classList.remove('hidden');
    }
</script>
@endpush
@endsection
