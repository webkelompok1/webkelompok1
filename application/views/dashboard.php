<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>bukanEventBrite</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/admin/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url().'assets/admin/vendor/metisMenu/metisMenu.min.css' ?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url().'assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css' ?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url().'assets/admin/vendor/datatables-responsive/dataTables.responsive.css' ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/admin/dist/css/sb-admin-2.css' ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url().'assets/admin/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">

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
            <a class="btn btn-primary" href="home/create">Buat Event!</a>
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Kategori
            </button>
        <div class="dropdown-menu">
        <?php foreach ($kategori as $key) {?>
            <a class="dropdown-item" href="home/category/<?php echo $key->id ?>"><?=$key->cat_name;?></a>
        <?php } ?>
        </div>
        <?php if(!$this->session->userdata('logged_in')) : ?>
            <a class="btn btn-primary" href="user/login">Sign In</a>
        <?php endif; ?>
        <?php if($this->session->userdata('logged_in')) : ?>
            <a class="btn btn-primary" href="user/logout">Logout</a>
        <?php endif; ?>
        </div>
      </div>
    </nav>
        <div class="container">
          <div id="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID Event</th>
                                        <th>Nama Event</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal Acara</th>
                                        <th>Waktu</th>
                                        <th>Gambar / Poster</th>
                                        <th>Jenis Tiket</th>
                                        <th>Harga</th>
                                        <th>Lokasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($event as $d) : ?>
                                        <tr>
                                        <td><?php echo $d->id ?></td>
                                        <td><?php echo $d->nama_event ?></td>
                                        <td><?php echo $d->deskripsi ?></td>
                                        <td><?php echo $d->tgl_event ?></td>
                                        <td><?php echo $d->waktu ?></td>
                                        <td><?php echo $d->gambar ?></td>
                                        <td><?php echo $d->jenis_tiket ?></td>
                                        <td><?php echo $d->harga ?></td>
                                        <td><?php echo $d->lokasi ?></td>
                                        <td>
                                            <?php echo anchor('home/edit/'.$d->id,'Edit'); ?> 
                                            <?php echo anchor('home/hapus/'.$d->id, 'Delete'); ?> 
                                        </td>
                                        </tr>
                                    <?php endforeach; ?> 
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
     <script src="<?php echo base_url().'/assets/admin/vendor/jquery/jquery.min.js' ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/admin/vendor/bootstrap/js/bootstrap.min.js' ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url().'assets/admin/vendor/metisMenu/metisMenu.min.js' ?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url().'assets/admin/vendor/datatables/js/jquery.dataTables.min.js' ?>"></script>
    <script src="<?php echo base_url().'assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url().'assets/admin/vendor/datatables-responsive/dataTables.responsive.js' ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url().'assets/admin/dist/js/sb-admin-2.js' ?>"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

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
