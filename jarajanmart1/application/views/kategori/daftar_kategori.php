<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Daftar kategori 
            <a href="<?=base_url('Kategori/add_kategori') ?>"class="btn 
            btn-success">
                <i class="fas fa-plus"></i>
                Tambah Data 
            </a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
             <div class="item form-group">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No kategori</th>
                        <th>Nama kategori</th>
                        <th>Aksi</th>   
                    </tr>
                </thead>
           <tbody>
                    <?php foreach($kategori as $ktg):
                ?>

                    <tr>
                        <td><?=$ktg->id ?></td>
                        <td><?=$ktg->nama_kategori ?></td>
                        <td> <a href="<?=base_url('Kategori/hapuskategori/'.$ktg->id)?>" class="btn btn-sm btn-danger "> <i class="fa fa-trash"></i></a> 
                        <a href="<?=base_url('Kategori/edit_kategori/'.$ktg->id) ?>"class="btn btn-sm btn-primary "> <i class="fa fa-edit"></i> </a> 
                        <a href="<?=base_url('Kategori/view_kategori/'.$ktg->id) ?>"class="btn btn-sm btn-success"> <i class="fa fa-eye"></i> </a></td>
                    </tr>

                <?php endforeach; ?>

           </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
 </div>

