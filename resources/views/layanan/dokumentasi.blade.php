@extends('layouts.app')

@section('title', 'Dokumentasi ' . $layanan->name)

@section('content')

    {{-- ======== BREADCRUMB & HEADER ======== --}}
    <div class="bg-gray-900 pt-24 pb-12 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/stock_service.png') }}" class="w-full h-full object-cover opacity-20" alt="Background">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/90 to-gray-900/70"></div>
        </div>
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <nav class="flex justify-center items-center gap-2 text-sm text-white/60 mb-6">
                <a href="{{ route('layanan.detail', $layanan->slug) }}" class="hover:text-white transition-colors">{{ $layanan->name }}</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white font-medium">Dokumentasi</span>
            </nav>
            
            <h1 class="text-3xl sm:text-4xl font-black text-white mb-4">Panduan Penggunaan {{ $layanan->name }}</h1>
            <p class="text-white/70 text-lg">Pelajari cara mengakses dan memanfaatkan seluruh fitur layanan dengan mudah.</p>
        </div>
    </div>

    {{-- ======== PANDUAN / FAQ TABS ======== --}}
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Tabs Control --}}
            <div class="flex border-b border-gray-200 mb-10 overflow-x-auto hide-scrollbar">
                <button onclick="switchTab('panduan')" id="btn-panduan" class="whitespace-nowrap py-4 px-6 text-sm font-semibold border-b-2 border-primary text-primary transition-colors focus:outline-none">
                    Tata Cara Penggunaan
                </button>
                <button onclick="switchTab('faq')" id="btn-faq" class="whitespace-nowrap py-4 px-6 text-sm font-semibold border-b-2 border-transparent text-gray-500 hover:text-gray-700 transition-colors focus:outline-none">
                    FAQ (Tanya Jawab)
                </button>
            </div>

            {{-- ===== TAB: PANDUAN ===== --}}
            <div id="content-panduan">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Buku Panduan</h2>
                </div>

                @php
                    // Flatten the document structure to easily map Next/Previous buttons (Leaf nodes only)
                    $flatDocs = [];
                    foreach($layanan->sop ?? [] as $index => $step) {
                        $hasSubChapters = isset($step['sub_chapters']) && count($step['sub_chapters']) > 0;
                        if (!$hasSubChapters) {
                            $flatDocs[] = [
                                'id' => (string)$index,
                                'title' => $step['title'],
                                'desc' => $step['desc'] ?? '',
                                'is_parent' => false
                            ];
                        } else {
                            foreach($step['sub_chapters'] as $subIndex => $subStep) {
                                $flatDocs[] = [
                                    'id' => $index . '-' . $subIndex,
                                    'title' => $subStep['title'],
                                    'desc' => $subStep['desc'] ?? '',
                                    'parent_id' => (string)$index
                                ];
                            }
                        }
                    }
                    
                    $firstDocId = count($flatDocs) > 0 ? $flatDocs[0]['id'] : null;
                @endphp

                {{-- Sidebar Layout --}}
                <div class="flex flex-col md:flex-row gap-8">
                    {{-- Sidebar Nav --}}
                    <aside class="w-full md:w-1/4 flex-shrink-0">
                        <div class="sticky top-24 bg-gray-50 border border-gray-100 rounded-2xl p-4">
                            <h3 class="font-bold text-gray-900 mb-4 px-2 uppercase tracking-widest text-xs">Daftar Isi</h3>
                            <ul class="space-y-1" id="doc-sidebar">
                                @foreach($layanan->sop ?? [] as $index => $step)
                                    <li>
                                        @if(isset($step['sub_chapters']) && count($step['sub_chapters']) > 0)
                                            @php
                                                $isParentOfFirst = false;
                                                foreach($step['sub_chapters'] as $subIndex => $subStep) {
                                                    if ($firstDocId === $index . '-' . $subIndex) {
                                                        $isParentOfFirst = true;
                                                    }
                                                }
                                            @endphp
                                            <button onclick="toggleDocDropdown('{{ $index }}')" id="link-parent-{{ $index }}" class="doc-link-parent w-full text-left px-3 py-2.5 rounded-xl text-sm font-bold transition-all flex items-center justify-between text-gray-800 hover:bg-gray-100 border border-transparent">
                                                {{ $step['title'] }}
                                                <svg id="icon-dropdown-{{ $index }}" class="w-4 h-4 transform transition-transform {{ $isParentOfFirst ? 'rotate-180' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>
                                            <ul id="dropdown-{{ $index }}" class="ml-3 mt-1 pl-3 border-l border-gray-200 space-y-1 {{ $isParentOfFirst ? '' : 'hidden' }}">
                                                @foreach($step['sub_chapters'] as $subIndex => $subStep)
                                                    @php $curId = $index . '-' . $subIndex; @endphp
                                                    <li>
                                                        <button onclick="showDocStep('{{ $curId }}')" id="link-step-{{ $curId }}" class="doc-link w-full text-left px-3 py-2 rounded-lg text-sm font-medium transition-all {{ $firstDocId === $curId ? 'bg-white shadow-sm border border-gray-200 text-primary' : 'text-gray-500 hover:text-gray-900 border border-transparent' }}">
                                                            {{ $subStep['title'] }}
                                                        </button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <button onclick="showDocStep('{{ $index }}')" id="link-step-{{ $index }}" class="doc-link w-full text-left px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ $firstDocId === (string)$index ? 'bg-white shadow-sm border border-gray-200 text-primary' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 border border-transparent' }}">
                                                {{ $step['title'] }}
                                            </button>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    {{-- Main Content --}}
                    <div class="w-full md:w-3/4 min-h-[500px]">
                        @foreach($flatDocs as $fIndex => $doc)
                            <div id="doc-step-{{ $doc['id'] }}" class="doc-content {{ $fIndex !== 0 ? 'hidden' : 'animate-fade-in' }}">
                                <h1 class="text-3xl font-extrabold text-gray-900 mb-6">{{ $doc['title'] }}</h1>
                                <div class="text-gray-600 leading-relaxed ql-editor !p-0">
                                    {!! $doc['desc'] !!}
                                </div>
                                
                                {{-- Navigation Buttons --}}
                                <div class="flex items-center justify-between mt-16 pt-6 border-t border-gray-100">
                                    @if($fIndex > 0)
                                        <button onclick="showDocStep('{{ $flatDocs[$fIndex - 1]['id'] }}')" class="flex flex-col items-start gap-1 group">
                                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest group-hover:text-primary transition-colors">Sebelumnya</span>
                                            <span class="text-sm font-semibold text-gray-600 group-hover:text-gray-900 flex items-center gap-2 transition-colors">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                </svg>
                                                {{ $flatDocs[$fIndex - 1]['title'] }}
                                            </span>
                                        </button>
                                    @else
                                        <div></div>
                                    @endif
                                    
                                    @if($fIndex < count($flatDocs) - 1)
                                        <button onclick="showDocStep('{{ $flatDocs[$fIndex + 1]['id'] }}')" class="flex flex-col items-end gap-1 group text-right">
                                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest group-hover:text-primary transition-colors">Selanjutnya</span>
                                            <span class="text-sm font-semibold text-gray-600 group-hover:text-gray-900 flex items-center gap-2 transition-colors">
                                                {{ $flatDocs[$fIndex + 1]['title'] }}
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        
                        @if(empty($flatDocs))
                            <div class="text-center py-12">
                                <p class="text-gray-500">Belum ada panduan untuk layanan ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ===== TAB: FAQ ===== --}}
            <div id="content-faq" style="display: none;">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Pertanyaan yang Sering Diajukan</h2>

                {{-- FAQ Accordion --}}
                <div class="space-y-4">
                    @php
                        $defaultFaqList = [
                            [
                                'q' => 'Siapa saja yang bisa mengakses layanan ' . $layanan->name . '?',
                                'a' => 'Layanan ini dapat diakses oleh ' . implode(', ', $layanan->audiences ?? ['pengguna terdaftar']) . '. Pastikan Anda sudah memiliki akun yang aktif dan telah terdaftar oleh administrator sekolah.',
                            ],
                            [
                                'q' => 'Apa yang harus dilakukan jika lupa password?',
                                'a' => 'Hubungi operator atau administrator sekolah melalui ruang Tata Usaha. Anda juga dapat menggunakan fitur "Laporkan Kendala" di portal ini agar permintaan reset password Anda tercatat secara resmi dan diproses sesuai antrian.',
                            ],
                            [
                                'q' => 'Apakah layanan ini bisa diakses dari smartphone?',
                                'a' => 'Ya, layanan ' . $layanan->name . ' dapat diakses melalui browser di smartphone maupun laptop/komputer. Pastikan koneksi internet Anda stabil untuk pengalaman terbaik.',
                            ],
                            [
                                'q' => 'Bagaimana jika layanan tidak bisa dibuka atau mengalami error?',
                                'a' => 'Pertama, coba muat ulang halaman atau bersihkan cache browser Anda. Jika masalah berlanjut, segera buat laporan melalui tombol "Laporkan Kendala" di portal ini agar tim IT sekolah dapat menangani masalah Anda.',
                            ],
                            [
                                'q' => 'Di mana saya bisa mendapatkan bantuan lebih lanjut?',
                                'a' => 'Anda dapat menghubungi operator sekolah di ruang Tata Usaha pada jam kerja (Senin–Jumat, 08.00–16.00 WITA). Alternatifnya, gunakan fitur "Laporkan Kendala" yang tersedia di halaman ini.',
                            ],
                        ];
                        
                        $faqList = !empty($layanan->faq) ? $layanan->faq : $defaultFaqList;
                    @endphp

                    @foreach($faqList as $faqIndex => $faq)
                        <div class="faq-item border border-gray-200 rounded-2xl overflow-hidden bg-white hover:border-gray-300 transition-colors">
                            <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left focus:outline-none" onclick="toggleFaq({{ $faqIndex }})">
                                <span class="font-semibold text-gray-900 text-lg">{{ $faq['q'] }}</span>
                                <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center transition-transform duration-300">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-answer hidden px-6 pb-6 pt-2">
                                <div class="w-12 h-1 bg-{{ $layanan->color }}-200 mb-4 rounded-full"></div>
                                <p class="text-gray-600 leading-relaxed">{{ $faq['a'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
<script>
    function switchTab(tab) {
        const panduan = document.getElementById('content-panduan');
        const faq = document.getElementById('content-faq');
        const btnPanduan = document.getElementById('btn-panduan');
        const btnFaq = document.getElementById('btn-faq');

        if (tab === 'panduan') {
            panduan.style.display = 'block';
            faq.style.display = 'none';
            btnPanduan.classList.add('border-primary', 'text-primary');
            btnPanduan.classList.remove('border-transparent', 'text-gray-500');
            btnFaq.classList.remove('border-primary', 'text-primary');
            btnFaq.classList.add('border-transparent', 'text-gray-500');
        } else {
            panduan.style.display = 'none';
            faq.style.display = 'block';
            btnFaq.classList.add('border-primary', 'text-primary');
            btnFaq.classList.remove('border-transparent', 'text-gray-500');
            btnPanduan.classList.remove('border-primary', 'text-primary');
            btnPanduan.classList.add('border-transparent', 'text-gray-500');
        }
    }

    function toggleDocDropdown(index) {
        const dropdown = document.getElementById(`dropdown-${index}`);
        const icon = document.getElementById(`icon-dropdown-${index}`);
        if(dropdown && icon) {
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    }

    function showDocStep(id) {
        // Automatically open parent dropdown if it's a sub-step
        if (id.includes('-')) {
            const parentIndex = id.split('-')[0];
            const dropdown = document.getElementById(`dropdown-${parentIndex}`);
            const icon = document.getElementById(`icon-dropdown-${parentIndex}`);
            if(dropdown && dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                if(icon) icon.classList.add('rotate-180');
            }
        }

        // Hide all contents
        const contents = document.querySelectorAll('.doc-content');
        contents.forEach(content => {
            content.classList.add('hidden');
            content.classList.remove('animate-fade-in');
        });

        // Show selected content
        const selectedContent = document.getElementById(`doc-step-${id}`);
        if (selectedContent) {
            selectedContent.classList.remove('hidden');
            // Trigger reflow for animation
            void selectedContent.offsetWidth;
            selectedContent.classList.add('animate-fade-in');
        }

        // Update active state on sidebar links
        const links = document.querySelectorAll('.doc-link');
        links.forEach(link => {
            if (link.id.includes('-') || !link.nextElementSibling || link.nextElementSibling.tagName !== 'UL') {
                // Leaf nodes
                link.classList.remove('bg-white', 'shadow-sm', 'border-gray-200', 'text-primary');
                link.classList.add('text-gray-600', 'hover:bg-gray-100', 'hover:text-gray-900', 'border-transparent');
            } else {
                // Parent nodes
                link.classList.remove('bg-white', 'shadow-sm', 'border-gray-200', 'text-primary');
                link.classList.add('text-gray-800', 'hover:bg-gray-100', 'border-transparent');
            }
        });

        const selectedLink = document.getElementById(`link-step-${id}`);
        if (selectedLink) {
            if (selectedLink.id.includes('-') || !selectedLink.nextElementSibling || selectedLink.nextElementSibling.tagName !== 'UL') {
                selectedLink.classList.remove('text-gray-600', 'hover:bg-gray-100', 'hover:text-gray-900', 'border-transparent');
            } else {
                selectedLink.classList.remove('text-gray-800', 'hover:bg-gray-100', 'border-transparent');
            }
            selectedLink.classList.add('bg-white', 'shadow-sm', 'border-gray-200', 'text-primary');
        }
        
        // Scroll to top of content on mobile
        if(window.innerWidth < 768) {
            document.getElementById('content-panduan').scrollIntoView({behavior: 'smooth', block: 'start'});
        }
    }

    let openFaqIndex = null;
    function toggleFaq(index) {
        const items = document.querySelectorAll('.faq-item');
        const clickedItem = items[index];
        const answer = clickedItem.querySelector('.faq-answer');
        const icon = clickedItem.querySelector('.faq-icon');
        const isHidden = answer.classList.contains('hidden');

        // Close currently open FAQ
        if (openFaqIndex !== null && openFaqIndex !== index) {
            const prevItem = items[openFaqIndex];
            prevItem.querySelector('.faq-answer').classList.add('hidden');
            prevItem.querySelector('.faq-icon').classList.remove('rotate-180');
        }

        // Toggle clicked FAQ
        if (isHidden) {
            answer.classList.remove('hidden');
            icon.classList.add('rotate-180');
            openFaqIndex = index;
        } else {
            answer.classList.add('hidden');
            icon.classList.remove('rotate-180');
            openFaqIndex = null;
        }
    }
</script>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    
    /* TinyMCE Content Styles */
    .tinymce-content ul { list-style-type: disc; padding-left: 1.5rem; margin-top: 0.5rem; margin-bottom: 0.5rem; }
    .tinymce-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-top: 0.5rem; margin-bottom: 0.5rem; }
    .tinymce-content p { margin-bottom: 0.5rem; }
    .tinymce-content a { color: #2563eb; text-decoration: underline; font-weight: 600; transition: color 0.15s ease-in-out; }
    .tinymce-content a:hover { color: #1d4ed8; text-decoration: none; }
    .tinymce-content img { border-radius: 0.5rem; max-width: 100%; height: auto; margin: 0.5rem 0; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); }

    /* Quill Editor Content Styles */
    .ql-editor ul { list-style-type: disc !important; padding-left: 1.5rem !important; margin-top: 0.5rem !important; margin-bottom: 0.5rem !important; }
    .ql-editor { counter-reset: ql-ol-counter; }
    .ql-editor ol { list-style-type: none !important; padding-left: 1.5rem !important; margin-top: 0.5rem !important; margin-bottom: 0.5rem !important; counter-reset: none !important; }
    .ql-editor ol li:not([class*="ql-indent-"]) { counter-increment: ql-ol-counter; }
    .ql-editor ol li:not([class*="ql-indent-"])::before { content: counter(ql-ol-counter) ". " !important; display: inline-block !important; white-space: nowrap !important; width: 1.5em !important; margin-left: -1.5em !important; margin-right: 0.3em !important; text-align: right !important; font-weight: bold !important; }
    .ql-editor p { margin-bottom: 0.5rem !important; }
    .ql-editor a { color: #2563eb !important; text-decoration: underline !important; font-weight: 600 !important; transition: color 0.15s ease-in-out !important; }
    .ql-editor a:hover { color: #1d4ed8 !important; text-decoration: none !important; }
    .ql-editor img { border-radius: 0.5rem !important; max-width: 100% !important; height: auto !important; margin: 0.5rem 0 !important; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06) !important; }
</style>
@endpush
