@php
    $services = \App\Models\Service::select('id', 'name')->get();
@endphp

{{-- Floating Button Link to Pusat Pengaduan --}}
<a href="{{ route('pengaduan.index') }}" class="fixed bottom-6 right-6 w-14 h-14 bg-[#FE0002] text-white rounded-full shadow-lg hover:bg-[#CC0001] transition-all duration-300 z-[999] flex items-center justify-center group" title="Pusat Pengaduan & Aspirasi">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
    </svg>
    {{-- Tooltip text for desktop --}}
    <span class="absolute right-16 bg-gray-900 text-white text-[10px] font-bold py-1.5 px-3 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap uppercase tracking-widest">Pusat Pengaduan</span>
</a>


