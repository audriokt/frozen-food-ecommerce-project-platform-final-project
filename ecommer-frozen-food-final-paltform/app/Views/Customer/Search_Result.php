<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-top: 130px;">
    <!-- Tombol kembali -->
    <h3 class="mb-4 d-flex align-items-center" style="color: #009B4D;">
    <a href="/LandingPage" class="me-3 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">
        &larr;
    </a>
    <?php
    echo "<h3 style='font-family:Outfit;'> Hasil Pencarian</h3>";
    ?>
    <!-- gambar produk -->
    <div class="container my-5">
        <div class="row g-3">
            <?php foreach ($data as $product) : ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card h-100">
                        <a class="nav-link" href="/product/<?= $product['p_id'] ?>">
                            <img src="<?= base_url($product['path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <a class="nav-link" href="/product/<?= $product['p_id'] ?>">
                                <h5 style="font-family: Outfit;" class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                            </a>
                            <h6 class="fw-bold text-danger"><?= number_format($product['price'], 0, ',', '.') ?></h6>
                            <div class="mt-auto">
                                <form action="/cart/checkout/<?= $product['p_id'] ?> " method="post">
                                    <button type="submit" class="btn m-1 float-end" style="background-color: #009D4B; color:white;">Beli</button>
                                    <a href="/cart/add/<?= $product['p_id'] ?>" class="btn m-1 float-end" style="background-color:rgb(221, 221, 221); color:black;">Keranjang</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?= $this->endSection() ?>