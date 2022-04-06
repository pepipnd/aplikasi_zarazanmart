<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Pages</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Tambah Pages</h4>
                        <br>
                    
                        <form action="<?= base_url('Admin/simpan_pages') ?>" method="post"
						enctype="multipart/form-data">
						<table class="table">
                                <tr>
                                    <td>Title</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="title" id="title"></td>
                                <tr>

                                 <tr>
                                    <td>Content</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                                    </td>
                                <tr>
                                <tr>
                                    <td>Slug</td>
                                    <td>:</td>
                                   <td><input type="text" class="form-control" name="slug" id="slug"></td>
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