<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Data sosial media
            <a href="<?=base_url('Admin/add_sm') ?>"class="btn 
            btn-success">
                <i class="fas fa-plus"></i>
                Tambah Social Media 
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
                        <th>Nama</th>
                        <th>icon</th>   
                        <th>link</th>   
                        <th>Aksi</th>   
                    </tr>
                </thead>
           <tbody>
                    <?php foreach($sosialmedia as $sm):
                    ?>

                    <tr>
                        <td><?=$sm->id; ?></td>
                        <td><?=$sm->name; ?></td>
                        <td> <img src="<?=base_url('sosmed/').$sm->icon; ?>" width="50px" height="50px"> </td>
                        <td><?=$sm->link; ?></td>
                         <td>
                            <a href="<?=base_url('Admin/hapussm/'.$sm->id)?>" class="btn btn-sm btn-danger "> <i class="fa fa-trash"></i></a> 
                            <a href="<?=base_url('Admin/editsm/'.$sm->id)?>" class="btn btn-sm btn-success "> <i class="fa fa-edit"></i></a> 
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