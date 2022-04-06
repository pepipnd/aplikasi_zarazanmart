<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile <?= $_SESSION['nama']?></h1>
    </div>
    <div class="card" style="width: 40%">
    <div class="card-body">
        
        <center><img src="<?= base_url('foto/'.$member->foto)?>" alt="" width="300px" height="200px"></center>
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
		<a href="<?= base_url('Customer/edit_profile') ?>">
		<i class="fas fa-edit fa-1x"></i>Edit Profile
		</a>
		</div> 
    </div>
</div>
</div>
</body>
</html>