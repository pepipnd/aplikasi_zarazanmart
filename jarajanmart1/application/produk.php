''  <div class="container-fluid">
  	<!-- Page Heading -->
  	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
  		<div class="card-header py-3">
  			<h6 class="m-0 font-weight-bold text-primary">Data Produk
				<a href="<?= base_url('Product/tambah_product');?>">
					<button class="btn sm-btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
				</a>
			</h6>
  		</div>
  		<div class="card-body">
  			<div class="table-responsive">
  				<table class="table table-bordered"  id="table" class="display" cellspacing="0" width="100%" >
  					<thead>
  						<th>Kode Barang</th>
  						<th>Barcode</th>
  						<th>Gambar</th>
  						<th>Nama</th>
  						<th>Harga beli</th>
  						<th>Harga jual</th>
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
    });
 
</script>



