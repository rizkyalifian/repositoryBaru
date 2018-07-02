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
                    <td><?php echo $key->kat_id ?></td>
                    <td><?php echo $key->nama ?></td>
                    <td><?php echo $key->deskripsi ?></td>
                    
                    <td>
                      <a href="kategori/edit/ <?php echo $key->kat_id ?>" class="btn btn-primary">Update</a>
                      <a href="kategori/delete/ <?php echo $key->kat_id ?>" class="btn btn-danger">Delete</a></td>
                  </tr>
            </tbody>
            <?php endforeach;?>
        </table>
    </div>

</body>

    <!-- jQuery Plugins -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</html>