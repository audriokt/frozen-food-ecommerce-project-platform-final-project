<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container" style="margin-top: 130px;">

    <!-- Tombol kembali -->
    <h3 class="mb-4 d-flex align-items-center" style="color: #009B4D;">
        <a href="/LandingPage" class="me-3 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">
            &larr;
        </a>

        <!-- Header -->
        <h3 class="mb-4" style="color: #009B4D;">Checkout</h3>

        <?php
        $action = "";
        // Mengambil data dari session
        if (session()->get('direct_checkout_status')) {
            $action = site_url('/checkout/bayar/' . session()->get('direct_checkout'));
        } else {
            $action = site_url('/checkout/bayar');
        }
        ?>
        <form action="<?= $action ?>" method="post">
            <!-- untuk Alamat customer -->
            <div class="card mb-4" style="border-color: #009B4D;">
                <div class="card-header text-white" style="background-color: #009B4D;">Alamat Pengiriman</div>
                <div class="card-body">
                    <strong><?php
                            echo session()->get('Name'); ?></strong><br>
                    0812-2233-9846<br>
                    Jalan Paingan XI No. 9, RT.8/RW.7, Maguwoharjo, Depok (Kost putri)<br>
                    Depok, Kab. Sleman, DI Yogyakarta, 545637
                </div>
            </div>

            <!-- Produk yang Dipesan -->
            <?php $grandTotal = 0; ?>
            <?php foreach ($cartItems as $item): ?>
                <?php
                if (is_null($quantity)) {
                    $quantity = $item['quantity'];
                }
                if (is_null($product_name)) {
                    $product_name = $item['product_name'];
                }
                $totalPerItem = $quantity * $item['price'];
                $grandTotal += $totalPerItem;
                ?>
                <div class="card mb-4">
                    <div class="card-header bg-light">Produk Dipesan</div>
                    <div class="card-body d-flex">
                        <img src="<?= base_url($item['path']) ?>" alt="<?= $product_name ?>" style="width: 120px;" class="me-3">
                        <div>
                            <h6 class="mb-1"><?= esc($product_name) ?></h6>
                            <p class="mb-1">Jumlah: <?= $quantity ?></p>
                            <p class="fw-bold mb-0" style="color: #009B4D;">Rp<?= number_format($totalPerItem, 0, ',', '.') ?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

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
                        <span>Rp<?= number_format($grandTotal, 0, ',', '.') ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Proteksi Kerusakan</span>
                        <span>Rp500</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span style="color: #009B4D;">Rp<?= number_format($grandTotal + 500, 0, ',', '.') ?></span>
                    </div>
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
                    <div class="fo   rm-check mb-2">
                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="ewallet" value="e-Wallet">
                        <label class="form-check-label" for="ewallet">e-Wallet (DANA)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="cod" value="COD">
                        <label class="form-check-label" for="cod">Bayar di Tempat (COD)</label>
                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="d-grid">
                <button type="submit" class="btn btn-lg text-white" style="background-color: #009B4D;">Bayar</button>
            </div>
        </form>
</div>
<?= $this->endSection() ?>