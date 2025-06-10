<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-top: 130px;">
    <h3>Beranda</h3>
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
                    <td><a href="<?= base_url('images/candies.png') ?>"><img src="<?= base_url('images/cat_candies.png') ?>" alt="Makanan" width="150px"></a></td>
                    <td><a href="<?= base_url('images/cat_barbecue.png') ?>"><img src="<?= base_url('images/cat_barbecue.png') ?>" alt="Sayuran" width="150px"></a></td>
                    <td><a href="<?= base_url('images/cat_vegetable.png') ?>"><img src="<?= base_url('images/cat_vegetable.png') ?>" alt="Ayam, Daging & Ikan" width="150px"></a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- produk diskon -->
    <div class="container my-5">
        <h5 style="font-family:Outfit;">Produk Diskon</h5>

    </div>

    <!-- gambar produk -->
    <div class="container" style="margin-top: 20px;">
        <table class="table table-hover">
            <tbody>
                <?php
                if (isset($products) && is_array($products)) {
                    foreach ($products as $product) {
                        echo "<tr>";
                        echo "<td> <img src='" . base_url($product['path']) . "' alt='" . $product['name'] . "' width='250px'></td>";
                        echo "<td style='text-align: left;'><h3>{$product['name']}</h3></td>";
                        echo "<td>{$product['price']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No products available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>