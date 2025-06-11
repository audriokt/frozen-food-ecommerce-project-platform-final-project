<!-- Navbar Kedua -->
            <nav class="navbar navbar-expand-lg border-bottom" style="background-color: #FFFFFF;">
                <div class="container">
                    <a class="navbar-brand" href="/LandingPage" style="font-family: Outfit, sans-serif; font-weight: 500; font-size:30px; color:#009B4D">Snowé</a>
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
                                    <li><a class="dropdown-item" href="/LandingPage/cate-1">Makanan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/LandingPage/cate-3">Sayuran & Buah</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/LandingPage/cate-2">Ayam, Daging & Ikan</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Search Bar -->
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Ikan Cakalang Beku 1kg" aria-label="Search" style="background-color: #F4FBF3; width:400px; border: 1px solid #009B4D;" />
                            <button class="btn btn-outline-success" type="submit">Cari</button>
                        </form>
                        <!--Cart -->
                        <button style="border: none; background-color: transparent;" class="btn position-relative">
                            <a class="nav-link" href="/cart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#009B4D" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg>
                            </a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= session()->get('Total_Item_Cart') ?? 0 ?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                        <!-- Dropdown User -->
                    <div class="dropdown">
                        <a href="" class=" nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" fill="#009B4D">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#009B4D" class="bi bi-person-circle ms-3" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li>
                                <a href="/profile" class="dropdown-item">Profil</a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item">Pesanan</a>
                            </li>
                            <li>
                                <a href="/logout" class="dropdown-item text-danger">Keluar</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </nav>
        </nav>