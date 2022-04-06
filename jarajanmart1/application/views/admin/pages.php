<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Data Pages
            <a href="<?=base_url('Admin/add_pages') ?>"class="btn 
            btn-success">
                <i class="fas fa-plus"></i>
                Tambah Pages 
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
                        <th>Title</th>
                        <th>Content</th>   
                        <th>Slug</th>   
                        <th>Aksi</th>   
                    </tr>
                </thead>
           <tbody>
                    <?php foreach($pages as $pg):
                       $tampil_sebagian = substr($pg->content, 0, 100);
                    ?>

                    <tr>
                        <td><?=$pg->id; ?></td>
                        <td><?=$pg->title; ?></td>
                        <td><?= $tampil_sebagian."...."?></td>
                        <td><?=$pg->slug; ?></td>
                         <td>
                            <a href="<?=base_url('Admin/hapusp/'.$pg->id)?>" class="btn btn-sm btn-danger "> <i class="fa fa-trash"></i></a> 
                            <a href="<?=base_url('Admin/editp/'.$pg->id)?>" class="btn btn-sm btn-success "> <i class="fa fa-edit"></i></a> 
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