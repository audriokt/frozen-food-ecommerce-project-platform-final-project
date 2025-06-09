    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
        <title>Snowe</title>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!--Navbar Pertama -->
        <nav class="">
            <nav class="border-bottom" style="background-color: #F5F5F5;">
                <div class="container d-flex justify-content-between">
                    <ul class="nav">
                        <li class="nav-item pt-2" style="color: #666666;">Selamat Datang di Snowe</li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link link-body-emphasis px-2 active" aria-current="page" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009B4D" class="bi bi-person" viewBox="0 2 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                Tentang Snowe</a></li>

                        <li class="nav-item"><a class="nav-link link-body-emphasis px-2 active" aria-current="page" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009B4D" class="bi bi-telephone" viewBox="0 1 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                                Hubungi Kami</a></li>
                    </ul>
                </div>
            </nav>
            <!-- Navbar Kedua -->
            <nav class="navbar navbar-expand-lg border-bottom" style="background-color: #FFFFFF;">
                <div class="container">
                    <a class="navbar-brand" href="#" style="font-family: Outfit, sans-serif; font-weight: 500; font-size:30px; color:#009B4D">Snowé</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!-- Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Kategori
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Makan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Sayuran & Buah</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Ayam, Daging & Ikan</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Search Bar -->
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Ikan Cakalang Beku 1kg" aria-label="Search" style="background-color: #F4FBF3; width:400px; border: 1px solid #009B4D;" />
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <!--Cart -->
                        <button style="border: none; background-color: transparent;" class="btn position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#009B4D" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div>
                    <!-- Dropdown User -->
                    <div class="dropdown">
                        <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" fill="#009B4D">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#009B4D" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li>
                                <a href="" class="dropdown-item">Profil</a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item">Pesanan</a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item text-danger">Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </nav>
        <main class="flex-grow-1">

            <?= $this->renderSection('content'); ?>

        </main>
        <!-- Footer -->
        <div class="container-fluid" style="background-color: #009B4D;">
            <footer class="text-center py-3 text-white" style="font-family: Outfit, sans-serif; height: 650px;">
                <h5>Ingpo</h5>
                <ul>
                    <li class="nav flex-column">Hubungi Kami</li>
                </ul>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    </body>

    </html>