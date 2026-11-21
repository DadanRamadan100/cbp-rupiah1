
@extends('layouts.app')

@section('title', 'Scan AR - Jelajah Rupiah')

@section('content')

<style>
.scan-section {
    padding-bottom: 70px;
}

.scan-heading {
    text-align: center;
    max-width: 750px;
    margin: 0 auto 40px;
}

.scan-heading h1 {
    margin: 12px 0;
}

.scan-heading p {
    color: var(--muted);
}

.scan-layout {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 25px;
    align-items: stretch;
}

.scan-camera-card,
.scan-info-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 24px;
    box-shadow: 0 8px 25px #451d1d08;
}

.camera-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
    font-size: 12px;
}

.camera-status {
    display: inline-block;
    width: 9px;
    height: 9px;
    background: #20a46b;
    border-radius: 50%;
    margin-right: 8px;
}

.camera-label {
    color: var(--muted);
    font-size: 10px;
    letter-spacing: 1px;
}

.camera-view {
    width: 100%;
    height: 380px;
    background: #261b1b;
    border-radius: 15px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.camera-view video {
    display: none;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.camera-view #uploadedPreview {
    display: none;
    position: absolute;
    width: 82%;
    height: 48%;
    left: 9%;
    top: 26%;
    object-fit: contain;
    object-position: center;
    z-index: 2;
}

.camera-placeholder {
    text-align: center;
    color: white;
    padding: 25px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.camera-symbol {
    font-size: 65px;
    color: #f3c36b;
}

.camera-placeholder h3 {
    margin: 10px 0;
}

.camera-placeholder p {
    color: #d5caca;
    font-size: 13px;
    max-width: 300px;
}

.scan-frame {
    position: absolute;
    width: 86%;
    height: 55%;
    left: 7%;
    top: 22.5%;
    border: 2px dashed #f3c36b;
    border-radius: 12px;
    pointer-events: none;
    z-index: 3;
}

.scan-hint {
    position: absolute;
    bottom: 15px;
    color: white;
    font-size: 9px;
    letter-spacing: 1px;
    pointer-events: none;
    z-index: 4;
}

.camera-controls {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
}

.camera-controls .btn {
    font-size: 12px;
    padding: 12px 15px;
}

.btn-outline,
.upload-button {
    border: 1px solid var(--primary);
    color: var(--primary);
    background: white;
    border-radius: 30px;
    cursor: pointer;
}

.btn-outline:hover,
.upload-button:hover {
    background: #fff0ef;
}

.camera-message {
    font-size: 12px;
    color: var(--muted);
    margin-top: 15px;
}

.scan-info-card h2 {
    color: var(--primary);
    font-family: 'Castoro', serif;
    font-size: 27px;
    margin: 12px 0;
}

.scan-info-card > p {
    color: var(--muted);
    font-size: 14px;
}

.scan-step {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 18px 0;
    border-bottom: 1px solid var(--border);
}

.step-icon {
    width: 45px;
    height: 45px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #fff0df;
    font-size: 22px;
}

.scan-step h3 {
    font-size: 15px;
    margin-bottom: 5px;
}

.scan-step p {
    font-size: 13px;
    color: var(--muted);
}

.bi-button {
    display: block;
    width: 100%;
    text-align: center;
    margin-top: 25px;
    padding: 15px;
    border-radius: 30px;
    text-decoration: none;
    font-size: 13px;
    box-sizing: border-box;
}

.bi-button:hover {
    background: #750000;
    color: white;
}

.scan-result {
    margin-top: 40px;
    padding: 30px;
    background: white;
    border: 1px solid var(--border);
    border-radius: 20px;
}

.result-heading {
    text-align: center;
}

.result-heading h2 {
    color: var(--primary);
    font-family: 'Castoro', serif;
    font-size: 28px;
    margin: 10px 0;
}

.result-heading p {
    color: var(--muted);
}

.nominal-selector {
    max-width: 500px;
    margin: 25px auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.nominal-selector label {
    font-weight: bold;
    font-size: 13px;
}

.nominal-selector select {
    padding: 14px;
    border: 1px solid var(--border);
    border-radius: 10px;
    background: white;
    font-size: 14px;
}

.nominal-result {
    display: none;
    text-align: center;
    background: #fff6e8;
    border-radius: 15px;
    padding: 25px;
}

.nominal-result.show {
    display: block;
}

.result-money-icon {
    font-size: 40px;
}

.nominal-result h3 {
    color: var(--primary);
    margin: 10px 0;
}

.nominal-result p {
    color: var(--muted);
}

.scan-disclaimer {
    margin-top: 20px;
    font-size: 12px;
    color: var(--muted);
    text-align: center;
}

@media (max-width: 850px) {
    .scan-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 550px) {
    .camera-view {
        height: 280px;
    }

    .camera-view #uploadedPreview {
        width: 88%;
        height: 48%;
        left: 6%;
        top: 26%;
    }

    .scan-frame {
        width: 92%;
        left: 4%;
    }

    .scan-camera-card,
    .scan-info-card {
        padding: 16px;
    }

    .camera-controls .btn,
    .camera-controls label {
        flex: 1 1 100%;
        text-align: center;
    }
}
</style>

<section class="container scan-section">

    <div class="scan-heading">
        <span class="eyebrow">JELAJAH RUPIAH AUGMENTED REALITY</span>

        <h1 class="section-title">
            Kenali Rupiah Lebih Dekat
        </h1>

        <p>
            Arahkan kamera atau unggah gambar uang Rupiah
            untuk memulai pengalaman belajar interaktif.
        </p>
    </div>

    <div class="scan-layout">

        <!-- AREA KAMERA -->
        <div class="scan-camera-card">

            <div class="camera-header">
                <div>
                    <span class="camera-status"></span>
                    <strong>AREA PEMINDAIAN</strong>
                </div>

                <span class="camera-label">AR EDUCATION</span>
            </div>

            <div class="camera-view" id="cameraView">

                <video id="cameraVideo" autoplay playsinline></video>

                <img
                    id="uploadedPreview"
                    alt="Pratinjau uang Rupiah"
                >

                <canvas id="captureCanvas" hidden></canvas>

                <div class="camera-placeholder" id="cameraPlaceholder">
                    <div class="camera-symbol">◎</div>

                    <h3>Siap Memulai Pemindaian?</h3>

                    <p>
                        Aktifkan kamera atau unggah foto uang Rupiah
                        untuk memulai.
                    </p>
                </div>

                <div class="scan-frame"></div>

                <div class="scan-hint">
                    LETAKKAN GAMBAR UANG DI DALAM AREA
                </div>

            </div>

            <div class="camera-controls">

                <button type="button" class="btn" id="startCamera">
                    ◎ Aktifkan Kamera
                </button>

                <button type="button" class="btn btn-outline" id="capturePhoto">
                    Ambil Gambar
                </button>

                <button type="button" class="btn btn-outline" id="stopCamera">
                    Matikan Kamera
                </button>

                <label for="imageUpload" class="btn upload-button">
                    ↑ Unggah Gambar
                </label>

                <input
                    type="file"
                    id="imageUpload"
                    accept="image/*"
                    hidden
                >

            </div>

            <p class="camera-message" id="cameraMessage">
                Izinkan akses kamera jika browser memintanya.
            </p>

        </div>

        <!-- PANDUAN BELAJAR -->
        <div class="scan-info-card">

            <span class="eyebrow">PANDUAN PEMBELAJARAN</span>

            <h2>Belajar 3D Rupiah</h2>

            <p>
                Kenali uang Rupiah melalui tiga langkah sederhana berikut.
            </p>

            <div class="scan-step">
                <div class="step-icon">👁</div>

                <div>
                    <h3>1. Dilihat</h3>
                    <p>
                        Perhatikan warna, gambar utama,
                        benang pengaman, dan tanda air.
                    </p>
                </div>
            </div>

            <div class="scan-step">
                <div class="step-icon">✋</div>

                <div>
                    <h3>2. Diraba</h3>
                    <p>
                        Rasakan tekstur cetakan yang terasa kasar
                        pada bagian tertentu.
                    </p>
                </div>
            </div>

            <div class="scan-step">
                <div class="step-icon">☀</div>

                <div>
                    <h3>3. Diterawang</h3>
                    <p>
                        Terawang uang untuk mengamati tanda air
                        dan gambar saling isi.
                    </p>
                </div>
            </div>

            <!-- TOMBOL BANK INDONESIA -->
            <a
                href="https://www.bi.go.id/id/rupiah/gambar-uang/Default.aspx"
                target="_blank"
                rel="noopener noreferrer"
                class="btn bi-button"
            >
                🌐 Informasi Rupiah dari Bank Indonesia →
            </a>

        </div>

    </div>

    <!-- INFORMASI NOMINAL -->
    <div class="scan-result">

        <div class="result-heading">

            <span class="eyebrow">HASIL PEMBELAJARAN</span>

            <h2>Jelajahi Informasi Rupiah</h2>

            <p>
                Pilih nominal uang untuk melihat materi edukasi.
            </p>

        </div>

        <div class="nominal-selector">

            <label for="nominalSelect">
                Pilih nominal uang Rupiah
            </label>

            <select id="nominalSelect">
                <option value="">-- Pilih Nominal --</option>
                <option value="1000">Rp1.000</option>
                <option value="2000">Rp2.000</option>
                <option value="5000">Rp5.000</option>
                <option value="10000">Rp10.000</option>
                <option value="20000">Rp20.000</option>
                <option value="50000">Rp50.000</option>
                <option value="100000">Rp100.000</option>
            </select>

            <button type="button" class="btn" id="showInformation">
                Pelajari Uang →
            </button>

        </div>

        <div class="nominal-result" id="nominalResult">

            <div class="result-money-icon">🇮🇩</div>

            <h3 id="moneyTitle">Informasi Uang Rupiah</h3>

            <p id="moneyDescription">
                Pilih nominal untuk menampilkan informasi pembelajaran.
            </p>

        </div>

        <p class="scan-disclaimer">
            Catatan: Fitur ini merupakan simulasi edukasi.
            Pemilihan nominal dan informasi yang ditampilkan
            bukan hasil pengenalan otomatis atau verifikasi
            keaslian uang Rupiah.
        </p>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const video = document.getElementById('cameraVideo');
    const placeholder = document.getElementById('cameraPlaceholder');
    const preview = document.getElementById('uploadedPreview');
    const canvas = document.getElementById('captureCanvas');
    const message = document.getElementById('cameraMessage');

    const startCamera = document.getElementById('startCamera');
    const stopCamera = document.getElementById('stopCamera');
    const capturePhoto = document.getElementById('capturePhoto');
    const imageUpload = document.getElementById('imageUpload');

    let cameraStream = null;

    // MENGATUR POSISI DAN UKURAN GAMBAR
    function fitPreview() {

        preview.style.setProperty('display', 'block', 'important');
        preview.style.setProperty('position', 'absolute', 'important');

        preview.style.setProperty('width', '82%', 'important');
        preview.style.setProperty('height', '48%', 'important');

        preview.style.setProperty('left', '9%', 'important');
        preview.style.setProperty('top', '26%', 'important');

        preview.style.setProperty('object-fit', 'contain', 'important');
        preview.style.setProperty('object-position', 'center', 'important');

        preview.style.setProperty('z-index', '2', 'important');
        preview.style.setProperty('max-width', 'none', 'important');
        preview.style.setProperty('margin', '0', 'important');
    }

    // MENGAKTIFKAN KAMERA
    startCamera.addEventListener('click', async function () {

        try {

            if (!navigator.mediaDevices?.getUserMedia) {
                throw new Error('Browser tidak mendukung akses kamera.');
            }

            cameraStream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'environment'
                },
                audio: false
            });

            video.srcObject = cameraStream;

            video.style.display = 'block';
            preview.style.display = 'none';

            placeholder.style.display = 'none';

            message.textContent =
                'Kamera aktif. Arahkan ke uang Rupiah.';

        } catch (error) {

            message.textContent =
                'Kamera tidak dapat diakses. Periksa izin kamera atau unggah gambar.';

        }

    });

    // MEMATIKAN KAMERA
    stopCamera.addEventListener('click', function () {

        if (cameraStream) {

            cameraStream.getTracks().forEach(function (track) {
                track.stop();
            });

            cameraStream = null;

        }

        video.srcObject = null;

        video.style.display = 'none';
        preview.style.display = 'none';

        placeholder.style.display = 'flex';

        message.textContent = 'Kamera telah dimatikan.';

    });

    // MENGAMBIL FOTO DARI KAMERA
    capturePhoto.addEventListener('click', function () {

        if (!cameraStream || !video.videoWidth) {

            message.textContent =
                'Aktifkan kamera terlebih dahulu.';

            return;

        }

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        const context = canvas.getContext('2d');

        context.drawImage(
            video,
            0,
            0,
            canvas.width,
            canvas.height
        );

        preview.onload = function () {
            fitPreview();
        };

        preview.src = canvas.toDataURL('image/png');

        video.style.display = 'none';

        message.textContent =
            'Gambar berhasil diambil. Silakan pelajari nominalnya.';

    });

    // MENGUNGGAH GAMBAR
    imageUpload.addEventListener('change', function (event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }

        if (!file.type.startsWith('image/')) {

            message.textContent =
                'Pilih file gambar yang valid.';

            return;

        }

        if (cameraStream) {

            cameraStream.getTracks().forEach(function (track) {
                track.stop();
            });

            cameraStream = null;

        }

        video.srcObject = null;
        video.style.display = 'none';

        placeholder.style.display = 'none';

        const reader = new FileReader();

        reader.onload = function (e) {

            preview.onload = function () {
                fitPreview();
            };

            preview.src = e.target.result;

            fitPreview();

            message.textContent =
                'Gambar berhasil diunggah.';

        };

        reader.readAsDataURL(file);

    });

    // INFORMASI NOMINAL RUPIAH
    const information = {

        1000:
            'Uang Rp1.000 merupakan salah satu pecahan uang Rupiah. Pelajari gambar, warna, dan unsur pengaman pada uang.',

        2000:
            'Uang Rp2.000 merupakan pecahan Rupiah. Amati ciri visual dan unsur pengamannya.',

        5000:
            'Uang Rp5.000 merupakan pecahan Rupiah. Pelajari karakteristik desain dan unsur pengamannya.',

        10000:
            'Uang Rp10.000 merupakan pecahan Rupiah. Kenali desain dan unsur pengaman uang.',

        20000:
            'Uang Rp20.000 merupakan pecahan Rupiah. Amati warna, gambar, dan unsur pengamannya.',

        50000:
            'Uang Rp50.000 merupakan pecahan Rupiah. Pelajari desain serta unsur pengamannya.',

        100000:
            'Uang Rp100.000 merupakan pecahan Rupiah. Kenali desain dan unsur pengamannya.'

    };

    // MENAMPILKAN INFORMASI
    document.getElementById('showInformation')
        .addEventListener('click', function () {

            const nominal =
                document.getElementById('nominalSelect').value;

            if (!nominal) {

                alert('Silakan pilih nominal uang terlebih dahulu.');

                return;

            }

            document.getElementById('moneyTitle').textContent =
                'Uang Rupiah Rp' +
                Number(nominal).toLocaleString('id-ID');

            document.getElementById('moneyDescription').textContent =
                information[nominal];

            document.getElementById('nominalResult')
                .classList.add('show');

        });

    // MATIKAN KAMERA SAAT MENINGGALKAN HALAMAN
    window.addEventListener('beforeunload', function () {

        if (cameraStream) {

            cameraStream.getTracks().forEach(function (track) {
                track.stop();
            });

        }

    });

});
</script>

@endsection
