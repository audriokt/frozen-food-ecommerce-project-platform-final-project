<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <!-- Header -->
    <h3 class="mb-4" style="color: #009B4D;">Checkout</h3>

    <!-- untuk Alamat customer -->
    <div class="card mb-4" style="border-color: #009B4D;">
        <div class="card-header text-white" style="background-color: #009B4D;">Alamat Pengiriman</div>
        <div class="card-body">
            <strong>Riri</strong><br>
            0812-2233-9846<br>
            Jalan Paingan XI No. 9, RT.8/RW.7, Maguwoharjo, Depok (Kost putri)<br>
            Depok, Kab. Sleman, DI Yogyakarta, 545637
        </div>
    </div>

    <!-- Produk yg dipilih -->
    <div class="card mb-4">
        <div class="card-header bg-light">Produk Dipesan</div>
        <div class="card-body d-flex">
            <img src="<?= base_url('images/ayam_utuh.jpg') ?>" alt="Ayam Utuh" style="width: 120px; height: auto;" class="me-3">
            <div>
                <h6 class="mb-1">Ayam Utuh</h6>
                <p class="mb-1">Jumlah: 1</p>
                <p class="fw-bold mb-0" style="color: #009B4D;">Rp120.000</p>
                <small class="text-muted"><del>Rp240.000</del></small>
            </div>
        </div>
    </div>

    <!--Opsi Pengiriman -->
    <div class="card mb-4">
        <div class="card-header bg-light">Opsi Pengiriman</div>
        <div class="card-body">
            <p class="mb-1">Reguler (Estimasi tiba: 14 - 15 Jun)</p>
            <p class="mb-0" style="color: #009B4D;">Gratis Ongkir</p>
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

    <!-- Tombol -->
    <div class="d-grid">
        <button class="btn btn-lg text-white" style="background-color: #009B4D;">Bayar</button>
    </div>
</div>

<?= $this->endSection() ?>