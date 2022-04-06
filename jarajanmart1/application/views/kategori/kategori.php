<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Kategori produk</h4>
                        <br>
                        <?php 
                            foreach($kategori as $kt): 
                            $nama = $kt->nama_kategori;
                            $kte = $kt->id;
                            endforeach; 
                        ?>
                      
                      <input type="hidden" name="kategori_id" value="<?= $kte ?>">
                        <table class="table">

                                 <tr>
                                    <td>No kategori</td>
                                    <td>:</td>
                                   <td><?=$kte?></td>
                                </tr>

                                <tr>
                                    <td>Nama Kategori</td>
                                    <td>:</td>
                                   <td><?=$nama ?></td>
                                </tr>
                                <tr>
                                    <td><a href="<?=base_url('Kategori/daftar_kategori') ?>"><input type="submit" class="btn btn-sm btn-success" value="Kembali"> </a></td>
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