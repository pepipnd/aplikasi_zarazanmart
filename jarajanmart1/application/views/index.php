<style>
  @media only screen and (max-width: 600px) {
  #searchdata {
     margin-top: 25px;
     width: 15%;
     margin: auto;
  }
}
</style>
<div class="category-menu">
    <div class="main-category">
      
      <?php foreach($categoriesLimit->result_array() as $c): ?>
        <a href="<?= base_url(); ?>c/<?= $c['nama_kategori']; ?>">
          <div class="item">
              <img src="<?= base_url(); ?>assets/images/icon/<?= $c['icon']; ?>">
              <p><?= $c['nama_kategori']; ?></p>
          </div>
        </a>
      <?php endforeach; ?>
      <div class="item" data-toggle="modal" data-target="#modalMoreCategory">
          <img src="<?= base_url(); ?>assets/images/icon/category-more.svg">
          <p>Lainnya</p>
      </div>
    </div>
</div>
<br>

<div class="container ">
<hr>
      <form method="POST" action="<?= base_url('Home/search')?>">
			<div class="row">
				<div class="col-md-6">
					<input type="text" name="search" class="form-control" id="" placeholder="Cari Produk disini...">
				</div>
				<div class="col-md-2">
					<input type="submit"  name="search" class="form-control btn-info " id="searchdata" value="Cari">
				</div>
			</div>
		</form>
</div>

<br>

<div class="product-wrapper">
  <h2 class="title">Produk</h2>
  <hr>
  <div class="main-product">
    <?php if($recent->num_rows() > 0){ ?>
    <?php foreach($recent->result_array() as $p): ?>
        <a href="<?= base_url('Product/detail/').$p['KODE_BARANG']; ?>">
          <div class="card">
              <?php 
                if($p['GAMBAR']):
              ?>
                <img src="<?= base_url(); ?>product/<?= $p['GAMBAR']; ?>" class="img" width="120px" height="120px">
            <?php 
            else:
            ?>
                <img src="<?= base_url(); ?>product/no_image.png" class="img" width="120px" height="120px">
            <?php 
            endif;
            ?>
             <div class="card-body">
              <p class="card-text mb-0"><?= $p['NAMA']; ?></p>
              <?php 
                $stok_awal    = $p['STOK_AWAL'];
                $stok_tambah  = $p['STOK_TAMBAH'];
                $stok_terjual = $p['STOK_TERJUAL'];
                $satuan       = $p['SATUAN'];

                $stok = $stok_awal+$stok_tambah-$stok_terjual;
              ?>
              Stok : <?= "(". $stok.' '.$satuan.")"; ?>
                <!-- <p class="oldPrice mb-0">Rp <?= str_replace(",",".",number_format($p['HARGA_JUAL'])); ?></p> -->
                    <p class="newPrice">Rp <?= str_replace(",",".",number_format($p['HARGA_JUAL'])); ?></p>
            </div>
          </div>
        </a>
    <?php endforeach; ?>
    <?php }else{ ?>
      <div class="alert alert-warning">Upss.. Belum ada produk!</div>
    <?php } ?>
  </div>
  <?php if($allProducts->num_rows() > 12){ ?>
    <a href="<?= base_url(); ?>products"><button class="more">Selengkapnya</button></a>
  <?php } ?>
</div>