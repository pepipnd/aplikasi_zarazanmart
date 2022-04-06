<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
    </div>
    <div class="card" style="width: 40%">
    <div class="card-body">
        <form action="<?= base_url('Customer/gantipassword_aksi') ?>" method="post">
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="passbaru" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="konpass" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
</div>
</div>