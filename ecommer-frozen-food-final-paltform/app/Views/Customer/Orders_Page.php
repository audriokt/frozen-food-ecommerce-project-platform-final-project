<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container" style="margin-top: 130px;">

    <!-- Tombol kembali -->
    <h3 class="mb-4 d-flex align-items-center" style="color: #009B4D;">
    <a href="<?= previous_url() ?>" class="me-3 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">
        &larr;
    </a>

    <h3 class="mb-4" style="color: #009B4D;">Pesanan Saya</h3>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-start">
            <div>
                <strong>Order ID:</strong> 12345<br>
                <small class="text-muted">Tanggal: 10 Jun 2025</small>
            </div>
            <span class="badge bg-warning text-dark mt-2">Sedang di Jalan</span>
        </div>
        <div class="card-body d-flex flex-wrap gap-4">

            <!-- Gambar Produk -->
            <div style="flex: 0 0 200px;">
                <img src="<?= base_url('images/ayam_utuh.jpg') ?>" alt="Ayam Utuh" style="width: 100%; max-width: 200px; height: auto; border-radius: 8px;">
            </div>

            <!-- Detail Pesanan -->
            <div style="flex: 1;">
                <p><strong>Alamat Pengiriman:</strong><br>
                    Jalan Paingan XI No. 9, RT.8/RW.7, Maguwoharjo, Depok (Kost putri)<br>
                    Depok, Kab. Sleman, DI Yogyakarta, 545637
                </p>
                <p><strong>Produk:</strong> Ayam Utuh<br>
                    <strong>Harga:</strong> Rp120.000
                </p>
                <p><strong>Estimasi Tiba:</strong> 13 Jun 2025</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>