<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Akun 
            <a href="<?=base_url('Admin/add_akun') ?>"class="btn 
            btn-success">
                <i class="fas fa-plus"></i>
                Tambah Akun 
            </a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
             <div class="item form-group">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Lengkap</th>
                        <th>No hp</th>   
                        <th>Alamat Lengkap</th>   
                        <th>Email</th>   
                        <th>Level</th>   
                        <th>Foto</th>   
                        <th>Aksi</th>   
                    </tr>
                </thead>
           <tbody>
                    <?php foreach($akun as $ak):
                ?>

                    <tr>
                        <td><?=$ak->id ?></td>
                        <td><?=$ak->nama_lengkap ?></td>
                        <td><?=$ak->no_hp ?></td>
                        <td><?=$ak->alamat_lengkap ?></td>
                        <td><?=$ak->email ?></td>
                        <td><?=$ak->level ?></td>
  						<td class="text-center"><img src="<?= base_url('foto/'). $ak->foto; ?>" alt="" width="50px" height="50px"></td>
                        <td>
                            <a href="<?=base_url('Admin/hapusakun/'.$ak->id)?>" class="btn btn-sm btn-danger "> <i class="fa fa-trash"></i></a> 
                            <a href="<?=base_url('Admin/editakun/'.$ak->id)?>" class="btn btn-sm btn-primary "> <i class="fa fa-edit"></i></a> 
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