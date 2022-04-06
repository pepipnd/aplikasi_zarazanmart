<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> Edit Keranjang Belanja</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <form action="<?= base_url('Customer/save_edit_keranjang')?>" method="post">
					<thead>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Foto</th>
						<th>Qty</th>
						<th>Harga</th>
						<th>Total</th>
					</thead>
					<?php 
                    $no = 1;
                    $grand =0;
                    foreach($keranjang as $krs): 
                    $total = $krs->qty*$krs->HARGA_JUAL;
                    ?>
					<tbody>
					
						<td><?= $no; ?></td>
						<td><?= $krs->NAMA; ?></td>
						<td><img src="<?= base_url('product/').$krs->GAMBAR; ?>" alt="" width="100px"
								height="100px"></td>
						<td>
                            <input type="text" name="qty" id="qty" class="form-control"
								value="<?= $krs->qty ?>">
                        </td>
						<td><?= "Rp.".number_format($krs->HARGA_JUAL); ?></td>
						<td class="text-right"><?= "Rp.".number_format($total); ?></td>
					</tbody>
					<?php 
                    $no++;
                    $grand += $total;
                    endforeach; 
                    if($keranjang):
                    ?>
						<td class="text-right" colspan="5"></td>
						<td class="text-right"><button class="btn btn-primary">Simpan</button></a> </td>
                    <?php 
                    endif;
                    ?>
					</form>
				</table>
			</div>
		</div>
	</div>

</div>
