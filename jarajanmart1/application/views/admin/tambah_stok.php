<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Tambah Stok</h4>
                        <br>
                        <form action="<?=base_url('Stok/simpan_stok') ?>" method="post">
                            <table class="table">

                                <tr>
                                    <td>Nama produk</td>
                                    <td>:</td>
                                   <td>
                                       <select name="nama_produk" id="nama_produk" class="form-control">
                                        <?php foreach($produk as $pd): ?>
                                        <option value="<?= $pd->id?>"><?= $pd->nama_produk?></option>
                                        <?php endforeach ;?>
                                    </select>
                                   </td>
                                </tr>
                                <tr>
                                    <td>Stok awal</td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="stok_awal" id="stok_awal" ></td>
                                </tr>

                                <tr>
                                    <td>Stok tambah</td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="stok_tambah" id="stok_tambah" ></td>
                                </tr>

                                <tr>
                                    <td>Stok terjual</td>
                                    <td>:</td>
                                   <td><input type="number" class="form-control" name="stok_terjual" id="stok_terjual" ></td>
                                </tr>

                                <tr>
                                   <td> <input type="submit" value="simpan" class="btn btn-sm btn-primary"> </td>
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