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

    <link rel="stylesheet" href="<?php echo base_url().'/assets/pagination/vendor/bootstrap/css/bootstrap.min.css' ?>">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="home">bukanEventBrite</a>
        <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Kategori
            </button>
        <div class="dropdown-menu">
        <?php foreach ($kategori as $key) {?>
            <a class="dropdown-item" href="home/category/<?php echo $key->id ?>"><?=$key->cat_name;?></a>
        <?php } ?>
        </div>
        <?php if(!$this->session->userdata('logged_in')) : ?>
            <a class="btn btn-primary" href="user/create_user">Buat Akun!</a>
        <?php endif; ?>
        <?php if($this->session->userdata('level') == 1) { ?>
            <a class="btn btn-primary" href="home/halaman_admin">Dashboard</a>
        <?php } ?>
        <?php if($this->session->userdata('level') == 2) { ?>
            <a class="btn btn-primary" href="home/halaman_user/<?php echo $this->session->userdata('id') ?>">Dashboard</a>
        <?php } ?>
        <?php if($this->session->userdata('level') == 3) { ?>
            <a class="btn btn-primary" href="home/data_user/<?php echo $this->session->userdata('id') ?>">Data Diri</a>
        <?php } ?>
        <?php if($this->session->userdata('level') != 3) { ?>
            <a class="btn btn-primary" href="home/create">Buat Event!</a>
        <?php } ?>
        <?php if(!$this->session->userdata('logged_in')) : ?>
            <a class="btn btn-primary" href="user/login">Sign In</a>
        <?php endif; ?>
        <?php if($this->session->userdata('logged_in')) : ?>
            <a class="btn btn-primary" href="user/logout">Logout</a>
        <?php endif; ?>
        </div>
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <form action="<?php echo base_url('home/hasil')?>" action="GET">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Cari event yang mau kamu datengin Disini !</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" name="cari" class="form-control form-control-lg" placeholder="Masukan Keyword...">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary">Search</button>
                </div>
              </div>
          </div>
        </div>
      </div>
      </form>
    </header>

    <br>
    <div class="container">
    <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</div>'; ?>
    <?php endif; ?>

    <div class="row text-center">
      <?php foreach ($results as $key) { ?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <div class="card-body">
              <img class="card-img-top" width="150" height="150" src="<?php echo base_url() .'upload/'. $key->gambar ?>" alt="Card image cap">
              <h4 class="card-title"><?php echo $key->nama_event; ?></h4>
              <p class="card-title"><?php echo $key->deskripsi ?></p>
              <p class="card-title"><b>Lokasi : </b><?php echo $key->lokasi; ?></p>
              <p class="card-title"><b>Harga : </b>Rp.<?php echo $key->harga ?> / </b><?php echo $key->jenis_tiket ?></p>
            </div>
            <div class="card-footer">
            <a href="home/create_pendaftar/<?php echo $key->id ?>" class="btn btn-primary">Daftar !</a>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
      <?php if (isset($links)) { ?>
                <?php echo $links ?>
      <?php } ?>
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

    <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

  </body>

</html>
