<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panduan - {{ $layanan->name }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #e53e3e;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #e53e3e;
            margin: 0 0 10px 0;
            font-size: 28px;
        }
        .header p {
            color: #666;
            margin: 0;
            font-size: 14px;
        }
        .section-title {
            color: #2d3748;
            border-left: 4px solid #e53e3e;
            padding-left: 10px;
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 20px;
        }
        .step-container {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        .step-title {
            font-weight: bold;
            font-size: 16px;
            color: #1a202c;
            margin-bottom: 10px;
            background-color: #f7fafc;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #edf2f7;
        }
        .step-content {
            padding-left: 10px;
            font-size: 14px;
            color: #4a5568;
        }
        /* Ensure tinymce HTML renders well */
        .step-content ul, .step-content ol {
            margin-top: 5px;
            margin-bottom: 5px;
            padding-left: 20px;
        }
        .step-content img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
        }
        .step-content p {
            margin-top: 0;
            margin-bottom: 10px;
        }
        .step-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        .step-content table, .step-content th, .step-content td {
            border: 1px solid #cbd5e0;
        }
        .step-content th, .step-content td {
            padding: 8px;
            text-align: left;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #a0aec0;
            border-top: 1px solid #edf2f7;
            padding-top: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>{{ $layanan->name }}</h1>
        <p>{{ $layanan->tagline }}</p>
    </div>

    <div class="content">
        @if(!empty($layanan->long_description))
            <div style="margin-bottom: 30px; font-size: 14px; color: #4a5568;">
                {{ $layanan->long_description }}
            </div>
        @endif

        <h2 class="section-title">Tata Cara Penggunaan</h2>

        @if(!empty($layanan->sop) && count($layanan->sop) > 0)
            @foreach($layanan->sop as $index => $step)
                <div class="step-container">
                    <div class="step-title">
                        Langkah {{ $index + 1 }}: {{ $step['title'] }}
                    </div>
                    <div class="step-content">
                        {!! $step['desc'] !!}
                    </div>
                </div>
            @endforeach
        @else
            <p>Belum ada panduan tata cara untuk layanan ini.</p>
        @endif
    </div>

    <div class="footer">
        Dicetak otomatis dari Portal Layanan Informasi Sekolah SMKN 1 Limboto<br>
        Tanggal Cetak: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}
    </div>

</body>
</html>
