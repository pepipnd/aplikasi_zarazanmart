<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Akun</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Edit Akun</h4>
                        <hr>

                        <?php 
                            foreach($editakun as $ea): 
                            $id = $ea->id;
                            endforeach; 
                        ?>

                       <center><img src="<?= base_url('foto/'.$ea->foto)?>" alt="" width="300px"
						height="200px"></center>
                        <br>
                        <form action="<?= base_url('Admin/save_edit_akun') ?>" method="post"
						enctype="multipart/form-data">
                         <input type="hidden" name="id" value="<?= $id ?>">
						<table class="table">

                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $ea->nama_lengkap ?>"></td>
                                </tr>
                                <tr>
                                    <td>No hp</td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="no_hp" id="no_hp" value="<?= $ea->no_hp ?>"></td>
                                </tr>

                                 <tr>
                                    <td>Alamat Lengkap</td>
                                    <td>:</td>
                                   <td>
                                    <input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" value="<?= $ea->alamat_lengkap ?>"> 
                                   </td>
                                <tr>

                                 <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                   <td><input type="email" class="form-control" name="email" id="email" value="<?= $ea->email ?>"></td>
                                 <tr>
                                 <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                   <td><input type="password" class="form-control" name="password" id="password" value="<?= $ea->password ?>"></td>
                                 <tr>
                               
                                <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td>
                                       <input type="file" class="form-control" name="foto" id="foto" accept="image/jpeg, image/jpg, image/png" >
                                    </td>
                             </tr>
                                <td>
                                    <td>
                                         <input type="submit" class="btn btn-sm btn-primary" value="simpan"> 
                                    </td>
                                </tr>
    
                            </table>
                        </form>
                    </div>    
                </div>      
            </div>    
        </div>              
    </div>                   
</div> 
</body>

</html>