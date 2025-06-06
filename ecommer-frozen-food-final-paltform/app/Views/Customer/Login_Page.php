<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
<section class="vh-100">
    <div class="container mt-3">
    <div class="mt-4 p-5 bg-success text-green rounded">
    </div>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="favicon.ico"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form>
            <h1> SELAMAT DATANG </h1>
                <div class="divider d-flex align-items-center my-4">
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Alamat Email</label>
                    <input type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Masukan email" />
                </div>

                <div data-mdb-input-init class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">Kata Sandi</label>
                    <input type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Masukan Kata Sandi" />
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Masuk</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Belum Memiliki Akun? <a href="#!"
                        class="link-link">Daftar</a></p>
                </div>

            </form>
        </div>
        </div>
    </div>
    <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-success">
   </div>
</section>
</body>
</html>
