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
        <style>
            .form-check-input:checked {
                background-color: #009B4D !important;
                border-color: #009B4D !important;
            }
        </style>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!--Navbar Pertama -->
        <nav class="fixed-top">
            <nav class="border-bottom" style="background-color: #F5F5F5;">
                <div class="container d-flex justify-content-between">
                    <ul class="nav">
                        <li class="nav-item pt-2" style="color: #666666;">Selamat Datang di Snowé</li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link link-body-emphasis px-2 active" aria-current="page" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009B4D" class="bi bi-person" viewBox="0 2 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                Tentang Snowé</a></li>

                        <li class="nav-item"><a class="nav-link link-body-emphasis px-2 active" aria-current="page" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009B4D" class="bi bi-telephone" viewBox="0 1 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                                Hubungi Kami</a></li>
                    </ul>
                </div>
            </nav>

            <?= $this->include('layouts/navbar'); ?>

            <main class="flex-grow-1">

                <?= $this->renderSection('content'); ?>

            </main>
          
            <!-- Footer -->
<div class="container-fluid mt-4" style="background-color: #009B4D;">
  <footer class="text-white py-3 text-center" style="font-family: Outfit, sans-serif;">
    <h5>Hubungi Kami</h5>
    

    <div class="footer-contact mb-3">
      <p>Email: <a href="snowé@gmail.com" class="text-white">snowé@gmail.com</a></p>
      <p>Telepon: 0813-4778-2231</p>
      <p>Alamat: Jl. Paingan No. 3, Depok, Sleman</p>
    </div>

    <div class="footer-social mb-3">
      <a href="https://www.facebook.com/snowé" target="_blank" class="text-white me-3">
        <i class="fab fa-facebook fa-lg"></i>
      </a>
      <a href="https://www.instagram.com/snowé" target="_blank" class="text-white">
        <i class="fab fa-instagram fa-lg"></i>
      </a>
    </div>

    <div class="footer-copyright">
      <p class="mb-0">&copy; 2025 Snowé Frozen Food. All rights reserved.</p>
    </div>
  </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
    </html>