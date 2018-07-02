<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>



 <?php foreach ($detail as $key): ?>
          <table>
          <tr class="text-center">
            <td>
              <h3><b><?php echo $key->judul; ?></b><h3>
              </td>
          </tr>
          <tr>
            <td class="text-center">
              <img src="http://localhost/CI3/assets/image/<?php echo $key->gambar;?>" alt="Image" width="500" >
            </td>
          </tr>
          <tr>
            <td class="text-center">
              Diupload tanggal : <?php echo $key->date; ?><br><br>
            </td>
          </tr>
          <tr>
            <td class="text-justify">
              <?php echo $key->content; ?>
            </td>
          </tr>
        </table>
         <?php endforeach ?>
<footer class="container-fluid text-center">
   <div class="col-sm-5">
                  <p>Copyright &copy; 2017</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Developt by Rizky Alifian || Design by Bootstrapious</p>
                </div>
</footer>

</body>
</html>
