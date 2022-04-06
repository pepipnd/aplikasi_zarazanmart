<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Tambah Kategori</h4>
                        <br>

                        <form action="<?=base_url('Kategori/simpankategori') ?>" method="post">
                            <table class="table">
                                <tr>
                                    <td>Nama Kategori</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="nama_kategori" id="nama_kategori" ></td>
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