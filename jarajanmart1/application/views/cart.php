<link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/cart.css">
<?php 
    if($this->session->userdata('id')):
?>
<div class="wrapper">
	<div class="core mt-4">
		<div class="product">
			<?php 
				$no=1;
				$grand=0;
				
				foreach($cart as $item): ?>
			<div class="item">
				<div class="item-main">
					<img src="<?= base_url(); ?>product/<?= $item['GAMBAR']; ?>" alt="">
					<h2 class="title mb-0"><?= $item['NAMA']; ?></h2>
					<small class="text-muted">Satuan: Rp
						<?= number_format($item['HARGA_JUAL'],0,",","."); ?></small><br>
					<small class="text-muted">Jumlah: <?= $item['qty']; ?></small><br>
					<?php 
						$total = $item['HARGA_JUAL']*$item['qty'];
					?>
					<h3 class="price mt-0">Total : Rp <?= number_format($total,0,",","."); ?></h3>
					<div class="clearfix"></div>
				</div>
				<a href="<?= base_url('Product/delete_keranjang/').$item['id']; ?>" class="text-dark"
					onclick="return confirm('Yakin ingin menghapus data ini?')">
					<i class="fa fa-trash"></i>
				</a>
			</div>
			<hr>
			<?php 
				$grand += $total;
				$no++;
				endforeach; ?>
		</div>
		<div class="total shadow">
			<h2 class="title">Ringkasan Belanja</h2>
			<hr>
			<form id="payment-form" method="post" action="<?=site_url()?>snap/finish">
				<input type="hidden" name="result_type" id="result-type" value="">
				<input type="hidden" name="result_data" id="result-data" value="">
				<tr>
					<th>Grand Total :</th>
					<th><?= "Rp. ".number_format($grand);?></th>
				</tr>

				<tr>
					<td>
						<button class="btn btn-primary btn btn-block mt-2" id="pay-button"><i class="fa fa-save"></i>
							Selesai dan Bayar</button>
					</td>
				</tr>
				<br>
			</form>
		</div>
	</div>
</div>
<hr>
<?php else:
    $data['heading'] = "ERROR 404";
    $data['message'] = "Halaman Tidak Ditemukan";
    echo"<div class='top-nav'></div>";
    $this->load->view('errors/html/error_404', $data);
    echo "<hr>";
endif;?>

<script type="text/javascript">
	$('#pay-button').click(function (event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");

		var namauser = "<?= $user->nama_lengkap ?>";
		var alamat = "<?= $user->alamat_lengkap?>";
		var no_hp = "<?= $user->no_hp?>";
		var email = "<?= $user->email ?>";
		var bayar = "<?= $grand?>";

		$.ajax({
			type: 'POST',
			url: '<?=site_url()?>/snap/token',
			data: {
				nama: namauser,
				alamat: alamat,
				no_hp: no_hp,
				email: email,
				bayar: bayar
			},
			cache: false,
			success: function (data) {
				//location = data;

				console.log('token = ' + data);

				var resultType = document.getElementById('result-type');
				var resultData = document.getElementById('result-data');

				function changeResult(type, data) {
					$("#result-type").val(type);
					$("#result-data").val(JSON.stringify(data));
				}

				snap.pay(data, {

					onSuccess: function (result) {
						changeResult('success', result);
						console.log(result.status_message);
						console.log(result);
						$("#payment-form").submit();
					},
					onPending: function (result) {
						changeResult('pending', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					},
					onError: function (result) {
						changeResult('error', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					}
				});
			}
		});
	});

</script>
