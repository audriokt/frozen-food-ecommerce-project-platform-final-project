<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="icon" type="image/jpeg" href="<?= base_url('logo%20real.jpg') ?>">
    <link rel="shortcut icon" href="<?= base_url('logo%20real.jpg') ?>">

</head>
<body style="background-color: #ffffff;">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-10 col-xl-9">
                    <div class="card border-0 shadow">
                        <div class="card-body p-5">
                            <div class="row">

                                <!-- Formulir Registrasi -->
                                <div class="col-md-6">
                                    <h2 class="fw-bold text-center mb-5">DAFTAR</h2>

                                    <form action="/register" method="post">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required />
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <input type="email" name="email" class="form-control" placeholder="Email" required />
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required />
                                        </div>

                                        <div class="d-flex justify-content-center mb-4">
                                            <button type="submit" class="btn btn-success btn-lg">Daftar</button>
                                        </div>

                                        <p class="text-center">Sudah punya akun?
                                            <a href="/login" class="fw-bold text-decoration-none">Masuk</a>
                                        </p>
                                    </form>
                                </div>

                                <!-- Gambar -->
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="<?= base_url('favicon.ico') ?>" alt="Illustration" style="max-height: 300px;">
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