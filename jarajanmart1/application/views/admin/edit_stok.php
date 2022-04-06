<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Edit Stok</h4>
                        <br>
                        <?php 
                            foreach($stok as $st): 
                                $prk= $st->id_produk;
                            endforeach; 
                        ?>
                        <form  action="<?=base_url('Stok/saveedit_stok') ?>" method="post"  >
                         <input type="hidden" name="id_produk" value="<?=$st->id_produk ?>">

                            <table class="table">
                                <!-- <tr>
                                    <td>Barcode</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="barcode" id="barcode" value="<?= $st->barcode ?>"></td>
                                </tr> -->

                                <tr>
                                    <td>Nama produk</td>
                                    <td>:</td>
                                    <td>
                                         <select name="nama_produk" id="nama_produk" class="form-control">
                                            <?php foreach($produk as $pd): ?>
                                            <option value="<?= $pd->id?>" <?php if($prk == $pd->id) { echo "selected";}?> ><?= $pd->nama_produk?></option>
                                             <?php endforeach ;?>
                                        </select>
                                    </td>
                                </tr>

                                <!-- <tr>
                                    <td>Harga beli</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="harga_beli" id="harga_beli" value="<?= $st->harga_beli ?>"></td>
                                </tr>

                                <tr>
                                    <td>Harga jual</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="harga_jual" id="harga_jual" value="<?= $st->harga_jual ?>"></td>
                                </tr> -->

                                <tr>
                                    <td>Stok awal </td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="stok_awal" id="stok_awal" value="<?= $st->stok_awal ?>"></td>
                                </tr>

                                <tr>
                                    <td>Stok tambah</td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="stok_tambah" id="stok_tambah" value="<?= $st->stok_tambah ?>"></td>
                                </tr>

                                <tr>
                                    <td>Stok terjual</td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="stok_terjual" id="stok_terjual" value="<?= $st->stok_terjual ?>"></td>
                                </tr>
                               
                                <tr>
                                    <td> <input type="submit" class="btn btn-sm btn-primary" value="simpan"> </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                
                            </table>
                        </form>
                    </div>    
                </div>      
            </div>    
        </div>              
    </div>                   
</div>                       