<link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataT">
<div class="wrapper">
	<div class="core mt-3">
		<div class="product">
			<div class="total shadow">
				<h2 class="title badge badge-info">Menu</h2>
				<hr>
				<table class="table table-bordered">
					<tr>
						<th>
                            <a href="<?= base_url('Home/profile') ?>">
                                <i class="fa fa-user"></i> Profil
                            </a>
                        </th>
					</tr>
					<tr>
						<th>
                            <a href="<?= base_url('Home/cart') ?>">    
                                <i class="fa fa-shopping-cart"></i> Keranjang
                            <a>    
                        </th>
					</tr>
					<tr>
						<th>
                            <a href="<?= base_url('Home/user') ?>">     
                                <i class="fa fa-money"></i> Transaksi
                            </a>
                        </th>
					</tr>
					<tr>
						<th>
                            <a href="<?= base_url('Home/ganti_password') ?>">     
                                <i class="fa fa-key"></i> Ubah Password
                            </a>
                        </th>
					</tr>
				</table>
				<br>
				</form>
			</div>
		</div>
		<div class="product col-md-9">
			<div class=" shadow">
                <div class="card-body">
                    <h3>Ganti Password</h3>
					<div class="table-responsive">
						<div class="item form-group">
							<div class="card" style="width: 100%">
                            <div class="card-body">
                                <form action="<?= base_url('Home/gantipassword_aksi') ?>" method="post">
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
					</div>
				</div>
            </div>
		</div>
	</div>
</div>

<hr>

<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>