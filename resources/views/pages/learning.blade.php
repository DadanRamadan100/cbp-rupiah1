
@extends('layouts.app')

@section('title', 'Modul Belajar - Jelajah Rupiah AR')

@section('content')

<section class="container learning-section">

    <div class="learning-hero">
        <span class="eyebrow">PUSAT PEMBELAJARAN RUPIAH</span>
        <h1 class="section-title">Jelajahi Dunia Rupiah!</h1>
        <p>
            Pelajari cara mencintai, membanggakan, dan memahami
            Rupiah melalui tiga modul pembelajaran interaktif.
        </p>
    </div>

    <div class="learning-grid">

        <article class="learning-card">
            <div class="learning-image learning-red">
                <span>♡</span>
                <small>MODUL 01</small>
            </div>

            <div class="learning-content">
                <span class="module-label">CINTA RUPIAH</span>
                <h2>Kenali dan Rawat Rupiah</h2>
                <p>
                    Pelajari ciri keaslian uang Rupiah dan
                    cara merawat uang agar tetap terjaga.
                </p>

                <h4>Materi pembelajaran:</h4>
                <ul>
                    <li>Ciri keaslian uang Rupiah</li>
                    <li>Metode 3D: Dilihat, Diraba, Diterawang</li>
                    <li>Prinsip 5 Jangan</li>
                </ul>

                <a href="{{ route('scan') }}" class="btn">
                    Pelajari Sekarang →
                </a>
            </div>
        </article>

        <article class="learning-card">
            <div class="learning-image learning-gold">
                <span>★</span>
                <small>MODUL 02</small>
            </div>

            <div class="learning-content">
                <span class="module-label">BANGGA RUPIAH</span>
                <h2>Rupiah Simbol Bangsa</h2>
                <p>
                    Kenali kekayaan budaya dan identitas
                    Indonesia yang terdapat pada uang Rupiah.
                </p>

                <h4>Materi pembelajaran:</h4>
                <ul>
                    <li>Pahlawan nasional pada Rupiah</li>
                    <li>Keindahan budaya Indonesia</li>
                    <li>Rupiah sebagai simbol kedaulatan</li>
                </ul>

                <a href="#budaya" class="btn">
                    Pelajari Sekarang →
                </a>
            </div>
        </article>

        <article class="learning-card">
            <div class="learning-image learning-teal">
                <span>◎</span>
                <small>MODUL 03</small>
            </div>

            <div class="learning-content">
                <span class="module-label">PAHAM RUPIAH</span>
                <h2>Bijak Mengelola Uang</h2>
                <p>
                    Belajar menggunakan uang secara bijak,
                    menabung, dan menentukan prioritas.
                </p>

                <h4>Materi pembelajaran:</h4>
                <ul>
                    <li>Membedakan kebutuhan dan keinginan</li>
                    <li>Mengelola uang saku</li>
                    <li>Menabung dan berbagi</li>
                </ul>

                <a href="{{ route('quiz') }}" class="btn">
                    Uji Pengetahuan →
                </a>
            </div>
        </article>

    </div>

    <section class="learning-cta" id="budaya">
        <div>
            <span class="eyebrow">LANJUTKAN PETUALANGANMU</span>
            <h2>Sudah Siap Menguji Pengetahuan?</h2>
            <p>
                Selesaikan pembelajaran dan kerjakan kuis
                untuk mengetahui seberapa jauh kamu memahami Rupiah.
            </p>
        </div>

        <a href="{{ route('quiz') }}" class="btn">
            Mulai Kuis →
        </a>
    </section>

</section>

@endsection
