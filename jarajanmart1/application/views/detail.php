<style>
	.borderless td, .borderless th {
    border: none;
}
</style>
<div class="top-nav"></div>
<div class="container-fluid ml-3 mr-3">
        <div class="top">
			<div class="main-top">
                <div class="row">
				<div class="img col-md-5 text-center" >
					<img src="<?= base_url(); ?>product/<?= $product['GAMBAR']; ?>" alt="produk" width="300px">
				</div>
				<div class="ket">
					<h3 class="title"><?= $product['NAMA']; ?></h3>
					<!-- <p class="subtitle">Terjual <?= $product['NAMA']; ?> Produk &bull; <?= $product['NAMA']; ?>x Dilihat
					</p> -->
					<hr>
					<?php 
						$stokawal 		= $product['STOK_AWAL'];
						$stoktambah 	= $product['STOK_TAMBAH'];
						$stokterjual 	= $product['STOK_TERJUAL'];
						$stok 			= $stokawal+$stoktambah-$stokterjual;
					?>
					<table class="table borderless">
						<tr>
							<td class="t">Harga</td>
							<td class="price">Rp <?= str_replace(",",".",number_format($product['HARGA_JUAL'])); ?></td>
						</tr>
						<tr>
							<td class="t">Stok</td>
							<td><?= $stok.' '.$product['SATUAN']; ?> </td>
						</tr>
						<tr>
							<td class="t">Jumlah</td>
							<td>
								<button class="btn-info rounded" onclick="minusProduct(<?= $product['HARGA_JUAL']; ?>)">-</button>
								<input disabled type="text" value="1" id="qtyProduct" class="valueJml">
								<button class="btn-info rounded" onclick="plusProduct(<?= $product['HARGA_JUAL']; ?>, <?= $stok ?>)">+</button>
							</td>
						</tr>
						<tr>
							<td class="t">Total</td>
							<td>Rp <span id="detailTotalPrice"><?= $product['HARGA_JUAL']; ?></span>
							</td>
						</tr>
					</table>
					<hr>
					<?php 
						if($this->session->userdata('id')):
					?>
					<button class="btn btn-warning pl-5 pr-5" onclick="buy()">Beli</button>
					<button class="btn btn-primary" onclick="addCart(<?= $product['KODE_BARANG']?>)">Tambah ke Keranjang</button>
					<?php else:?>
						<a href="<?= base_url('Login');?>">
							<button class="btn btn-success pl-5 pr-5" >Login atau Daftar Untuk Berbelanja</button>
						</a>
					<?php endif; ?>
				</div>
                </div>
			</div>
    </div>
</div>
<hr>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    function plusProduct(price, stock){
        var inputJml;
        inputJml = parseInt($("input.valueJml").val());
        inputJml = inputJml + 1;
        newPrice = inputJml * price;

		if(inputJml <= stock){
			$("input.valueJml").val(inputJml);
			$("#detailTotalPrice").text(newPrice);
		}
    }

    function minusProduct(price, stock){
        var inputJml;
        inputJml = parseInt($("input.valueJml").val());
        inputJml = inputJml - 1;
		if(inputJml >= 0){
			newPrice = inputJml * price;
            $("input.valueJml").val(inputJml);
			$("#detailTotalPrice").text(newPrice);
		}
    }

	function addCart(kodebarang){

		var id = kodebarang;
		var qty = parseInt($("input.valueJml").val());
       	$.ajax({
            url: "<?= base_url(); ?>Product/add_to_cart",
            type: "post",
            data: {
                id: id,
                qty: qty
            },
            success: function(data){
				var res = JSON.parse(data);
				total = res.total;
				if(res.status == 200){
					Swal.fire(
						'Ditambahkan!',
						'Data berhasil masuk ke keranjang.',
						'success'
					)
					document.getElementById('navbar-cart-inform').innerHTML = ' <a href="<?= base_url('Home/cart')?>"><div class="text-light"><i class="fa fa-shopping-cart "></i> ('+total+')</div></a>';
				}else{
					Swal.fire(
						'Gagal!'
					)
				}
            }
        })
    }
</script>