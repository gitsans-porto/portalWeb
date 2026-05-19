@extends('layouts.admin')

@section('title', 'Data Master')

@section('content')
@php
    $activeTab = request('tab', 'jurusan');
@endphp

<div class="card-twit">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-black text-gray-900">Data Master</h2>
            <p class="text-gray-500 mt-1">Kelola jurusan, mata pelajaran, dan kurikulum.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-3">
            @if($activeTab == 'jurusan')
                <button onclick="document.getElementById('addMajorModal').classList.remove('hidden')" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors shadow-lg shadow-red-200 whitespace-nowrap">
                    + Tambah Data
                </button>
            @elseif($activeTab == 'mata-pelajaran')
                <button onclick="openAddSubjectModal()" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors shadow-lg shadow-red-200 whitespace-nowrap">
                    + Tambah Data
                </button>
            @endif
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="flex border-b border-gray-200 mb-6 overflow-x-auto">
        <a href="{{ route('admin.subjects.index', ['tab' => 'jurusan']) }}" class="px-6 py-3 font-bold whitespace-nowrap transition-colors {{ $activeTab == 'jurusan' ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-500 hover:text-gray-700' }}">
            Jurusan
        </a>
        <a href="{{ route('admin.subjects.index', ['tab' => 'mata-pelajaran']) }}" class="px-6 py-3 font-bold whitespace-nowrap transition-colors {{ $activeTab == 'mata-pelajaran' ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-500 hover:text-gray-700' }}">
            Mata Pelajaran
        </a>
        <a href="{{ route('admin.subjects.index', ['tab' => 'kurikulum']) }}" class="px-6 py-3 font-bold whitespace-nowrap transition-colors {{ $activeTab == 'kurikulum' ? 'text-red-600 border-b-2 border-red-600' : 'text-gray-500 hover:text-gray-700' }}">
            Kurikulum Mapel
        </a>
    </div>

    <!-- Tab Content: Jurusan -->
    @if($activeTab == 'jurusan')
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Jurusan</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Kode</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Mapel Aktif</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($majors as $major)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6 font-bold text-gray-900">{{ $major->name }}</td>
                    <td class="py-4 px-6 font-medium text-gray-600">{{ $major->code ?? '-' }}</td>
                    <td class="py-4 px-6 text-gray-500">{{ $major->curriculums_count }} Mapel</td>
                    <td class="py-4 px-6 text-right">
                        <button onclick="editMajor({{ $major->id }}, '{{ addslashes($major->name) }}', '{{ addslashes($major->code) }}')" class="text-blue-500 hover:text-blue-700 font-bold text-sm mr-3">Edit</button>
                        <form action="{{ route('admin.majors.destroy', $major->id) }}" method="POST" class="inline-block" id="delete-major-{{ $major->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="if(confirm('Yakin ingin menghapus jurusan ini?')) document.getElementById('delete-major-{{ $major->id }}').submit();" class="text-red-500 hover:text-red-700 font-bold text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-8 text-center text-gray-500">Belum ada data jurusan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif

    <!-- Tab Content: Mata Pelajaran -->
    @if($activeTab == 'mata-pelajaran')
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Mapel</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Kode Mapel</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Jenis Mapel</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($subjects as $subject)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6 font-bold text-gray-900">{{ $subject->name }}</td>
                    <td class="py-4 px-6 font-medium text-gray-600">{{ $subject->code ?? '-' }}</td>
                    <td class="py-4 px-6 text-gray-500 capitalize">{{ $subject->category }}</td>
                    <td class="py-4 px-6">
                        @if($subject->is_active)
                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-md">Aktif</span>
                        @else
                            <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs font-bold rounded-md">Belum Aktif</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-right">
                        <button onclick="editSubject({{ $subject->id }}, '{{ addslashes($subject->name) }}', '{{ addslashes($subject->code ?? '') }}', '{{ $subject->category }}', {{ json_encode($subject->curriculums) }})" class="text-blue-500 hover:text-blue-700 font-bold text-sm mr-3">Edit</button>
                        <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" class="inline-block" id="delete-subject-{{ $subject->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="if(confirm('Yakin ingin menghapus mata pelajaran ini?')) document.getElementById('delete-subject-{{ $subject->id }}').submit();" class="text-red-500 hover:text-red-700 font-bold text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">Belum ada mata pelajaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif

    <!-- Tab Content: Kurikulum Mapel -->
    @if($activeTab == 'kurikulum')
    <div class="mb-6 flex flex-col md:flex-row gap-4">
        <div class="w-full md:w-1/3 relative">
            <input type="text" id="filterJurusanInput" onkeyup="filterKurikulum()" placeholder="Pilih Jurusan" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium" list="jurusanList">
            <datalist id="jurusanList">
                @foreach($majors as $major)
                    <option value="{{ $major->name }}" data-id="{{ $major->id }}"></option>
                @endforeach
            </datalist>
        </div>
        <div class="w-full md:w-1/3">
            <select id="filterKelasInput" onchange="filterKurikulum()" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all font-medium bg-gray-50 text-gray-400" disabled>
                <option value="">Pilih Kelas</option>
                <option value="10">Kelas 10</option>
                <option value="11">Kelas 11</option>
                <option value="12">Kelas 12</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse" id="kurikulumTable">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Mapel</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Jurusan</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Kelas</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Label Raport</th>
                    <th class="py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Jenis Mapel</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($curriculums as $curr)
                <tr class="hover:bg-gray-50 transition-colors curriculum-row hidden" data-jurusan="{{ $curr->major->name ?? '' }}" data-kelas="{{ $curr->grade }}">
                    <td class="py-4 px-6 font-bold text-gray-900">{{ $curr->subject->name }}</td>
                    <td class="py-4 px-6 font-medium text-gray-600">{{ $curr->major->name ?? '-' }}</td>
                    <td class="py-4 px-6 font-medium text-gray-600">{{ $curr->grade }}</td>
                    <td class="py-4 px-6 font-medium text-gray-600">{{ $curr->report_label ?? '-' }}</td>
                    <td class="py-4 px-6 font-medium text-gray-600 capitalize">{{ $curr->subject->category }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">Belum ada data kurikulum.</td>
                </tr>
                @endforelse
                <tr id="emptyKurikulumMsg" class="hidden">
                    <td colspan="5" class="py-8 text-center text-gray-500">Silakan pilih jurusan untuk melihat data.</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</div>

<!-- Modal Tambah Jurusan -->
<div id="addMajorModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('addMajorModal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl">
        <h3 class="text-xl font-black text-gray-900 mb-6">Tambah Jurusan</h3>
        <form action="{{ route('admin.majors.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Jurusan</label>
                <input type="text" name="name" required placeholder="contoh: Teknik Komputer dan Jaringan" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Kode Jurusan</label>
                <input type="text" name="code" placeholder="contoh: TKJ" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('addMajorModal').classList.add('hidden')" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Batal</button>
                <button type="submit" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Jurusan -->
<div id="editMajorModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('editMajorModal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl">
        <h3 class="text-xl font-black text-gray-900 mb-6">Edit Jurusan</h3>
        <form id="editMajorForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Jurusan</label>
                <input type="text" name="name" id="edit_major_name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Kode Jurusan</label>
                <input type="text" name="code" id="edit_major_code" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('editMajorModal').classList.add('hidden')" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Batal</button>
                <button type="submit" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>



<!-- Modal Form Mapel (Multi-step untuk Tambah/Edit) -->
<div id="subjectModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('subjectModal').classList.add('hidden')"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white rounded-3xl p-8 shadow-2xl max-h-[90vh] overflow-y-auto">
        <h3 class="text-xl font-black text-gray-900 mb-6" id="subjectModalTitle">Tambah Mata Pelajaran</h3>
        
        <form action="{{ route('admin.subjects.store') }}" method="POST" id="subjectForm">
            @csrf
            <input type="hidden" name="_method" id="subjectMethod" value="POST">
            <!-- Step 1: Info Mapel -->
            <div id="step1">
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mata Pelajaran</label>
                    <input type="text" name="name" id="subject_name" required placeholder="contoh: Matematika" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kode Mapel (Opsional)</label>
                    <input type="text" name="code" placeholder="contoh: MTK" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Mapel</label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none transition-all bg-white">
                        <option value="umum">Umum</option>
                        <option value="kejuruan">Kejuruan</option>
                        <option value="pilihan">Pilihan</option>
                    </select>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('subjectModal').classList.add('hidden')" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Batal</button>
                    <button type="button" onclick="nextStep(2)" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">Lanjut ke Cakupan Kurikulum</button>
                </div>
            </div>

            <!-- Step 2: Cakupan Kurikulum -->
            <div id="step2" class="hidden">
                <p class="text-sm text-gray-500 mb-4">Tautkan mapel ini ke Jurusan, Tingkat Kelas, dan Label Raport.</p>
                
                <div id="curriculumContainer" class="space-y-3 mb-4">
                    <!-- Dynamic Rows -->
                </div>
                
                <button type="button" onclick="addCurriculumRow()" class="mb-6 text-red-600 font-bold text-sm hover:text-red-700">+ Tambah Cakupan</button>

                <div class="flex justify-between gap-3">
                    <button type="button" onclick="nextStep(1)" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Kembali</button>
                    <button type="button" onclick="nextStep(3)" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">Lanjut ke Konfirmasi</button>
                </div>
            </div>

            <!-- Step 3: Konfirmasi -->
            <div id="step3" class="hidden">
                <div class="bg-gray-50 p-4 rounded-xl mb-4 border border-gray-100">
                    <h4 class="font-bold text-gray-900 mb-2">Ringkasan Mata Pelajaran</h4>
                    <p class="text-sm text-gray-700 mb-1">Nama: <span id="summaryName" class="font-bold">-</span></p>
                    <p class="text-sm text-gray-700 mb-1">Kode: <span id="summaryCode" class="font-bold">-</span></p>
                    <p class="text-sm text-gray-700 mb-3">Jenis: <span id="summaryCategory" class="font-bold capitalize">-</span></p>
                    
                    <h4 class="font-bold text-gray-900 mb-2 mt-4">Cakupan Kurikulum</h4>
                    <ul id="summaryCurriculums" class="list-disc pl-5 text-sm text-gray-700">
                    </ul>
                </div>

                <p class="text-sm text-gray-500 mb-6" id="confirmationMsg"></p>
                <div class="flex justify-between gap-3">
                    <button type="button" onclick="nextStep(2)" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-colors">Kembali</button>
                    <button type="submit" class="px-6 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function editMajor(id, name, code) {
        document.getElementById('edit_major_name').value = name;
        document.getElementById('edit_major_code').value = code;
        document.getElementById('editMajorForm').action = '/admin/majors/' + id;
        document.getElementById('editMajorModal').classList.remove('hidden');
    }

    function editSubject(id, name, code, category, curriculums) {
        document.getElementById('subjectModalTitle').innerText = 'Edit Mata Pelajaran';
        const form = document.getElementById('subjectForm');
        form.action = '/admin/subjects/' + id;
        document.getElementById('subjectMethod').value = 'PUT';

        document.getElementById('subject_name').value = name;
        document.querySelector('input[name="code"]').value = code;
        document.querySelector('select[name="category"]').value = category;

        document.getElementById('curriculumContainer').innerHTML = '';
        currRowIdx = 0;
        
        if (curriculums && curriculums.length > 0) {
            curriculums.forEach(curr => {
                addCurriculumRow(curr.major_id, curr.grade, curr.report_label);
            });
        }

        nextStep(1);
        document.getElementById('subjectModal').classList.remove('hidden');
    }

    // Filter Kurikulum
    function filterKurikulum() {
        const jurusanInput = document.getElementById('filterJurusanInput').value.toLowerCase();
        const kelasInput = document.getElementById('filterKelasInput');
        const rows = document.querySelectorAll('.curriculum-row');
        const emptyMsg = document.getElementById('emptyKurikulumMsg');
        
        let hasVisible = false;

        if (jurusanInput) {
            kelasInput.disabled = false;
            kelasInput.classList.remove('bg-gray-50', 'text-gray-400');
            kelasInput.classList.add('bg-white', 'text-gray-900');
        } else {
            kelasInput.disabled = true;
            kelasInput.classList.add('bg-gray-50', 'text-gray-400');
            kelasInput.classList.remove('bg-white', 'text-gray-900');
            kelasInput.value = "";
        }

        const selectedKelas = kelasInput.value;

        if (!jurusanInput) {
            rows.forEach(row => row.classList.add('hidden'));
            emptyMsg.classList.remove('hidden');
            emptyMsg.innerHTML = '<td colspan="5" class="py-8 text-center text-gray-500">Silakan pilih jurusan untuk melihat data.</td>';
            return;
        }

        rows.forEach(row => {
            const rowJurusan = row.getAttribute('data-jurusan').toLowerCase();
            const rowKelas = row.getAttribute('data-kelas');
            
            const matchJurusan = rowJurusan.includes(jurusanInput);
            const matchKelas = selectedKelas ? rowKelas === selectedKelas : true;

            if (matchJurusan && matchKelas) {
                row.classList.remove('hidden');
                hasVisible = true;
            } else {
                row.classList.add('hidden');
            }
        });

        if (!hasVisible) {
            emptyMsg.classList.remove('hidden');
            emptyMsg.innerHTML = '<td colspan="5" class="py-8 text-center text-gray-500">Data tidak ditemukan.</td>';
        } else {
            emptyMsg.classList.add('hidden');
        }
    }

    // Init Kurikulum table
    document.addEventListener('DOMContentLoaded', () => {
        if(document.getElementById('filterJurusanInput')) filterKurikulum();
    });

    // Multi-step form logic
    let currRowIdx = 0;
    const majorsData = @json($majors);

    function openAddSubjectModal() {
        document.getElementById('subjectModalTitle').innerText = 'Tambah Mata Pelajaran';
        const form = document.getElementById('subjectForm');
        form.action = '{{ route('admin.subjects.store') }}';
        form.reset();
        document.getElementById('subjectMethod').value = 'POST';
        document.getElementById('curriculumContainer').innerHTML = '';
        currRowIdx = 0;
        nextStep(1);
        document.getElementById('subjectModal').classList.remove('hidden');
    }

    function nextStep(step) {
        if(step === 2) {
            // validate step 1
            if(!document.getElementById('subject_name').value) {
                alert('Nama Mata Pelajaran wajib diisi!');
                return;
            }
            if(currRowIdx === 0) addCurriculumRow(); // add one row if empty
        }
        if(step === 3) {
            // validate step 2
            let hasValidCurr = false;
            const container = document.getElementById('curriculumContainer');
            if(container.children.length > 0) {
                // just check if at least one is somewhat filled, or they can leave it empty
                hasValidCurr = true; 
            }
            
            const msg = document.getElementById('confirmationMsg');
            const summaryList = document.getElementById('summaryCurriculums');
            summaryList.innerHTML = '';
            
            document.getElementById('summaryName').innerText = document.getElementById('subject_name').value;
            document.getElementById('summaryCode').innerText = document.querySelector('input[name="code"]').value || '-';
            document.getElementById('summaryCategory').innerText = document.querySelector('select[name="category"]').value;

            let isEmpty = true;
            const rows = document.getElementById('curriculumContainer').children;
            
            for(let i=0; i<rows.length; i++) {
                const jur = rows[i].querySelector('select[name$="[major_id]"]');
                const kls = rows[i].querySelector('select[name$="[grade]"]');
                
                if(jur && jur.value) {
                    isEmpty = false;
                    const jurText = jur.options[jur.selectedIndex].text;
                    const klsText = kls.options[kls.selectedIndex].text;
                    const li = document.createElement('li');
                    li.innerText = jurText + ' - ' + klsText;
                    summaryList.appendChild(li);
                }
            }

            if(isEmpty) {
                summaryList.innerHTML = '<li class="text-red-500">Belum ada cakupan.</li>';
                msg.innerHTML = '<span class="text-red-500 font-bold">Peringatan:</span> Mapel akan disimpan tapi belum aktif di kurikulum mana pun. Silahkan isi terlebih dahulu di tahap sebelumnya atau bisa ditambahkan nanti.';
            } else {
                msg.innerHTML = 'Pastikan data sudah benar sebelum menyimpan.';
            }
        }

        document.getElementById('step1').classList.add('hidden');
        document.getElementById('step2').classList.add('hidden');
        document.getElementById('step3').classList.add('hidden');
        document.getElementById('step'+step).classList.remove('hidden');
    }

    function addCurriculumRow(majorId = '', grade = '', reportLabel = '') {
        const container = document.getElementById('curriculumContainer');
        const row = document.createElement('div');
        row.className = "flex gap-2 items-center bg-gray-50 p-3 rounded-xl border border-gray-100";
        
        let majorOptions = '<option value="">Pilih Jurusan</option><option value="all" class="font-bold">Semua Jurusan</option>';
        majorsData.forEach(m => {
            let selected = (m.id == majorId) ? 'selected' : '';
            majorOptions += `<option value="${m.id}" ${selected}>${m.name}</option>`;
        });
        
        let gradeOptions = `
            <option value="10" ${grade == '10' ? 'selected' : ''}>Kls 10</option>
            <option value="11" ${grade == '11' ? 'selected' : ''}>Kls 11</option>
            <option value="12" ${grade == '12' ? 'selected' : ''}>Kls 12</option>
        `;

        let labelVal = reportLabel ? reportLabel.replace(/"/g, '&quot;') : '';

        row.innerHTML = `
            <div class="flex-1">
                <select name="curriculums[${currRowIdx}][major_id]" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm">
                    ${majorOptions}
                </select>
            </div>
            <div class="w-24">
                <select name="curriculums[${currRowIdx}][grade]" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm">
                    ${gradeOptions}
                </select>
            </div>
            <div class="flex-1">
                <input type="text" name="curriculums[${currRowIdx}][report_label]" value="${labelVal}" placeholder="Label Raport (-)" class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none text-sm">
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        `;
        container.appendChild(row);
        currRowIdx++;
    }
</script>
@endpush
@endsection
