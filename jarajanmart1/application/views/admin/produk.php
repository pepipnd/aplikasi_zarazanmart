  <div class="container-fluid">
  	<!-- Page Heading -->
  	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
  		<div class="card-header py-3">
  			<h6 class="m-0 font-weight-bold text-success">Data Produk
				<a href="<?= base_url('Product/tambah_product');?>">
					<button class="btn sm-btn btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
				</a>
			</h6>
  		</div>
  		<div class="card-body">
  			<div class="table-responsive">
  				<table class="table table-bordered"  id="table" class="display" cellspacing="0" width="100%" >
  					<thead>
  						<th>Kode Barang</th>
  						<th>Gambar</th>
  						<th>Nama</th>
  						<th>Harga beli</th>
  						<th>Harga jual</th>
  						<th>Aksi</th>
  					</thead>
  					<tbody>   
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>

<?php 
	$this->load->view('template/footer');
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
	function loaddata() {
		$('#table').DataTable().destroy();
		
		var table = $('#table').DataTable({ 
			"pageLength": 20,
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Product/get_data_produk')?>",
                "type": "POST"
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });

		$("#table").on('click', '.btndelete', function() {
			var id = this.id;
			delete_data(id);
		}); 
	}

	function delete_data(id)
	{
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Akan menghapus data ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				
				$.ajax({
					url: "<?php echo site_url('Product/delete_data');?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function (data) {
						alert("hai");
					}
				});
				Swal.fire(
					'Deleted!',
					'Data berhasil dihapus.',
					'success'
				)
				loaddata();
				
			}
		})
	}

    $(document).ready(function() {
       loaddata();
    });
 
</script>



