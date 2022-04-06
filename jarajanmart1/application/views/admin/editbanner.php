<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Banner</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Edit Banner</h4>
                        <hr>

                        <?php 
                            foreach($editbanner as $eb): 
                            $id = $eb->id;
                            endforeach; 
                        ?>

                       <center><img src="<?= base_url('banner/'.$eb->img)?>" alt="" width="300px"
						height="200px"></center>
                        <br>
                        <form action="<?= base_url('Admin/save_edit_banner') ?>" method="post"
						enctype="multipart/form-data">
                         <input type="hidden" name="id" value="<?= $id ?>">
						<table class="table"> 
                                <tr>
                                    <td>Gambar</td>
                                    <td>:</td>
                                    <td>
                                       <input type="file" class="form-control" name="img" id="img" accept="image/jpeg, image/jpg, image/png" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Url</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="url" id="url" value="<?= $eb->url ?>"></td>
                                 <tr>
                                <td>
                                    <td>
                                         <input type="submit" class="btn btn-sm btn-success" value="simpan"> 
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
</body>

</html>