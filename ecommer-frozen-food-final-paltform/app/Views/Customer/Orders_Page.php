<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<div class="container" style="margin-top: 130px;">

    <!-- Tombol kembali -->
    <h3 class="mb-4 d-flex align-items-center" style="color: #009B4D;">
        <a href="/LandingPage" class="me-3 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">
            &larr;
        </a>
        Pesanan Saya
    </h3>

    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-start">
                    <div>
                        <strong>Order ID:</strong> <?= esc($order['order_id']) ?><br>
                        <small class="text-muted">Tanggal: <?= date('d M Y', strtotime($order['order_date'])) ?></small>
                    </div>
                    <span class="badge bg-warning text-dark mt-2"><?= esc('Sedang di Jalan') ?></span>
                </div>
                <div class="card-body">

                    <!-- Alamat Pengiriman -->
                    <p><strong>Alamat Pengiriman:</strong><br>
                        <?= esc($order['shipping_address']) ?>
                    </p>

                    <!-- Produk dalam pesanan -->
                    <div class="d-flex flex-wrap gap-4 mb-3 p-3 border rounded shadow-sm">

                        <!-- Gambar Produk -->
                        <a class="nav-link" href="/product/<?= esc($order['p_id']) ?>">
                            <img src="<?= base_url($order['path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($order['name']) ?>"
                                width="200px" height="200px">
                        </a>

                        <!-- Detail Produk -->
                        <div style="flex: 1;">
                            <p><strong>Produk:</strong> <?= esc($order['name']) ?><br>
                                <strong>Harga:</strong> Rp<?= number_format($order['price'], 0, ',', '.') ?><br>
                                <strong>Jumlah:</strong> <?= esc($order['quantity']) ?><br>
                                <strong>Subtotal:</strong> Rp<?= number_format($order['total_price'], 0, ',', '.') ?>
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Ringkasan Total Pesanan -->
                <hr>
                <div class="d-flex justify-content-between">
                    <span>Total Harga</span>
                    <span>Rp<?= number_format($order['total_price'] - 500, 0, ',', '.') ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Proteksi Kerusakan</span>
                    <span>Rp500</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold">
                    <span>Total</span>
                    <span style="color: #009B4D;">Rp<?= number_format($order['total_price'], 0, ',', '.') ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted text-center">Belum ada pesanan.</p>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>