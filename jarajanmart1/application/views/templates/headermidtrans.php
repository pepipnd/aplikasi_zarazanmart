<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/app-responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/<?= $css;  ?>.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/<?= $responsive;  ?>.css">

    <link
      rel="shortcut icon"
      href="<?= base_url();  ?>assets/images/logo/favicon.png"
      type="image/x-icon"
    />

    <script
      src="https://kit.fontawesome.com/2baad1d54e.js"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="<?= base_url();  ?>assets/icofont/icofont.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
    <link rel="stylesheet" href="<?= base_url(); ?>assets/select2-4.0.6-rc.1/dist/css/select2.min.css">

    <title><?= $title ?></title>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-MQtfw_vwciozqUcs"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>

  <div class="loading-animation-screen">
    <div class="overlay-screen"></div>
    <img src="<?= base_url(); ?>assets/images/icon/loading.gif" alt="loading.." class="img-loading">
  </div>

  <?php
  $setting = $this->db->get('settings')->row_array();
  $dateNow = date('Y-m-d H:i');
  $dateDB = $setting['promo_time'];
  $dateDBNew = str_replace("T"," ",$dateDB);
  if($dateNow >= $dateDBNew){
    $this->db->set('promo', 0);
    $this->db->update('settings');
  }
  ?>