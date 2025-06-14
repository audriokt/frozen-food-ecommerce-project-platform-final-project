<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Halaman Register</title>
</head>
<body style="background-color: #ffffff;">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-10 col-xl-9">
                    <div class="card border-0 shadow">
                        <div class="card-body p-5">
                            <div class="row">

                                <div class="col-md-6">
                                    <h2 class="fw-bold text-center mb-5" style="font-family: Outfit;">DAFTAR</h2>

                                    <!-- Tampilkan flashdata error jika ada -->
                                    <?php if (session()->getFlashdata('error')) : ?>
                                        <div class="alert alert-danger">
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                    <?php endif; ?>

                                    <form action="" method="post">
                                        <?= csrf_field() ?> <!-- Wajib agar tidak Unauthorized -->

                                        <!-- Nama Lengkap -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>" required>
                                            <?php if (isset($validation) && $validation->hasError('name')): ?>
                                                <small class="text-danger"><?= $validation->getError('name') ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required>
                                            <?php if (isset($validation) && $validation->hasError('email')): ?>
                                                <small class="text-danger"><?= $validation->getError('email') ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-4">
                                            <label for="password" class="form-label">Kata Sandi</label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                            <?php if (isset($validation) && $validation->hasError('password')): ?>
                                                <small class="text-danger"><?= $validation->getError('password') ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Tombol Daftar -->
                                        <div class="d-flex justify-content-center mb-4">
                                            <button type="submit" class="btn btn-success btn-lg" style="font-family: Outfit;">Daftar</button>
                                        </div>

                                        <!-- Link ke login -->
                                        <p class="text-center">Sudah punya akun?
                                            <a href="/login" class="fw-bold text-decoration-none">Masuk</a>
                                        </p>
                                    </form>
                                </div>

                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="<?= base_url('logoku.jpg') ?>" alt="Logo" style="max-height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
