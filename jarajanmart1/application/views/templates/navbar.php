<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="background-color: <?= $this->config->item('navbar_color'); ?>">
  <div class="container">
    <a class="navbar-brand mr-5" href="<?= base_url(); ?>"><h3><?= $this->config->item('app_name'); ?></h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-3" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url(); ?>">Beranda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategori
          </a>
          <?php $categories = $this->Categories_model->getCategories(); ?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Ini Dropdown</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Testimoni</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Kontak</a>
        </li>
      </ul>
      <br>
      <?php 
        @$sesi = $_SESSION['id'];
        if(@$sesi):
      ?>
      
      <div class="navbar-cart-inform ">
        <a href="<?= base_url('Home/user')?>" class="text-decoration-none text-light">
          <i class="fa fa-user"></i> Profile
        </a>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <br>
      
      <div class="navbar-cart-inform " id="navbar-cart-inform">
        <a href="<?= base_url('Home/cart')?>" class="text-decoration-none text-light">
          <i class="fa fa-shopping-cart"></i> (<?=  @$keranjang; ?>)
        </a>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <br>
      <a href="<?= base_url('Login/logout'); ?>" class="text-decoration-none text-light ">
       <i class="fa fa-sign-out">  </i> LogOut
      </a>
      <?php 
        else:
      ?>
      <a href="<?= base_url('Login'); ?>" class="text-decoration-none text-light ">
        <i class="fa fa-sign-in">  </i> Login
      </a>
      <?php endif; ?>
      <br>
      <br>
    </div>
  </div>
</nav>
<div class="top-nav"></div>
