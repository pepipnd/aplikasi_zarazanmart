<link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataT">
<div class="wrapper">
	<div class="core mt-3">
		<div class="product">
			<div class="total shadow">
				<h2 class="title badge badge-info">Menu</h2>
				<hr>
				<table class="table table-bordered">
					<tr>
						<th>
                            <a href="<?= base_url('Home/profile') ?>">
                                <i class="fa fa-user"></i> Profil
                            </a>
                        </th>
					</tr>
					<tr>
						<th>
                            <a href="<?= base_url('Home/cart') ?>">    
                                <i class="fa fa-shopping-cart"></i> Keranjang
                            <a>    
                        </th>
					</tr>
					<tr>
						<th>
                            <a href="<?= base_url('Home/user') ?>">     
                                <i class="fa fa-money"></i> Transaksi
                            </a>
                        </th>
					</tr>
					<tr>
						<th>
                            <a href="<?= base_url('Home/ganti_password') ?>">     
                                <i class="fa fa-key"></i> Ubah Password
                            </a>
                        </th>
					</tr>
				</table>
				<br>
				</form>
			</div>
		</div>
		<div class="product col-md-9">
			<div class=" shadow">
                <div class="card-body">
                    <h3>Detail Transaksi</h3>
					<div class="table-responsive">
						<div class="item form-group">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <?php 
                            $no=1;
                            $grand=0;
                            foreach($transaksi as $trs):
                            $total = $trs->jumlah*$trs->HARGA_JUAL;
                        ?>
                        <tbody>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $trs->NAMA;?></td>
                                <td><?= $trs->jumlah;?></td>
                                <td><?= "Rp. ".number_format($trs->HARGA_JUAL);?></td>
                                <td><?=  "Rp. ".number_format($total) ?></td>
                            </tr>         
						</tbody>
                        <?php 
                            $no++;
                            $grand += $total;
                            endforeach;
                        ?> 
                         <tfoot>
                            <tr>
                               <td class="text-right" colspan="4">Grand Total</td>
                               <td><?=  "Rp. ".number_format($grand); ?></td>
                            </tr>         
						</tfoot> 
					</table>
						</div>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>

<hr>

<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>