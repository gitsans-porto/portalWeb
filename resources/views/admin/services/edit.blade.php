@extends('layouts.admin')

@section('title', 'Edit Tata Cara - ' . $service->name)

@section('content')
<div class="p-6">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Tata Cara Penggunaan</h1>
        <p class="text-gray-500 text-sm">Sesuaikan langkah-langkah prosedur untuk layanan <span class="font-bold text-red-600">{{ $service->name }}</span>.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-2xl flex items-center gap-3">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-medium">Mohon perbaiki kesalahan pada input Anda.</span>
        </div>
    @endif

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            {{-- Service Info (Read-only) --}}
            <div class="bg-gray-50 border border-gray-100 rounded-3xl p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Nama Layanan</label>
                        <input type="text" value="{{ $service->name }}" disabled class="w-full px-4 py-3 bg-white border border-gray-100 rounded-xl text-gray-400 font-medium">
                    </div>
                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Slug (URL)</label>
                        <input type="text" value="{{ $service->slug }}" disabled class="w-full px-4 py-3 bg-white border border-gray-100 rounded-xl text-gray-400 font-medium font-mono">
                    </div>
                </div>
            </div>

            {{-- SOP Editor --}}
            <div class="bg-white border border-gray-200 rounded-3xl p-8">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-lg font-bold text-gray-900 border-l-4 border-red-600 pl-4">Langkah-langkah Prosedur</h3>
                    <button type="button" id="add-step" class="px-4 py-2 bg-red-600 text-white rounded-xl text-xs font-bold hover:bg-red-700 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Langkah
                    </button>
                </div>

                <div id="sop-container" class="space-y-6">
                    @php
                        $sopData = old('sop', $service->sop ?? []);
                    @endphp
                    
                    @foreach($sopData as $index => $step)
                        <div class="sop-step group bg-gray-50 rounded-2xl p-6 border border-gray-100 relative" data-index="{{ $index }}">
                            <div class="flex items-start justify-between gap-4 mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="step-number w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center font-bold text-sm">
                                        {{ $index + 1 }}
                                    </div>
                                    <h4 class="font-bold text-gray-900">Langkah <span class="index-num">{{ $index + 1 }}</span></h4>
                                </div>
                                <button type="button" class="remove-step text-gray-400 hover:text-red-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-1 gap-4">
                                <input type="text" name="sop[{{ $index }}][title]" value="{{ $step['title'] ?? '' }}" placeholder="Judul Langkah (Contoh: Login ke Sistem)" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition-all font-bold text-gray-900" required>
                                <textarea name="sop[{{ $index }}][desc]" rows="3" placeholder="Deskripsi detail apa yang harus dilakukan..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition-all text-sm text-gray-600 leading-relaxed" required>{{ $step['desc'] ?? '' }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(count($sopData) == 0)
                    <div id="empty-sop" class="py-12 border-2 border-dashed border-gray-100 rounded-[2rem] text-center">
                        <p class="text-gray-400 italic">Belum ada langkah yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="px-8 py-4 bg-red-600 text-white rounded-2xl font-bold hover:bg-red-700 shadow-lg shadow-red-600/20 transition-all flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Tata Cara
                </button>
            </div>
        </div>
    </form>
</div>

<template id="sop-template">
    <div class="sop-step group bg-gray-50 rounded-2xl p-6 border border-gray-100 relative" data-index="__INDEX__">
        <div class="flex items-start justify-between gap-4 mb-4">
            <div class="flex items-center gap-3">
                <div class="step-number w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center font-bold text-sm">
                    __NUM__
                </div>
                <h4 class="font-bold text-gray-900">Langkah <span class="index-num">__NUM__</span></h4>
            </div>
            <button type="button" class="remove-step text-gray-400 hover:text-red-500 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <input type="text" name="sop[__INDEX__][title]" placeholder="Judul Langkah" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition-all font-bold text-gray-900" required>
            <textarea name="sop[__INDEX__][desc]" rows="3" placeholder="Deskripsi detail..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition-all text-sm text-gray-600 leading-relaxed" required></textarea>
        </div>
    </div>
</template>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('sop-container');
    const addButton = document.getElementById('add-step');
    const template = document.getElementById('sop-template').innerHTML;
    const emptyMsg = document.getElementById('empty-sop');

    function updateNumbers() {
        const steps = container.querySelectorAll('.sop-step');
        steps.forEach((step, index) => {
            const num = index + 1;
            step.querySelector('.step-number').textContent = num;
            step.querySelector('.index-num').textContent = num;
            
            // Update input names
            const inputs = step.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/\[\d+\]/, `[${index}]`));
                }
            });
        });

        if (steps.length > 0 && emptyMsg) {
            emptyMsg.classList.add('hidden');
        } else if (emptyMsg) {
            emptyMsg.classList.remove('hidden');
        }
    }

    addButton.addEventListener('click', function() {
        const index = container.querySelectorAll('.sop-step').length;
        const html = template
            .replace(/__INDEX__/g, index)
            .replace(/__NUM__/g, index + 1);
        
        const div = document.createElement('div');
        div.innerHTML = html;
        container.appendChild(div.firstElementChild);
        updateNumbers();
    });

    container.addEventListener('click', function(e) {
        if (e.target.closest('.remove-step')) {
            e.target.closest('.sop-step').remove();
            updateNumbers();
        }
    });
});
</script>
@endsection
