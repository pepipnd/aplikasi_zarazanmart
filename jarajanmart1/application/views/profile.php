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
                    <h3>Profile</h3>
					<div class="table-responsive">
						<div class="item form-group">
							<div class="card" style="width: 100%">
                            <div class="card-body">
                                <center><img src="<?= base_url('foto/'.$member->foto)?>" alt="" width="300px" height="200px"></center>
                                <br>
                                <br>
                                <br>
                                <div class="form-group">
                                    <br>
                                    <label>Nama Lengkap :</label>
                                    <td><?= $member->nama_lengkap ?></td>
                                </div>
                                <div class="form-group">
                                    <label>No hp :</label>
                                    <td><?= $member->no_hp ?></td>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap :</label>  
                                    <td><?= $member->alamat_lengkap ?></td>

                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <td><?= $member->email ?></td>
                                </div>
                                <hr>
                                <div class="col-auto">
                                <a href="<?= base_url('Home/edit_profile') ?>">Edit Profile</a>
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