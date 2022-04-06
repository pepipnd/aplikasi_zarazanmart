<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Edit Produk</h4>
                        <br>
                        <?php 
                            foreach($produk as $pk): 

                            endforeach; 
                        ?>
                        <form  action="<?=base_url('Product/proses_ubah') ?>" method="post" enctype="multipart/form-data" >
                         <input type="hidden" name="KODE_BARANG" value="<?= $pk->KODE_BARANG ?>">
                            <table class="table">

                                <tr>
                                    <td>Barcode</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="KODE_BARCODE" id="KODE_BARCODE" value="<?= $pk->KODE_BARCODE ?>"></td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="NAMA" id="NAMA" value="<?= $pk->NAMA ?>"></td>
                                </tr>

                                 <tr>
                                    <td>Harga beli</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="HARGA_BELI" id="HARGA_BELI" value="<?= $pk->HARGA_BELI?>"></td>
                                <tr>

                                 <tr>
                                    <td>Harga jual</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="HARGA_JUAL" id="HARGA_JUAL" value="<?= $pk->HARGA_JUAL?>"></td>
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
