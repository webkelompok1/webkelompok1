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
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                      <?php echo (isset($message))? : "";?>
                                      <?php    
                                        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
                                      ?>
                                      <?php echo validation_errors(); ?>
                                      <?php echo form_open('home/create_pendaftar', array('enctype'=>'multipart/form-data')); ?>
                                            <tr>
                                              <th>Nama</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" type="text" value="<?php echo set_value('nama') ?>" name="nama">
                                              <?php foreach($user as $u){ ?>
                                              <input type="hidden" name="id_event" value="<?php echo $u->event_id ?>">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Alamat</th>
                                              <td>
                                              <div class="form-group">
                                              <textarea name="alamat" rows="2" value="<?php echo set_value('alamat') ?>" class="form-control"></textarea>
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Nomor Telepon</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" value="<?php echo set_value('no_telp') ?>" type="text" name="no_telp">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Email</th>
                                              <td>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" class="form-control"  value="<?php echo set_value('email') ?>" placeholder="Email" name="email">
                                            </div>
                                            </td>
                                            </tr>
                                            <tr>
                                              <th>Jumlah Tiket</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" value="<?php echo set_value('qty') ?>" type="text" name="qty">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Tiket</th>
                                                <td>
                                                <div class="form-group">
                                                <input class="form-control" type="text" name="jenis_tiket" value="<?php echo $u->jenis_tiket ?>">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Harga Tiket</th>
                                                <td>
                                                <div class="form-group">
                                                <input class="form-control" type="text" name="harga" value="<?php echo $u->harga ?>">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <div class="form-group">
                                                <input class="form-control" type="checkbox" name="check">
                                                </div>
                                                </td>
                                                <td>
                                                <p>Data Registrasi akan dikirimkan melalui E-mail / SMS, Pastikan E-mail / Nomor Telepon anda aktif.</p>
                                                <p>Pastikan data yang anda masukan sesuai dengan persyaratan dan terbukti kebenaranya.</p>
                                                <p>Jika ada kesalahan data, Hubungi cs@websiteini.com</p>
                                                <p><b>PASTIKAN ANDA KLIK CENTANG PADA BAGIAN KIRI PERNYATAAN INI!</b></p>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td colspan="3"><button class="btn btn-default"><input type="submit" name="submit" value="Simpan"></button></td>
                                            </tr>
                                            <?php } ?>
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