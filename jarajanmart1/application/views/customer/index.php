
<!-- Topbar Search -->
<div class="container-fluid">
	<div class="row">
		<form method="POST" action="<?= base_url('Customer/search')?>"
		class=" d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
		<div class="input-group">
			<input type="text" name="search" class="form-control card-body shadow  border-1 small"
				placeholder="Cari Produk..." aria-label="Search" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<input type="submit" value="Cari" class="btn btn-primary">
			</div>
		</div>
		</form>
	</div>
<br><br>
	<div class="row">
		<?php 
		foreach($produk as $prd):
		$sa = $prd->STOK_AWAL;
		$st = $prd->STOK_TAMBAH;
		$sj = $prd->STOK_TERJUAL;
		$stok = $sa+$st-$sj;
		if($stok != 0):
		?>
		<div class="col-xl-3  mb-4">
			<div class="card  shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2  text-center">
							<?php 
							if($prd->GAMBAR):
							?>
							<img src="<?= base_url('product/').$prd->GAMBAR?>" alt="" width="200px"
								height="200px">
							<?php 
							else:
							?>
							<img src="https://st4.depositphotos.com/14953852/22772/v/600/depositphotos_227725020-stock-illustration-image-available-icon-flat-vector.jpg" alt="" width="200px"
								height="200px">
							<?php 	
							endif;
							?>
						</div>
					</div>
				</div>
				<hr>
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xl font-weight-bold text-primary text-uppercase mb-1">	
								<?= $prd->NAMA.' (Stok '.$stok.')';?></div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= "Rp.".number_format($prd->HARGA_JUAL); ?>
							</div>
						</div>
						<div class="col-auto">

							<a href="<?= base_url('Customer/add_chart/').$prd->KODE_BARANG ?>">
                                <button class="btn sm-btn btn-primary"><i class="fa fa-shopping-cart"></i> Beli</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
		endif;
                endforeach;
        ?>
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
	}

	

    $(document).ready(function() {
       loaddata();
    });
 
</script>






