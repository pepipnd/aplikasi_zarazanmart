<div class="container-fluid">
  	<!-- Page Heading -->
  	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
  		<div class="card-header py-3">
  			<h6 class="m-0 font-weight-bold text-success">Data stok
               <a href="<?=base_url('Stok/tambah_stok') ?>"><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button></a> 
                </a>
            </h6>
  		</div>
  		<div class="card-body">
  			<div class="table-responsive">
  				<table class="table table-bordered" id="table" width="100%" cellspacing="0" >
  					<thead>
  						<th>Kode Stok</th>
  						<th>Nama barang</th>
  						<th>Stok awal</th>
  						<th>Stok tambah</th>
  						<th>Stok terjual</th>
  						<th>Stok aktif</th>
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

 <script type="text/javascript">

	


    $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({ 
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo site_url('Stok/get_data_stok')?>",
                "type": "POST"
            },
			
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });

		$("#asaasas10001").click(function () {
		// var produk = $(this).attr('data-id');
		// var nama = $(this).attr('data-nama');
		// $("#idproduk").val(produk);
		// $("#namaproduk").val(nama);

		alert("hai");
		});
    });
 
</script>