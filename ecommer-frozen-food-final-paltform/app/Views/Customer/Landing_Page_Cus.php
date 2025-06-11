<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-top: 130px;">
    <?php
    echo "<h3 style='font-family:Outfit;'> Selamat Datang " . session()->get('Name') . "</h3>";
    ?>
    <!-- Coraousel -->
    <div class="container my-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('images/foto_corousel.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('images/foto1_corousel.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('images/foto2_corousel.jpg') ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- kategori -->
    <div class="container my-5">
        <h5 style="font-family: Outfit;">Kategori</h5>
        <table class="table table-borderless table-sm"">
            <tbody>
                <tr>
                    <td class=" text-center">
            <a href="/LandingPage/cate-1" class="nav-link" style="background-color:rgb(255, 243, 164); border-radius: 20px;">
                <img src="<?= base_url('images/cat_candies.png') ?>" alt="Makanan" width="150px"><br>
                <label for="cat_makanan" style="font-family: Outfit;">Makanan</label>
            </a>
            </td>
            <td class="text-center">
                <a href="/LandingPage/cate-2" class="nav-link" style="background-color:rgb(255, 169, 164); border-radius: 20px;">
                    <img src="<?= base_url('images/cat_barbecue.png') ?>" alt="Sayuran" width="150px"><br>
                    <label for="cat_daging" style="font-family: Outfit;">Daging</label>
                </a>
            </td>
            <td class="text-center">
                <a href="/LandingPage/cate-3" class="nav-link" style="background-color:rgb(234, 255, 164); border-radius: 20px;">
                    <img src="<?= base_url('images/cat_vegetable.png') ?>" alt="Ayam, Daging & Ikan" width="150px"><br>
                    <label for="cat_sayurbuah" style="font-family: Outfit;">Sayur & Buah</label>
                </a>
            </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- gambar produk -->
    <div class="container my-5">
        <h5 style="font-family: Outfit;"> Semua Produk</h5>
        <div class="row g-3">
            <?php foreach ($products as $product) : ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card h-100">
                        <a class="nav-link" href="/product/<?= $product['p_id'] ?>">
                            <img src="<?= base_url($product['path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <a class="nav-link" href="/product/<?= $product['p_id'] ?>">
                                <h5 style="font-family: Outfit;" class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                            </a>
                            <h6 class="fw-bold text-danger"><?= $product['price'] ?></h6>
                            <div class="mt-auto">
                                <a href="#" class="btn m-1 float-end" style="background-color: #009D4B; color:white;">Beli</a>
                                <a href="/cart/add/<?= $product['p_id'] ?>" class="btn m-1 float-end" style="background-color:rgb(221, 221, 221); color:black;">Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?= $this->endSection() ?>