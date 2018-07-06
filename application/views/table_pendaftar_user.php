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
                <a class="navbar-brand">Welcome <b><?php echo $this->session->userdata('username') ?></b></a>
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
                        <li><li><?php echo anchor('user/logout','Logout'); ?>
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
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-heading">
                            Data Pendaftar
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID Pendaftar</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Email</th>
                                        <th>Jumlah Tiket</th>
                                        <th>Jenis Tiket</th>
                                        <th>Harga</th>
                                        <th>Total Pembayaran</th>
                                        <th>ID Event</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($pendaftar as $d) : ?>
                                        <tr>
                                        <td><?php echo $d->id ?></td>
                                        <td><?php echo $d->nama ?></td>
                                        <td><?php echo $d->alamat ?></td>
                                        <td><?php echo $d->no_telp ?></td>
                                        <td><?php echo $d->email ?></td>
                                        <td><?php echo $d->qty ?></td>
                                        <td><?php echo $d->jenis_tiket ?></td>
                                        <td><?php echo $d->harga ?></td>
                                        <td><?php echo $d->total_harga ?></td>
                                        <td><?php echo $d->id_event ?></td>
                                        <td>
                                            <?php echo anchor('home/hapus_pendaftar/'.$d->id, 'Delete'); ?> 
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
