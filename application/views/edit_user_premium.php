<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman User</title>

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

    <style>
    .navbar-default{
        background-color: lightblue;
    }
    </style>

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
                <a class="navbar-brand">Welcome <b><?php echo $this->session->userdata('username') ?></a>
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
                        <li>
                        <?php echo anchor('user/edit_user_premium/'.$this->session->userdata('id'),'Data User'); ?>
                        </li>
                        <li>
                            <a href="">Data Pendaftar (Berdasarkan Event)<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php foreach ($event as $key) { ?>
                                    <?php echo anchor('home/daftar_pendaftar/'.$key->id,$key->nama_event); ?>
                                    <?php } ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                      <?php echo (isset($message))? : "";?>
                                      <?php echo form_open('user/update_user_premium', array('enctype'=>'multipart/form-data')); ?>
                                      <?php foreach($user as $u){ ?>
                                            <tr>
                                              <th>Username</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" type="text" name="username" value="<?php echo $u->username ?>">
                                              <input type="hidden" name="id" value="<?php echo $u->id ?>">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Password</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" type="password" name="password">
                                              <p>Note : Jika ingin ganti Password maka isi field berikut, jika tidak abaikan</p>
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Nama</th>
                                              <td>
                                              <div class="form-group">
                                              <input class="form-control" type="text" name="nama" value="<?php echo $u->nama ?>">
                                              </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th>Email</th>
                                              <td>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" class="form-control" name="email" value="<?php echo $u->email ?>">
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
