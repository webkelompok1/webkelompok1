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
            <a class="btn btn-primary" href="user/edit_data_user/<?php echo $this->session->userdata('id') ?>">Data Diri</a>
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

    
    <br>
    <div class="container">
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                      <?php echo (isset($message))? : "";?>
                                      <?php    
                                        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
                                      ?>
                                      <?php echo validation_errors(); ?>
                                      <?php echo form_open('user/create_user', array('enctype'=>'multipart/form-data')); ?>
                                            <tr>
                                              <th>Username</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" value="<?php echo set_value('username') ?>" type="text" placeholder="Username" name="username" autofocus>
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Password</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" type="password" placeholder="Password" name="password">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Konfirmasi Password</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" type="password" placeholder="Konfirmasi Password" name="password2">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Nama</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" value="<?php echo set_value('nama') ?>" type="text" placeholder="Nama" name="nama">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Email</th>
                                              <td>
                                            <div class="form-group input-group">
                                            <input type="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Email" name="email">
                                            </div>
                                            </td>
                                            </tr>
                                            <tr>
                                                <th>Level Akun</th>
                                                <td>
                                                <div class="form-group">
                                                <select class="form-control" name="level">
                                                  <option value="">Pilih !</option>
                                                  <option value="2">User Premium</option>
                                                  <option value="3">User Regular</option>
                                                </select>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td colspan="3"><button class="btn btn-default"><input type="submit" name="submit" value="Simpan"></button></td>
                                            </tr>
                                      </form>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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