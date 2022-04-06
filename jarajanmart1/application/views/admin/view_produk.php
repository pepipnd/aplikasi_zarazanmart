<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Detail Produk</h4>
                        <br>
                        <?php 
                            foreach($produk as $pk): 
                            $kateg = $pk->kategori_id;
                            endforeach; 
                        ?>
                         <input type="hidden" name="id" value="<?= $pk->id ?>">
                            <table class="table">
                                <tr>
                                    <td>Nama Produk</td>
                                    <td>:</td>
                                   <td><?= $pk->nama_produk ?></td>
                                </tr>

                                <tr>
                                    <td>kategori</td>
                                    <td>:</td>
                                    <td>
                                        <?= $pk->nama_kategori ?>
                                    </td>
                                </tr>

                                 <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                   <td><?= $pk->deskripsi ?></td>
                                
                                <tr>

                                 <tr>
                                    <td>Harga beli</td>
                                    <td>:</td>
                                   <td><?= $pk->harga_beli?></td>
                                <tr>

                                 <tr>
                                    <td>Harga jual</td>
                                    <td>:</td>
                                   <td><?= $pk->harga_jual?></td>
                                <tr>

                                 <tr>
                                    <td>Gambar</td>
                                    <td>:</td>
                                   <td><img src="<?=base_url('template/img/produk/'). $pk->gambar; ?>" width="50px" height="50px"></td>
                                <tr>
                                
                                 <tr>
                                    <td> <a href="<?=base_url('Product/kembali') ?>"> <input type="submit" class= "btn btn-sm btn-primary" value="Kembali"> </td></a>
                                    <td></td>
                                    <td></td>
                                </tr>
                                   
                            </table>
                    </div>    
                </div>      
            </div>    
        </div>              
    </div>                   
</div>                       