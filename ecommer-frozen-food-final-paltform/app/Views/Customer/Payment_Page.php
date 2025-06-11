<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container" style="margin-top: 130px;">

    <!-- Tombol kembali -->
    <h3 class="mb-4 d-flex align-items-center" style="color: #009B4D;">
    <a href="<?= previous_url() ?>" class="me-3 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">
        &larr;
    </a>

    <!-- Header -->
    <h3 class="mb-4" style="color: #009B4D;">Pembayaran</h3>

    <!-- Alamat Pengiriman -->
    <div class="card mb-4" style="border-color: #009B4D;">
        <div class="card-header text-white" style="background-color: #009B4D;">Alamat Pengiriman</div>
        <div class="card-body">
            <strong>Riri</strong><br>
            0812-2233-9846<br>
            Jalan Paingan XI No. 9, RT.8/RW.7, Maguwoharjo, Depok (Kost putri)<br>
            Depok, Kab. Sleman, DI Yogyakarta, 545637
        </div>
    </div>

    <!-- Produk Dipesan -->
    <div class="card mb-4">
        <div class="card-header bg-light">Produk Dipesan</div>
        <div class="card-body d-flex">
            <img src="<?= base_url('images/ayam_utuh.jpg') ?>" alt="Ayam Utuh" style="width: 100%; max-width: 200px; height: auto; border-radius: 8px;">

            <div>
                <h6 class="mb-1">Ayam Utuh</h6>
                <p class="mb-1">Jumlah: 1</p>
                <p class="fw-bold mb-0" style="color: #009B4D;">Rp120.000</p>
                <small class="text-muted"><del>Rp240.000</del></small>
            </div>
        </div>
    </div>

    <!-- Opsi Pengiriman -->
    <div class="card mb-4">
        <div class="card-header bg-light">Opsi Pengiriman</div>
        <div class="card-body">
            <p class="mb-1">Reguler (Estimasi tiba: 14 - 15 Jun)</p>
            <p class="mb-0" style="color: #009B4D;">Gratis Ongkir</p>
        </div>
    </div>

    <!-- Metode Pembayaran -->
    <div class="card mb-4">
        <div class="card-header bg-light">Metode Pembayaran</div>
        <div class="card-body">
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="metode_pembayaran" id="bank_transfer" value="Bank Transfer" checked>
                <label class="form-check-label" for="bank_transfer">Transfer Bank (BRI)</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="metode_pembayaran" id="ewallet" value="e-Wallet">
                <label class="form-check-label" for="ewallet">e-Wallet (DANA)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="metode_pembayaran" id="cod" value="COD">
                <label class="form-check-label" for="cod">Bayar di Tempat (COD)</label>
            </div>
        </div>
    </div>

    <!-- Ringkasan Pembayaran -->
    <div class="card mb-4" style="border-color: #009B4D;">
        <div class="card-header text-white" style="background-color: #009B4D;">Ringkasan Pembayaran</div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <span>Total Produk</span>
                <span>Rp120.000</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Proteksi Kerusakan</span>
                <span>Rp500</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between fw-bold">
                <span>Total</span>
                <span style="color: #009B4D;">Rp120.500</span>
            </div>
            <p class="text-muted mt-2 mb-0">Hemat Rp119.500</p>
        </div>
    </div>

<!-- Tombol Bayar dan Batal -->
<div class="d-flex justify-content-center gap-3 mt-5">
    <button class="btn btn-outline-success">Batal</button>
    <button class="btn btn-success text-white">Bayar</button>
</div>
</div>
<?= $this->endSection() ?>