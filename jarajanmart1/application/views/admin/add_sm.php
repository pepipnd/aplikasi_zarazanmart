<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Social Media</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Tambah Social Media</h4>
                        <br>
                    
                        <form action="<?= base_url('Admin/simpan_sm') ?>" method="post"
						enctype="multipart/form-data">
						<table class="table">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="name" id="name"></td>
                                <tr>

                                 <tr>
                                    <td>Icon</td>
                                    <td>:</td>
                                    <td>
                                       <input type="file" class="form-control" name="icon" id="icon" accept="image/jpeg, image/jpg, image/png" >
                                    </td>
                                <tr>
                                <tr>
                                    <td>Link</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="link" id="link"></td>
                                <tr>
                                <td>
                                    <td>
                                         <input type="submit" class="btn btn-sm btn-success" value="simpan"> 
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