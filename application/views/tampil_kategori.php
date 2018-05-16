<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>HTML Education Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
  <body>

    <!-- Header -->
    <header id="header" class="transparent-nav">
      <div class="container">

        <div class="navbar-header">
          <!-- Logo -->
          <div class="navbar-brand">
            <a class="logo" href="home">
              <img src="assets/img/sklh.jpeg" alt="logo">
            </a>
          </div>
          <!-- /Logo -->

          <!-- Mobile toggle -->
          <button class="navbar-toggle">
            <span></span>
          </button>
          <!-- /Mobile toggle -->
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
          <div class="container">
          <ul class="main-menu nav navbar-nav navbar-right">
            <li><a href="home">Home</a></li>
            <li><a href="home">About</a></li>
            <li><a href="blog">Blog</a></li>
            <!-- <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li> -->
          </ul>
        </div>
        </nav>
        <!-- /Navigation -->

      </div>
    </header>
    <!-- /Header -->

    <!-- Home -->
    <div id="home" class="hero-area">

      <!-- Backgound Image -->
      <div class="bg-image bg-parallax overlay" style="background-image:url(assets/img/bg.png)"></div>
      <!-- /Backgound Image -->

      <div class="home-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h1 class="white-text">Wellcome To SMAN 1 KUTOREJO</h1>
              <p class="lead white-text">BERSATU, BERAKSI DAN BERPRESTASI</p>
            </div>
          </div>
        </div>
      </div>
  </div>
<br></br>
<br></br>
  <h1 class="black-text">FORM TAMPIL KATEGORI</h1>
<br></br>
<br></br>
<td><a href='kategori/create' class='btn btn-sm btn-info'>Tambah</a></td>

        <div class="card-content table-responsive">
            <table class="table">
                <thead class="text-primary">
                    <th>Id Kategori</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                    
                </thead>

                <tbody>
                  <?php
                        foreach($kategori as $key):
                  ?>
                  <tr>
                    <td><?php echo $key->id ?></td>
                    <td><?php echo $key->nama ?></td>
                    <td><?php echo $key->deskripsi ?></td>
                    
                    <td>
                      <a href="kategori/edit/ <?php echo $key->id ?>" class="btn btn-primary">Update</a>
                      <a href="kategori/delete/ <?php echo $key->id ?>" class="btn btn-danger">Delete</a></td>
                  </tr>
            </tbody>
            <?php endforeach;?>
        </table>
    </div>

</body>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<footer>
        <div class="col-md-12">
            <ul class="footer-nav">
              <li><a href="home">Home</a></li>
              <li><a href="home">About</a></li>
              <li><a href="blog">Blog</a></li>
              <li><a href="kategori">Kategori</a></li> 
            </ul>
          </div>
 <div class="col-md-8 col-md-pull-4">
            <div class="footer-copyright">
              <span>&copy; Copyright 2018. All Rights Reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com">Colorlib</a></span>
            </div>
          </div>
          <!-- /copyright -->

        </div>
        <!-- row -->

      </div>
      <!-- /container -->

    </footer>
    <!-- /Footer -->

    <!-- preloader -->
    <div id='preloader'><div class='preloader'></div></div>
    <!-- /preloader -->


    <!-- jQuery Plugins -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</html>