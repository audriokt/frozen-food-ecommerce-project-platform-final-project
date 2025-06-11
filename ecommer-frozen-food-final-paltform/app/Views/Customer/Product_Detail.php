<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<!-- Product Details Section -->
<div class="container product-container" style="margin-top:150px; margin-bottom:100px; display: flex; gap: 30px;">

    <!-- Tombol kembali -->
    <h3 class="mb-4 d-flex align-items-center" style="color: #009B4D;">
        <a href="/LandingPage" class="me-3 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">
            &larr;
        </a>

        <div class="product-image" style="flex: 1;">
            <img src="<?= base_url('images/ayam_utuh.jpg') ?>" alt="Ayam Utuh" style="width:500%; max-width:500px; height:auto;">
        </div>
        <div class="product-details" style="flex: 1;">
            <h1>Ayam Utuh</h1>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Harga</th>
                        <td>Rp120.000</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>4 Buah</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>
                            AYAM KONDISI UTUH BEKU, TIDAK DIPOTONG!<br>
                            Ayam utuh segar dengan berat ±1 kg, cocok untuk berbagai olahan masakan rumahan maupun usaha kuliner.<br>
                            Dipotong dan dibersihkan secara higienis, tanpa jeroan, dan dikemas rapi agar kualitas tetap terjaga.<br>
                            Cocok untuk digoreng, dipanggang, dibuat sup, atau masakan khas Indonesia seperti opor dan gulai.
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="buttons" style="margin-top: 15px;">
                <button class="add-to-cart btn btn-success float-end" style="background-color: #009B4D" ;">Tambah ke keranjang</button>
            </div>
        </div>
</div>
<?= $this->endSection() ?>