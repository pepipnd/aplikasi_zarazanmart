<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Akun</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Tambah Akun</h4>
                        <br>
                    
                        <form action="<?= base_url('Admin/simpan_akun') ?>" method="post"
						enctype="multipart/form-data">
						<table class="table">

                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"></td>
                                </tr>
                                <tr>
                                    <td>No hp</td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="no_hp" id="no_hp"></td>
                                </tr>

                                 <tr>
                                    <td>Alamat Lengkap</td>
                                    <td>:</td>
                                   <td>
                                    <textarea name="alamat_lengkap" id="alamat_lengkap" cols="30" rows="10" class="form-control"></textarea>
                                   </td>
                                <tr>

                                 <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                   <td><input type="email" class="form-control" name="email" id="email"></td>
                                <tr>
                                 <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                   <td><input type="password" class="form-control" name="password" id="password"></td>
                                <tr>
                                 <tr>
                                    <td>Level</td>
                                    <td>:</td>
                                   <td>
                                   <select name="level" id="level" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="customer">Customer</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                  </td>
                                <tr>

                                 <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td>
                                       <input type="file" class="form-control" name="foto" id="foto" accept="image/jpeg, image/jpg, image/png" >
                                    </td>
                                <tr>

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