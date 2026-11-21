
@extends('layouts.app')

@section('title', 'Kuis - Jelajah Rupiah AR')

@section('content')

<section class="container quiz-section">

    <div class="quiz-heading">
        <span class="eyebrow">UJI PENGETAHUANMU</span>
        <h1 class="section-title">Kuis Cinta, Bangga, Paham Rupiah</h1>
        <p class="section-subtitle">
            Jawab lima pertanyaan berikut dan buktikan
            seberapa baik kamu mengenal Rupiah.
        </p>
    </div>

    @if(session('score') !== null)
        <div class="score-result">
            <span class="score-icon">🏆</span>
            <h2>Kuis Selesai!</h2>
            <p>Nilai yang kamu peroleh:</p>
            <strong>{{ session('score') }}/100</strong>

            <p>
                @if(session('score') == 100)
                    Luar biasa! Kamu sangat memahami Rupiah.
                @elseif(session('score') >= 60)
                    Bagus! Terus tingkatkan pengetahuanmu.
                @else
                    Jangan menyerah. Yuk, belajar Rupiah lagi!
                @endif
            </p>
        </div>
    @endif

    @if($errors->any())
        <div class="quiz-error">
            Pastikan semua pertanyaan sudah dijawab.
        </div>
    @endif

    <form action="{{ route('quiz.submit') }}" method="POST">
        @csrf

        <div class="question-card">
            <span class="question-number">PERTANYAAN 01</span>
            <h3>Apa kepanjangan dari CBP Rupiah?</h3>

            <label class="answer-option">
                <input type="radio" name="q1" value="a"
                    {{ old('q1') == 'a' ? 'checked' : '' }} required>
                Cinta, Belajar, Peduli Rupiah
            </label>

            <label class="answer-option">
                <input type="radio" name="q1" value="b"
                    {{ old('q1') == 'b' ? 'checked' : '' }}>
                Cinta, Bangga, Paham Rupiah
            </label>

            <label class="answer-option">
                <input type="radio" name="q1" value="c"
                    {{ old('q1') == 'c' ? 'checked' : '' }}>
                Cerdas, Bijak, Pintar Rupiah
            </label>
        </div>

        <div class="question-card">
            <span class="question-number">PERTANYAAN 02</span>
            <h3>Apa yang harus dilakukan agar uang kertas tetap terawat?</h3>

            <label class="answer-option">
                <input type="radio" name="q2" value="a"
                    {{ old('q2') == 'a' ? 'checked' : '' }} required>
                Tidak melipat, mencoret, atau meremas uang
            </label>

            <label class="answer-option">
                <input type="radio" name="q2" value="b"
                    {{ old('q2') == 'b' ? 'checked' : '' }}>
                Menyimpan uang di tempat yang basah
            </label>

            <label class="answer-option">
                <input type="radio" name="q2" value="c"
                    {{ old('q2') == 'c' ? 'checked' : '' }}>
                Mencoret uang sebagai tanda kepemilikan
            </label>
        </div>

        <div class="question-card">
            <span class="question-number">PERTANYAAN 03</span>
            <h3>Apa arti Bangga Rupiah?</h3>

            <label class="answer-option">
                <input type="radio" name="q3" value="a"
                    {{ old('q3') == 'a' ? 'checked' : '' }} required>
                Menggunakan mata uang asing setiap saat
            </label>

            <label class="answer-option">
                <input type="radio" name="q3" value="b"
                    {{ old('q3') == 'b' ? 'checked' : '' }}>
                Mengoleksi uang tanpa menggunakannya
            </label>

            <label class="answer-option">
                <input type="radio" name="q3" value="c"
                    {{ old('q3') == 'c' ? 'checked' : '' }}>
                Menghargai Rupiah sebagai simbol kedaulatan bangsa
            </label>
        </div>

        <div class="question-card">
            <span class="question-number">PERTANYAAN 04</span>
            <h3>Bagaimana cara sederhana memeriksa uang Rupiah?</h3>

            <label class="answer-option">
                <input type="radio" name="q4" value="a"
                    {{ old('q4') == 'a' ? 'checked' : '' }} required>
                Dilipat, diremas, dan dicoret
            </label>

            <label class="answer-option">
                <input type="radio" name="q4" value="b"
                    {{ old('q4') == 'b' ? 'checked' : '' }}>
                Dilihat, diraba, dan diterawang
            </label>

            <label class="answer-option">
                <input type="radio" name="q4" value="c"
                    {{ old('q4') == 'c' ? 'checked' : '' }}>
                Dicuci dengan air
            </label>
        </div>

        <div class="question-card">
            <span class="question-number">PERTANYAAN 05</span>
            <h3>Apa contoh perilaku Paham Rupiah?</h3>

            <label class="answer-option">
                <input type="radio" name="q5" value="a"
                    {{ old('q5') == 'a' ? 'checked' : '' }} required>
                Menggunakan uang secara bijak sesuai kebutuhan
            </label>

            <label class="answer-option">
                <input type="radio" name="q5" value="b"
                    {{ old('q5') == 'b' ? 'checked' : '' }}>
                Menghabiskan seluruh uang saku
            </label>

            <label class="answer-option">
                <input type="radio" name="q5" value="c"
                    {{ old('q5') == 'c' ? 'checked' : '' }}>
                Membeli semua barang yang diinginkan
            </label>
        </div>

        <button type="submit" class="btn quiz-submit">
            Kirim Jawaban dan Lihat Nilai →
        </button>
    </form>

    <div class="history-section">
        <h2 class="section-title">Riwayat Hasil Kuis</h2>
        <p class="section-subtitle">
            Sepuluh hasil kuis terbaru yang tersimpan di database.
        </p>

        @if($history->count() > 0)
            <div class="history-list">
                @foreach($history as $item)
                    <div class="history-item">
                        <div>
                            <strong>Hasil Kuis</strong>
                            <small>{{ $item->created_at->format('d M Y, H:i') }}</small>
                        </div>

                        <span class="history-score">
                            {{ $item->score }}/100
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-history">
                Belum ada hasil kuis. Jadilah yang pertama!
            </div>
        @endif
    </div>

</section>

@endsection
