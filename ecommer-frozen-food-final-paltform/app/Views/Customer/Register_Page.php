<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
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

                                    <form action="" method="post">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required />
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
                                            <button type="submit" class="btn btn-success btn-lg" style="font-family: Outfit;">Daftar</button>
                                        </div>

                                        <p class="text-center">Sudah punya akun?
                                            <a href="/login" class="fw-bold text-decoration-none">Masuk</a>
                                        </p>
                                    </form>
                                </div>

                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <img src="<?php
                                                echo base_url('logoku.jpg');
                                                ?>" alt="Snowe" style="max-height: 300px;">
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