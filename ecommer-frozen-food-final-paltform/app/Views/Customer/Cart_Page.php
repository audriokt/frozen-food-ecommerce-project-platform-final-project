<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<style>
    .main-content {
        min-height: 70vh;
        padding-top: 120px;
    }
</style>
    
<div class="container main-content">
    <h3 class="d-flex align-items-center" style="color: #009B4D;">
    <a href="<?= previous_url() ?>" class="me-3 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">&larr;</a>
</h3>
    <h4 class="fw-semibold mb-4" style="font-family: Outfit;">
        Keranjang Saya (<?= session()->get('Total_Item_Cart') ?? 0 ?>)
    </h4>

    <form action="<?= site_url('cart/update') ?>" method="post">
        <?= csrf_field(); ?>

        <!-- Item Keranjang -->
        <?php foreach ($cartItems as $item) : ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-start">

                        <!-- Checkbox -->
                        <div class="form-check me-3 mt-2">
                            <input class="form-check-input" type="checkbox" name="selected[]" value="1">
                        </div>

                        <!-- Gambar Produk -->
                        <img src="<?= base_url($item['path']) ?>" alt="Ayam Utuh" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">

                        <!-- Info Produk -->
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="fw-semibold"><?= $item['product_name'] ?></div>
                                    <div class="text-muted small">Kategori: <?= $item['category_name'] ?></div>
                                </div>
                                <a href="<?= site_url('cart/delete/1') ?>" class="text-danger small" onclick="return confirm('Hapus item ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009D4B" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </a>
                            </div>

                            <div class="d-flex align-items-center mt-2">
                                <span class="fw-bold text-danger me-3"><?= $item['price'] ?></span>

                                <!-- Kuantitas -->
                                <div class="input-group" style="width: 120px;">
                                    <button type="button" class="btn btn-outline-secondary btn-sm qty-minus">−</button>
                                    <input type="number" class="form-control text-center" name="quantity[1]" min="1" value="<?= $item['quantity'] ?>">
                                    <button type="button" class="btn btn-outline-secondary btn-sm qty-plus">＋</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Ringkasan -->
        <div class="card sticky-bottom shadow-sm mb-5">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div>
                    <div class="form-check d-inline-block me-3">
                        <input class="form-check-input" fill="green" type="checkbox" id="selectAll">
                        <label class="form-check-label" for="selectAll">Pilih Semua</label>
                    </div>
                    <span class="text-muted">Total:
                        <strong class="text-danger">Rp120.000</strong>
                    </span>
                </div>

                <div class="mt-3 mt-md-0">
                    <a href="<?= site_url('/') ?>" class="btn btn-outline-secondary me-2">Belanja Lagi</a>
                    <button type="submit" class="btn btn-success">Checkout</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('.qty-plus').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.previousElementSibling;
            input.value = parseInt(input.value) + 1;
        });
    });

    document.querySelectorAll('.qty-minus').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.nextElementSibling;
            if (parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
        });
    });

    document.getElementById('selectAll')?.addEventListener('change', function() {
        document.querySelectorAll('input[name="selected[]"]').forEach(cb => cb.checked = this.checked);
    });
</script>

<?= $this->endSection() ?>