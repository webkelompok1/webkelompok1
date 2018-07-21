<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php if($this->session->userdata('level') == 1) { ?>
    <title>Halaman Admin</title>
    <?php } ?>
    <?php if($this->session->userdata('level') == 2) { ?>
    <title>Halaman User</title>
    <?php } ?>


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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php if($this->session->userdata('level') == 1) { ?>
                <a class="navbar-brand">Admin</a>
                <?php } ?>
                <?php if($this->session->userdata('level') == 2) { ?>
                <a class="navbar-brand">Welcome <b><?php echo $this->session->userdata('username') ?></b></a>
                <?php } ?>
                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><?php echo anchor('user/logout','Logout'); ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php if($this->session->userdata('level') == 1) { ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <?php echo anchor('home','Halaman Utama'); ?>
                        </li>
                        <li>
                            <?php echo anchor('home/halaman_admin','Halaman Dashboard'); ?>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Daftar Table<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php echo anchor('home/table_event','Table Event'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('home/table_pendaftar','Table Pendaftar'); ?>
                                </li>
                                <li>
                                    <?php echo anchor('home/table_user','Table User'); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <?php } ?>
            <?php if($this->session->userdata('level') == 2) { ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                         <?php echo anchor('home','Halaman Utama'); ?>
                        </li>
                        <li>
                        <?php echo anchor('home/halaman_user/'.$this->session->userdata('id'),'Halaman Dashboard'); ?>
                        </li>
                        <li>
                        <?php echo anchor('home/daftar_event/'.$this->session->userdata('id'),'Data Event'); ?>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <?php } ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Event
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                      <?php echo (isset($message))? : "";?>
                                      <?php echo form_open('home/update', array('enctype'=>'multipart/form-data')); ?>
                                      <?php foreach($user as $u){ ?>     
                                            <tr>
                                              <th>Nama Event</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" type="text" name="nama" value="<?php echo $u->nama_event ?>">
                                              <input type="hidden" name="id" value="<?php echo $u->event_id ?>">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Deskripsi</th>
                                              <td>
                                              <div class="form-group">  
                                              <textarea class="form-control" name="deskripsi"><?php echo $u->deskripsi ?></textarea>
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Poster / Gambar</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" type="file" name="isi_file">
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
                                                <th>Tanggal</th>
                                                <td>
                                                <div class="form-group">
                                                <input class="form-control" type="date" name="tgl" value="<?php echo $u->tgl_event ?>">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Waktu</th>
                                                <td>
                                                <div class="form-group">
                                                <input class="form-control" type="time" name="waktu" value="<?php echo $u->waktu ?>">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Lokasi</th>
                                                <td>
                                                <div class="form-group">
                                                <textarea class="form-control" name="lokasi" rows="2"><?php echo $u->lokasi ?></textarea>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td>
                                                <div class="form-group">
                                                <select class="form-control" name="cat_id">
                                                  <option value="">Pilih Kategori</option>
                                                  <?php foreach($categories as $category): ?>
                                                  <option value="<?php echo $category->id; ?>"><?php echo $category->cat_name; ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                                </div>
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
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
