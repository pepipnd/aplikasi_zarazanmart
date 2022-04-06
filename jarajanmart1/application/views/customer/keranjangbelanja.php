<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja
                          <a href="<?= base_url('Customer');?>">
                                <button class="btn sm-btn btn-primary"><i class="fa fa-plus"></i> Tambah Belanjaan</button>
                          </a>
              </h6>		
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<th>Aksi</th>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Foto</th>
						<th>Qty</th>
						<th>Harga</th>
						<th>Total</th>
					</thead>
					<tbody>
					<?php 
                    $no = 1;
                    $grand =0;
                    foreach($keranjang as $krs): 
                    $total = $krs->qty*$krs->HARGA_JUAL;
                    ?>
					<form action="<?= base_url('Customer/ubahqty/'). $krs->idtmp; ?>" method="POST">
					<tr>
						<td class="text-center">
							<a onClick="return confirm('Delete item ini?')"
								href='<?= base_url('Customer/delete_keranjang/').$krs->idtmp; ?>' type='button'>
								<i class="fa fa-trash text-danger "></i>
							</a>
						</td>
						<td><?= $no; ?></td>
						<td><?= $krs->NAMA; ?></td>
						<td><img src="<?= base_url('product/').$krs->GAMBAR; ?>" alt="" width="100px" height="100px">
						</td>
						
						<td>
								<input type="hidden" name="qtyid">
								<input type="submit" style="visibility: hidden;" />
								<input type="text" name="qty"  value="<?= $krs->qty ?>" class="form-control input-sm" size="1">
							
						</td>
						
						<td><?= "Rp.".number_format($krs->HARGA_JUAL); ?></td>
						<td class="text-right"><?= "Rp.".number_format($total); ?></td>
					</tr>
					</form>
					<?php 
                    $no++;
                    $grand += $total;
                    
					endforeach; 
                    if($keranjang):
                    ?>
					</tbody>
					<tfoot>
						<td class="text-right" colspan="6"></td>
						<td class="text-right"><a href="<?= base_url('Customer/checkout')?>"><button
									class="btn btn-primary">Checkout</button></a> </td>
					</tfoot>
					<?php 
                    endif;
                    ?>
					<tfoot>
						<td class="text-right" colspan="6">Grand Total</td>
						<td class="text-right">Rp.<?= number_format($grand);?></td>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>
    <?php
        $this->load->view('template_user/footer');
    ?>
   <script type="text/javascript">
	$(document).ready(function () {
		$("#qty").hide();
		$("#clickable").click(function (e) {
			$("#clickable").hide();
			$("#qty").show();
		});
	});
  </script>
