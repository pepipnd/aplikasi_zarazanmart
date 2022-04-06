<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
</head>

<body>
	<div class="container">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"> Edit Profile <?= $_SESSION['nama']?></h1>
		</div>
		<div class="card" style="width: 50%">
			<div class="card-body">

				<center><img src="<?= base_url('foto/'.$member->foto)?>" alt="" width="300px"
						height="200px"></center>
				<hr>
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

</body>

</html>



