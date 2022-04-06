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
                    <h3>Edit Profile</h3>
					<div class="table-responsive">
						<div class="item form-group">
							<div class="card" style="width: 90%">
                            <div class="card-body">

                                <center><img src="<?= base_url('foto/'.$member->foto)?>" alt="" width="300px"
                                        height="200px"></center>
                                <center>
                                    <form action="<?= base_url('Customer/save_edit_profile') ?>" method="post"
                                        enctype="multipart/form-data">
                                        <div class="col-md-6 col-sm-6">
                                            <label>Foto</label>
                                            <br>
                                            <input type="file" name="foto" size="50" class="form-control" />
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <br>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                                value="<?= $member->nama_lengkap ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>No Hp</label>
                                            <br>
                                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                                value="<?= $member->no_hp ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Lengkap</label>
                                            <br>
                                            <input type="text" name="alamat_lengkap" id="alamat_lengkap" class="form-control"
                                                value="<?= $member->alamat_lengkap ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <br>
                                            <input type="text" name="email" id="email" class="form-control"
                                                value="<?= $member->email ?>">
                                        </div>
                            </div>
                            </center>
                            <center><input type="submit" class="btn btn-primary" name="submit" value="Simpan"></center>
                            <br>
                            </form>
                        </div>
                        <br>
						</div>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>

<hr>

<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>