<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container" style="margin-top: 120px";>
  <h3 class=" d-flex align-items-center" style="color: #009B4D;">
  <a href="<?= previous_url() ?>" class="me-1 text-decoration-none" style="color: #009B4D; font-size: 2rem; font-weight: bold;">&larr;</a></h3>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card text-center p-4">
        <h5 class="mb-3">Foto Profil</h5>
        <img src="https://via.placeholder.com/120" alt="" class="profile-img mx-auto">
        <button type="submit" class="btn btn-outline-success">Ubah Profile</button>
      </div> 
    </div>

    <div class="col-md-8">
      <div class="card p-4">
        <h5 class="mb-4">Detail Akun</h5>
        <form method="post" action="<?= base_url('/profile/update') ?>">
          <div class="mb-3">
            <label for="Name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="Name" name="Name" value="<?= esc($user['Name']) ?>">
          </div>
          <div class="mb-3">
            <label for="Email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="<?= esc($user['Email']) ?>">
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Ubah password">
          </div>
          <button type="submit" class="btn btn-outline-success">Simpan Perubahan</button>
        </form>
      </div>
    </div>
</div>
  </div>

<style>
  body {
    background-color: #f8faf9;
  }

  .profile-img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
  }

  .card {
    border-radius: 10px;
  }
</style>
<?= $this->endSection() ?>
