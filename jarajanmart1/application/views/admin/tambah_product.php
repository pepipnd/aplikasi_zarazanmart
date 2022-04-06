<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah produk</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Tambah Produk</h4>
                        <br>
                    
                        <form action="<?= base_url('Product/simpan_product') ?>" method="post"
						enctype="multipart/form-data">
						<table class="table">

                                <tr>
                                    <td>Barcode</td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="KODE_BARCODE" id="KODE_BARCODE"></td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="NAMA" id="NAMA"></td>
                                </tr>

                                 <tr>
                                    <td>Harga beli</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="HARGA_BELI" id="HARGA_BELI"></td>
                                <tr>

                                 <tr>
                                    <td>Harga jual</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="HARGA_JUAL" id="HARGA_JUAL"></td>
                                <tr>

                                 <tr>
                                    <td>Gambar</td>
                                    <td>:</td>
                                    <td>
                                       <input type="file" class="form-control" name="GAMBAR" id="GAMBAR" accept="image/jpeg, image/jpg, image/png" >
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