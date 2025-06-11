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
                            <input class="form-check-input item-checkbox" type="checkbox" name="selected[]" value="<?= $item['cart_id'] ?>" data-subtotal="<?= $item['subtotal'] ?>">
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
    function formatRupiah(angka) {
        return 'Rp' + angka.toLocaleString('id-ID');
    }

    function updateCheckboxSubtotal(cb) {
        const card = cb.closest('.card');
        const priceText = card.querySelector('.text-danger').textContent;
        const price = parseInt(priceText.replace(/\D/g, '')) || 0;
        const quantity = parseInt(card.querySelector('input[name^="quantity"]').value) || 1;
        cb.dataset.subtotal = price * quantity;
    }

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.item-checkbox:checked').forEach(cb => {
            total += parseInt(cb.dataset.subtotal) || 0;
        });
        document.getElementById('total-price').textContent = formatRupiah(total);
    }

    // Tombol +
    document.querySelectorAll('.qty-plus').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.previousElementSibling;
            input.value = parseInt(input.value) + 1;

            const card = btn.closest('.card');
            const checkbox = card.querySelector('.item-checkbox');
            updateCheckboxSubtotal(checkbox);
            updateTotal();
        });
    });

    // Tombol -
    document.querySelectorAll('.qty-minus').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.nextElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;

                const card = btn.closest('.card');
                const checkbox = card.querySelector('.item-checkbox');
                updateCheckboxSubtotal(checkbox);
                updateTotal();
            }
        });
    });

    // Checkbox per item
    document.querySelectorAll('.item-checkbox').forEach(cb => {
        updateCheckboxSubtotal(cb); // Hitung subtotal awal
        cb.addEventListener('change', () => {
            updateCheckboxSubtotal(cb);
            updateTotal();
        });
    });

    // Pilih Semua
    document.getElementById('selectAll')?.addEventListener('change', function () {
        const allCheckboxes = document.querySelectorAll('.item-checkbox');
        allCheckboxes.forEach(cb => {
            cb.checked = this.checked;
            updateCheckboxSubtotal(cb);
        });
        updateTotal();
    });

    // Jalankan total saat pertama kali
    updateTotal();
</script>

<?= $this->endSection() ?>