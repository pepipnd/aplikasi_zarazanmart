<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Data Banner
            <a href="<?=base_url('Admin/add_banner') ?>"class="btn 
            btn-success">
                <i class="fas fa-plus"></i>
                Tambah Banner 
            </a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
             <div class="item form-group">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Url</th>   
                        <th>Aksi</th>   
                    </tr>
                </thead>
           <tbody>
                    <?php foreach($banner as $br):
                ?>

                    <tr>
                        <td><?=$br->id; ?></td>
                        <td> <img src="<?=base_url('banner/').$br->img; ?>" width="200px"  > </td>
                        <td><?=$br->url; ?></td>
                        <td>
                            <a href="<?=base_url('Admin/hapusbanner/'.$br->id)?>" class="btn btn-sm btn-danger "> <i class="fa fa-trash"></i></a> 
                            <a href="<?=base_url('Admin/editbanner/'.$br->id)?>" class="btn btn-sm btn-success "> <i class="fa fa-edit"></i></a> 
                        </td>
                    </tr>

                <?php endforeach; ?>

           </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
 </div>