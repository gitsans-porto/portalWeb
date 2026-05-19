@extends('layouts.app')

@section('title', 'Kirim Karya Mading')

@section('content')

    {{-- ===== HEADER ===== --}}
    <section class="detail-hero" style="min-height: 0; padding-top: 7rem; padding-bottom: 2rem;">
        <div class="detail-hero-bg" style="background-image: url('{{ asset('images/gambarSekolah.jpeg') }}')"></div>
        <div class="detail-hero-overlay"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Breadcrumb --}}
            <nav class="flex items-center justify-center gap-2 text-sm text-white/40 mb-4">
                <a href="{{ route('beranda') }}" class="hover:text-white/70 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <a href="{{ route('mading.index') }}" class="hover:text-white/70 transition-colors">Mading Digital</a>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <span class="text-white/70">Buat Karya</span>
            </nav>

            <div class="flex flex-col items-center text-center">
                <h1 class="text-3xl md:text-4xl font-black text-white mb-3 tracking-tight leading-tight">
                    Buat <span style="color:#fca5a5;">Karya</span> Baru
                </h1>
                <p class="text-sm text-white/70 max-w-xl leading-relaxed">
                    Bagikan tulisan, poster, atau momen serumu ke seluruh warga sekolah.
                </p>
            </div>
        </div>
    </section>

    {{-- ===== FORM & PREVIEW ===== --}}
    <section style="background:white; padding: 60px 0 100px;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div style="display:grid; grid-template-columns: 1fr 400px; gap:60px; align-items: start;">

                {{-- Form Column --}}
                <div style="background:white;">
                    <form action="{{ route('mading.store') }}" method="POST" enctype="multipart/form-data" id="madingForm">
                        @csrf
                        <div style="display:flex; flex-direction:column; gap:32px;">

                            {{-- Identity --}}
                            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:24px;">
                                <div class="input-group">
                                    <label
                                        style="display:block; font-size:0.75rem; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:10px;">
                                        Nama Penulis <span style="color:#ef4444;">*</span>
                                    </label>
                                    <input type="text" name="author_name" id="author_name" value="{{ old('author_name') }}"
                                        required
                                        style="width:100%; padding:14px 18px; border-radius:14px; border:1.5px solid #e2e8f0; font-size:0.95rem; font-weight:600; transition:all 0.2s;"
                                        placeholder="Nama lengkapmu..." oninput="updatePreview()">
                                </div>
                                <div class="input-group">
                                    <label
                                        style="display:block; font-size:0.75rem; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:10px;">
                                        Kelas / Instansi
                                    </label>
                                    <input type="text" name="author_class" id="author_class"
                                        value="{{ old('author_class') }}"
                                        style="width:100%; padding:14px 18px; border-radius:14px; border:1.5px solid #e2e8f0; font-size:0.95rem; font-weight:600; transition:all 0.2s;"
                                        placeholder="Contoh: XII RPL 1" oninput="updatePreview()">
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="input-group">
                                <label
                                    style="display:block; font-size:0.75rem; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:10px;">
                                    Kategori Karya <span style="color:#ef4444;">*</span>
                                </label>
                                <div style="display:flex; flex-wrap:wrap; gap:10px;">
                                    @foreach($categories as $key => $label)
                                        <label style="cursor:pointer; position:relative;">
                                            <input type="radio" name="category" value="{{ $key }}" class="category-radio hidden"
                                                {{ old('category', 'pengumuman') === $key ? 'checked' : '' }}
                                                onchange="updatePreview()">
                                            <div class="category-pill"
                                                style="padding:10px 20px; border-radius:12px; border:1.5px solid #e2e8f0; font-size:0.85rem; font-weight:700; color:#64748b; transition:all 0.2s;">
                                                {{ $label }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="input-group">
                                <label
                                    style="display:block; font-size:0.75rem; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:10px;">
                                    Judul / Topik <span style="color:#ef4444;">*</span>
                                </label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                                    style="width:100%; padding:16px 20px; border-radius:16px; border:1.5px solid #e2e8f0; font-size:1.25rem; font-weight:800; transition:all 0.2s;"
                                    placeholder="Apa yang ingin kamu bagikan?" oninput="updatePreview()">
                                @error('title') <p style="color:#ef4444; font-size:0.75rem; margin-top:8px;">{{ $message }}
                                </p> @enderror
                            </div>

                            {{-- Content --}}
                            <div class="input-group">
                                <label
                                    style="display:block; font-size:0.75rem; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:10px;">
                                    Isi Cerita / Deskripsi <span style="color:#ef4444;">*</span>
                                </label>
                                <textarea name="content" id="content" rows="8" required
                                    style="width:100%; padding:20px; border-radius:16px; border:1.5px solid #e2e8f0; font-size:1rem; line-height:1.6; transition:all 0.2s; resize:vertical;"
                                    placeholder="Tuliskan detail karyamu di sini..."
                                    oninput="updatePreview()">{{ old('content') }}</textarea>
                                @error('content') <p style="color:#ef4444; font-size:0.75rem; margin-top:8px;">
                                {{ $message }}</p> @enderror
                            </div>

                            {{-- Image Upload --}}
                            <div class="input-group">
                                <label
                                    style="display:block; font-size:0.75rem; font-weight:800; color:#1e293b; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:10px;">
                                    Lampiran Gambar <span
                                        style="color:#94a3b8; font-weight:600; text-transform:none;">(Opsional)</span>
                                </label>
                                <div id="dropzone"
                                    style="width:100%; padding:40px; border-radius:20px; border:2px dashed #e2e8f0; background:#f8fafc; text-align:center; transition:all 0.2s; cursor:pointer;"
                                    onmouseenter="this.style.borderColor='#dc2626';this.style.background='#fffafa'"
                                    onmouseleave="this.style.borderColor='#e2e8f0';this.style.background='#f8fafc'">
                                    <input type="file" name="image" id="image" accept="image/*" style="display:none;"
                                        onchange="handleImage(this)">
                                    <div id="uploadPlaceholder">
                                        <svg style="width:40px; height:40px; color:#cbd5e1; margin:0 auto 16px;" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p style="font-size:0.95rem; font-weight:700; color:#475569; margin-bottom:4px;">
                                            Klik atau geser gambar ke sini</p>
                                        <p style="font-size:0.8rem; color:#94a3b8;">PNG, JPG, WebP. Maksimal 3MB.</p>
                                    </div>
                                    <div id="imagePreview" style="display:none; position:relative;">
                                        <img src="" id="previewImg"
                                            style="max-height:200px; border-radius:12px; margin:0 auto;">
                                        <button type="button" onclick="removeImage(event)"
                                            style="position:absolute; top:-10px; right:50%; transform:translateX(100px); background:#ef4444; color:white; border:none; width:24px; height:24px; border-radius:50%; font-size:12px; cursor:pointer; display:flex; align-items:center; justify-content:center;">&times;</button>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                style="width:100%; padding:18px; border-radius:99px; background:#dc2626; color:white; font-weight:800; font-size:1rem; text-transform:uppercase; letter-spacing:0.1em; border:none; cursor:pointer; box-shadow:0 10px 25px -5px rgba(220,38,38,0.4); transition:all 0.3s;"
                                onmouseenter="this.style.transform='translateY(-2px)';this.style.boxShadow='0 15px 30px -5px rgba(220,38,38,0.5)'"
                                onmouseleave="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 25px -5px rgba(220,38,38,0.4)'">
                                Ajukan Sekarang
                            </button>

                        </div>
                    </form>
                </div>

                {{-- Preview Column --}}
                <div style="position:sticky; top:40px;">
                    <div style="margin-bottom:20px; display:flex; align-items:center; gap:8px;">
                        <span
                            style="width:8px; height:8px; border-radius:50%; background:#22c55e; display:inline-block; animation:pulse 2s infinite;"></span>
                        <span
                            style="font-size:0.75rem; font-weight:800; color:#94a3b8; text-transform:uppercase; letter-spacing:0.1em;">Pratinjau
                            Langsung</span>
                    </div>

                    {{-- Preview Card (Social Media Style) --}}
                    <div
                        style="background:white; border-radius:24px; overflow:hidden; border:1px solid #f1f5f9; box-shadow:0 10px 30px rgba(0,0,0,0.05); transition:all 0.3s;">
                        <div id="previewCardImage"
                            style="width:100%; height:200px; background:linear-gradient(135deg,#f1f5f9,#e2e8f0); display:flex; align-items:center; justify-content:center; overflow:hidden;">
                            <svg id="previewImagePlaceholder" style="width:48px; height:48px; color:rgba(0,0,0,0.05);"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <img src="" id="previewCardImg"
                                style="width:100%; height:100%; object-fit:cover; display:none;">
                        </div>
                        <div style="padding:24px;">
                            <span id="previewCategory"
                                style="background:#fee2e2; color:#dc2626; padding:4px 12px; border-radius:10px; font-size:0.65rem; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:12px; display:inline-block;">
                                Pengumuman
                            </span>
                            <h3 id="previewTitle"
                                style="font-size:1.15rem; font-weight:800; color:#1e293b; margin:0 0 10px; line-height:1.3; height:3rem; overflow:hidden;">
                                Judul karyamu muncul di sini...
                            </h3>
                            <p id="previewContent"
                                style="font-size:0.9rem; color:#64748b; line-height:1.5; margin:0 0 20px; height:2.7rem; overflow:hidden;">
                                Detail ceritamu akan terlihat di sini sebagai ringkasan...
                            </p>
                            <div
                                style="display:flex; align-items:center; gap:12px; padding-top:16px; border-top:1px solid #f1f5f9;">
                                <div style="width:32px; height:32px; border-radius:10px; background:linear-gradient(135deg,#dc2626,#ef4444); display:flex; align-items:center; justify-content:center; color:white; font-size:0.8rem; font-weight:900;"
                                    id="previewAvatar">
                                    ?
                                </div>
                                <div>
                                    <div id="previewAuthor" style="font-size:0.8rem; font-weight:800; color:#1e293b;">Nama
                                        Penulis</div>
                                    <div id="previewClass" style="font-size:0.7rem; color:#94a3b8;">Kelas / Instansi</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        style="margin-top:24px; padding:20px; background:#f0fdf4; border-radius:16px; border:1px solid #dcfce7;">
                        <div style="display:flex; gap:12px;">
                            <svg style="width:20px; height:20px; color:#16a34a; flex-shrink:0;" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p style="font-size:0.8rem; color:#166534; line-height:1.5; margin:0;">
                                <strong>Informasi:</strong> Postinganmu akan melalui tahap kurasi oleh admin sebelum
                                ditampilkan secara publik. Kamu akan mendapatkan notifikasi jika sudah live.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .category-radio:checked+.category-pill {
            border-color: #dc2626;
            background: #fee2e2;
            color: #dc2626;
        }

        .hidden {
            display: none;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.5;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>

    @push('scripts')
        <script>
            const categories = @json($categories);

            function updatePreview() {
                const title = document.getElementById('title').value;
                const content = document.getElementById('content').value;
                const author = document.getElementById('author_name').value;
                const className = document.getElementById('author_class').value;
                const categoryKey = document.querySelector('input[name="category"]:checked')?.value;

                document.getElementById('previewTitle').innerText = title || 'Judul karyamu muncul di sini...';
                document.getElementById('previewContent').innerText = content || 'Detail ceritamu akan terlihat di sini sebagai ringkasan...';
                document.getElementById('previewAuthor').innerText = author || 'Nama Penulis';
                document.getElementById('previewClass').innerText = className || 'Kelas / Instansi';
                document.getElementById('previewAvatar').innerText = (author ? author.charAt(0).toUpperCase() : '?');
                document.getElementById('previewCategory').innerText = categories[categoryKey] || 'Kategori';
            }

            function handleImage(input) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('uploadPlaceholder').style.display = 'none';
                        document.getElementById('imagePreview').style.display = 'block';
                        document.getElementById('previewImg').src = e.target.result;

                        document.getElementById('previewImagePlaceholder').style.display = 'none';
                        document.getElementById('previewCardImg').style.display = 'block';
                        document.getElementById('previewCardImg').src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function removeImage(e) {
                e.stopPropagation();
                document.getElementById('image').value = '';
                document.getElementById('uploadPlaceholder').style.display = 'block';
                document.getElementById('imagePreview').style.display = 'none';

                document.getElementById('previewImagePlaceholder').style.display = 'block';
                document.getElementById('previewCardImg').style.display = 'none';
                document.getElementById('previewCardImg').src = '';
            }

            document.getElementById('dropzone').onclick = () => document.getElementById('image').click();

            // Initial call
            updatePreview();
        </script>
    @endpush


@endsection