<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SedekahTIME</title>

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
        <a class="navbar-brand" href="home">SedekahTIME</a>
        <a class="btn btn-primary" href="#">Sign In</a>
      </div>
    </nav>

<div class="container">
 	<?php echo form_open('category/update', array(
  'class' => 'needs-validation',
  'novalidate' => ''
	)); 

	?>
	<?php foreach($user as $u){ ?>
		<table style="margin:20px auto;">
			<tr>
				<td>Nama Kategori</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="cat_name" value="<?php echo  $u->cat_name ?>" required>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
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
            <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
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
