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
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Kategori
            </button>
        <div class="dropdown-menu">
        <?php foreach ($kategori as $key) {?>
            <a class="dropdown-item" href="home/category/<?php echo $key->id ?>"><?=$key->cat_name;?></a>
        <?php } ?>
        </div>
            <a class="btn btn-primary" href="#">Sign In</a>
        </div>
      </div>
    </nav>

<div class="container">
  <?php echo (isset($message))? : "";?>

  <?php    
    $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
  ?>

  <?php echo validation_errors(); ?>
  
  <?php echo form_open('home/create', array('enctype'=>'multipart/form-data')); ?>
  <table>
        <tr>
          <td>Nama File</td>
          <td>:</td>
          <td><input type="text" name="nama"></td>
          <?php foreach($user as $u){ ?>
          <input type="hidden" name="id_event" value="<?php echo $u->id ?>">
          <?php } ?>
        </tr>
        <tr>
          <td>Deskripsi</td>
          <td>:</td>
          <td><textarea name="deskripsi"></textarea></td>
        </tr>
        <tr>
          <td>File</td>
          <td>:</td>
          <td><input type="file" name="defile"></td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td>:</td>
            <td><select name="cat_id">
              <option value="">Pilih Kategori</option>
              <?php foreach($categories as $category): ?>
              <option value="<?php echo $category->id; ?>"><?php echo $category->cat_name; ?></option>
              <?php endforeach; ?>
            </select>
            </td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="submit" value="Upload"></td>
        </tr>
  </table>
  </form>
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
            <p class="text-muted small mb-4 mb-lg-0">&copy; SedekahTIME 2018. All Rights Reserved.</p>
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
