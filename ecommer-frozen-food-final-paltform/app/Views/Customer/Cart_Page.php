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
        <a href="/LandingPage" class="me-3 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">&larr;</a>
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
                            <input class="form-check-input item-checkbox" type="checkbox" name="selected[]" value="<?= $item['cart_id'] ?>" data-subtotal="<?= $item['subtotal'] * $item['quantity'] ?>">
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
                                <a href="<?= base_url('cart/delete/' . $item['cart_id']) ?>" class="position-absolute end-0 top-0 m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="green" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
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
                        <strong class="text-danger" id="total-price">Rp0</strong>
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
    function formatRupiah(angka) {
        return 'Rp' + angka.toLocaleString('id-ID');
    }

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.item-checkbox:checked').forEach(cb => {
            total += parseInt(cb.dataset.subtotal);
        });
        document.getElementById('total-price').textContent = formatRupiah(total);
    }

    document.querySelectorAll('.item-checkbox').forEach(cb => {
        cb.addEventListener('change', updateTotal);
    });

    document.getElementById('selectAll')?.addEventListener('change', function() {
        document.querySelectorAll('.item-checkbox').forEach(cb => cb.checked = this.checked);
        updateTotal();
    });

    updateTotal();
    
</script>

<?= $this->endSection() ?>