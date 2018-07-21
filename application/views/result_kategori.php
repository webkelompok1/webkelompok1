<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>bukanEventBrite</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'/assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url().'/assets/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css'?>">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'/assets/css/landing-page.min.css' ?>" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <?php echo anchor('home','bukanEventBrite', array('class' => 'navbar-brand')); ?>
        <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Kategori
            </button>
        <div class="dropdown-menu">
        <?php foreach ($kategori as $key) {?>
            <?php echo anchor('home/category/'.$key->id,$key->cat_name, array('class' => 'dropdown-item')); ?>
        <?php } ?>
        </div>
        <?php if(!$this->session->userdata('logged_in')) : ?>
            <?php echo anchor('user/create_user','Buat Akun!', array('class' => 'btn btn-primary')); ?>
        <?php endif; ?>
        <?php if($this->session->userdata('level') == 1) { ?>
            <?php echo anchor('home/halaman_admin','Dashboard', array('class' => 'btn btn-primary')); ?>
        <?php } ?>
        <?php if($this->session->userdata('level') == 2) { ?>
            <?php echo anchor('home/halaman_user/'.$this->session->userdata('id'),'Dashboard', array('class' => 'btn btn-primary')); ?>
        <?php } ?>
        <?php if($this->session->userdata('level') == 3) { ?>
            <?php echo anchor('user/edit_user_regular/'.$this->session->userdata('id'),'Data Diri', array('class' => 'btn btn-primary')); ?>
        <?php } ?>
        <?php if($this->session->userdata('level') != 3) { ?>
            <?php echo anchor('home/create','Buat Event!', array('class' => 'btn btn-primary')); ?>
        <?php } ?>
        <?php if(!$this->session->userdata('logged_in')) : ?>
            <?php echo anchor('user/login','Sign In', array('class' => 'btn btn-primary')); ?>
        <?php endif; ?>
        <?php if($this->session->userdata('logged_in')) : ?>
            <?php echo anchor('user/logout','Logout', array('class' => 'btn btn-primary')); ?>
        <?php endif; ?>
        </div>
      </div>
    </nav>

    
    <br>
    <div class="container">
    <div class="row text-center">
      <?php foreach ($detail as $a) { ?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <div class="card-body">
              <img class="card-img-top" src="<?php echo base_url() .'upload/'. $a->gambar ?>" alt="Card image cap">
              <h4 class="card-title"><?php echo $a->nama_event; ?></h4>
              <p class="card-title"><?php echo $a->deskripsi; ?></p>
              <p class="card-title"><b>Lokasi : </b><?php echo $a->lokasi; ?></p>
              <p class="card-title"><b>Harga : Rp.</b>Rp.<?php echo $a->harga ?> / </b><?php echo $a->jenis_tiket ?></p>
            </div>
            <div class="card-footer">
            <?php echo anchor('home/create_pendaftar/'.$a->event_id,'Daftar !', array('class' => 'btn btn-primary')); ?>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
      </div>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; bukanEventBrite 2018. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url().'/assets/vendor/jquery/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

  </body>

</html>
