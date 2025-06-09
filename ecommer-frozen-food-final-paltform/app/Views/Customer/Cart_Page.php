<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<style>
    .main-content {
        min-height: 70vh;
        padding-top: 100px;
    }
</style>

<div class="container main-content">
    <h4 class="fw-semibold mb-4 mt-5">
        Keranjang Saya (1)
    </h4>

    <form action="<?= site_url('cart/update') ?>" method="post">
        <?= csrf_field(); ?>

        <!-- Contoh Produk Ayam Utuh -->
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-start">

                    <!-- Checkbox -->
                    <div class="form-check me-3 mt-2">
                        <input class="form-check-input" type="checkbox" name="selected[]" value="1">
                    </div>

                    <!-- Gambar Produk -->
                    <img src="<?= base_url('images/ayam_utuh.jpg') ?>" alt="Ayam Utuh" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">

                    <!-- Info Produk -->
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="fw-semibold">Ayam Utuh</div>
                                <div class="text-muted small">Kategori: Ayam, Daging & Ikan</div>
                            </div>
                            <a href="<?= site_url('cart/delete/1') ?>" class="text-danger small" onclick="return confirm('Hapus item ini?')">Hapus</a>
                        </div>

                        <div class="d-flex align-items-center mt-2">
                            <span class="fw-bold text-danger me-3">Rp120.000</span>

                            <!-- Kuantitas -->
                            <div class="input-group" style="width: 120px;">
                                <button type="button" class="btn btn-outline-secondary btn-sm qty-minus">−</button>
                                <input type="number" class="form-control text-center" name="quantity[1]" min="1" value="1">
                                <button type="button" class="btn btn-outline-secondary btn-sm qty-plus">＋</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ringkasan -->
        <div class="card sticky-bottom shadow-sm mb-5">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div>
                    <div class="form-check d-inline-block me-3">
                        <input class="form-check-input" fill= "green" type="checkbox" id="selectAll">
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

<!-- Script kuantitas & select all -->
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

document.getElementById('selectAll')?.addEventListener('change', function () {
    document.querySelectorAll('input[name="selected[]"]').forEach(cb => cb.checked = this.checked);
});
</script>

<?= $this->endSection() ?>