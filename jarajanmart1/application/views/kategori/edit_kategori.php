<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Edit Kategori</h4>
                        <br>
                        <?php 
                            foreach($kategori as $kt): 
                            $nama = $kt->nama_kategori;
                            $kte = $kt->id;
                            endforeach; 
                        ?>
                        <form action="<?=base_url('Kategori/saveedit_kategori') ?>" method="post">
                         <input type="hidden" name="kategori_id" value="<?= $kte ?>">
                            <table class="table">

                                 <tr>
                                    <td>No kategori</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="id" id="id" value="<?=$kte?>"></td>
                                </tr>

                                <tr>
                                    <td>Nama Kategori</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?=$nama ?>"></td>
                                </tr>

                                <tr>
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