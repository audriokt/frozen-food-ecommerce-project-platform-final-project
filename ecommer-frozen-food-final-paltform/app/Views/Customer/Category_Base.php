<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<h3><?= $category ?></h3>
<div class="container my-5">
    <h5 style="font-family: Outfit;"> Semua Produk</h5>
    <div class="row g-3">
        <?php foreach ($products as $product) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card h-100">
                    <img src="<?= base_url($product['path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                        <div class="mt-auto">
                            <a href="#" class="btn m-1 float-end" style="background-color: #009D4B; color:white;">Beli</a>
                            <a href="#" class="btn m-1 float-end" style="background-color:rgb(221, 221, 221); color:black;">Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>