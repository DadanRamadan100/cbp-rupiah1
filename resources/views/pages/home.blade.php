
@extends('layouts.app')

@section('title', 'Beranda - Jelajah Rupiah AR')

@section('content')

<section class="hero">
    <div class="hero-content">
        <div class="hero-label">
            <span>✦</span> EDUKASI PELAJAR SD & SMP
        </div>

        <h1>
            Kenali Rupiah Lebih Dekat dengan
            <span>Augmented Reality</span>
        </h1>

        <p>
            Arahkan kamera ke uang kertas Rupiah untuk melihat cerita
            pahlawan, ciri keaslian 3D, dan belajar mengelola uang
            secara bijak bersama gerakan Cinta, Bangga, Paham Rupiah.
        </p>

        <div class="hero-buttons">
            <a href="{{ route('scan') }}" class="btn">
                ◉ Buka Kamera AR
            </a>

            <a href="{{ route('learning') }}" class="btn btn-outline">
                Jelajahi Modul & Kuis →
            </a>
        </div>

        <div class="hero-info">
            <div>
                <strong>3 Pilar</strong>
                <small>Pembelajaran</small>
            </div>
            <div>
                <strong>Interaktif</strong>
                <small>Belajar AR</small>
            </div>
            <div>
                <strong>100%</strong>
                <small>Media Edukasi</small>
            </div>
        </div>
    </div>

    <div class="hero-visual">
        <div class="visual-glow"></div>

        <div class="rupiah-card">
            <div class="rupiah-top">
                <span>BANK INDONESIA</span>
                <span>2022</span>
            </div>

            <div class="rupiah-symbol">🇮🇩</div>

            <div class="rupiah-value">100.000</div>
            <div class="rupiah-label">SERATUS RIBU RUPIAH</div>

            <div class="rupiah-bottom">
                <span>REPUBLIK INDONESIA</span>
                <span>✦ ✦ ✦</span>
            </div>
        </div>

        <div class="scan-badge">
            <span>✦</span>
            <div>
                <strong>AR READY</strong>
                <small>Jelajahi Rupiah</small>
            </div>
        </div>

        <div class="floating-badge">
            <span>✓</span> Belajar Interaktif
        </div>
    </div>
</section>

<section class="container pillars-section">

    <div class="section-heading">
        <span class="eyebrow">MISI PEMBELAJARAN</span>
        <h2 class="section-title">Tiga Pilar Belajar Rupiah</h2>
        <p class="section-subtitle">
            Setiap misi dirancang agar kamu tidak hanya hafal nominalnya,
            tetapi juga mengerti cara menjaga, membanggakan, dan
            membelanjakan Rupiah.
        </p>
    </div>

    <div class="pillar-grid">

        <article class="pillar-card">
            <div class="pillar-icon icon-red">♡</div>
            <span class="pillar-number">PILAR 01</span>
            <h3>Cinta Rupiah</h3>
            <h4>Kenali, Rawat, dan Jaga</h4>
            <p>
                Periksa keaslian uang lewat pemindaian AR
                Dilihat, Diraba, Diterawang serta biasakan
                prinsip 5 Jangan agar uang tetap rapi.
            </p>
            <a href="{{ route('scan') }}">Cek Keaslian AR →</a>
        </article>

        <article class="pillar-card">
            <div class="pillar-icon icon-gold">★</div>
            <span class="pillar-number">PILAR 02</span>
            <h3>Bangga Rupiah</h3>
            <h4>Simbol Kedaulatan Bangsa</h4>
            <p>
                Temukan kisah pahlawan nasional, tarian daerah,
                dan keindahan alam Indonesia yang muncul
                dalam animasi 3D di atas lembaran Rupiah.
            </p>
            <a href="{{ route('learning') }}">Buka Kisah Budaya →</a>
        </article>

        <article class="pillar-card">
            <div class="pillar-icon icon-teal">◎</div>
            <span class="pillar-number">PILAR 03</span>
            <h3>Paham Rupiah</h3>
            <h4>Belanja, Menabung, Berbagi</h4>
            <p>
                Latih kemampuan membedakan kebutuhan dan
                keinginan melalui simulasi uang saku
                serta tantangan kuis interaktif.
            </p>
            <a href="{{ route('learning') }}">Latihan Mengelola →</a>
        </article>

    </div>
</section>

<section class="ar-section">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow">PENGALAMAN AR</span>
            <h2 class="section-title">Cara Kerja AR</h2>
            <p class="section-subtitle">
                Cukup gunakan peramban ponsel atau laptop
                tanpa perlu mengunduh aplikasi tambahan.
            </p>
        </div>

        <div class="steps-grid">

            <div class="step-card">
                <div class="step-icon">📷</div>
                <span>LANGKAH 01</span>
                <h3>Arahkan Kamera</h3>
                <p>
                    Posisikan lembaran Rupiah di dalam
                    bingkai pemindai layar.
                </p>
            </div>

            <div class="step-card">
                <div class="step-icon">🧊</div>
                <span>LANGKAH 02</span>
                <h3>Sentuh Titik 3D</h3>
                <p>
                    Ketuk penanda AR untuk memutar
                    dan melihat detail pengaman.
                </p>
            </div>

            <div class="step-card">
                <div class="step-icon">🏆</div>
                <span>LANGKAH 03</span>
                <h3>Raih Lencana</h3>
                <p>
                    Selesaikan kuis singkat untuk
                    membuka gelar Duta Rupiah Muda.
                </p>
            </div>

        </div>

        <div class="ar-cta">
            <div>
                <h2>Siap Menjelajahi Rupiah?</h2>
                <p>Mulai petualangan belajar Rupiah sekarang!</p>
            </div>

            <a href="{{ route('scan') }}" class="btn">
                Mulai Scan AR →
            </a>
        </div>
    </div>
</section>

@endsection
