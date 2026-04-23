@extends('layouts.admin')

@section('title', 'Laporan Masalah')

@section('content')
    <div class="reveal">
        {{-- Header Area --}}
        <div class="mb-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Laporan Masalah</h1>
                <p class="text-gray-500 text-sm mt-1">Pantau dan kelola laporan kendala teknis dari pengguna.</p>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400">Pelapor</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400">Layanan & Kategori</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400 text-center">Status</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400 text-center">Tanggal</th>
                            <th class="px-8 py-5 text-[0.65rem] font-black uppercase tracking-widest text-gray-400 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($reports as $report)
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-8 py-5">
                                    <div class="font-bold text-gray-900 mb-0.5">{{ $report->full_name }}</div>
                                    <div class="text-[10px] font-black uppercase tracking-widest text-gray-400">
                                        {{ $report->role }} {{ $report->class_nip ? '— ' . $report->class_nip : '' }}
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="font-bold text-gray-900 mb-1 group-hover:text-red-600 transition-colors">
                                        {{ $report->service ? $report->service->name : 'Umum / Lainnya' }}
                                    </div>
                                    <span class="text-[10px] font-black uppercase tracking-widest px-2 py-0.5 rounded-md bg-gray-100 text-gray-600">
                                        {{ $report->category }}
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-amber-50 text-amber-600',
                                            'in_progress' => 'bg-blue-50 text-blue-600',
                                            'resolved' => 'bg-emerald-50 text-emerald-600',
                                        ];
                                        $statusLabels = [
                                            'pending' => 'Tertunda',
                                            'in_progress' => 'Diproses',
                                            'resolved' => 'Selesai',
                                        ];
                                    @endphp
                                    <span class="text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full {{ $statusClasses[$report->status] ?? 'bg-gray-50 text-gray-600' }}">
                                        {{ $statusLabels[$report->status] ?? $report->status }}
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <div class="text-sm font-medium text-gray-600">
                                        {{ $report->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-[10px] text-gray-400 uppercase font-bold mt-0.5">
                                        {{ $report->created_at->format('H:i') }}
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.reports.show', $report->id) }}" class="p-2 rounded-xl bg-gray-50 text-gray-400 hover:bg-red-50 hover:text-red-600 transition-all" title="Detail">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-200 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        <p class="text-gray-400 font-bold">Belum ada laporan masalah yang masuk.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($reports->hasPages())
                <div class="px-8 py-6 border-t border-gray-50">
                    {{ $reports->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
