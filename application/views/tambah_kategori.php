<!doctype html>
<html lang="en">
<head>
  <base href="<?=base_url()?>">
  <meta charset="UTF-8">
  <title>Add Blog</title>
  <link rel="stylesheet" href="css/style.css"> 
  <link rel="stylesheet" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css">
  <script src="<?php echo base_url()?>assets/css/bootstrap.js" type="text/javascript"></script>
</head>
<body>
  
    <br><br><br>

  <div class="container">
  <?php echo validation_errors(); ?>
    <?php 
      echo form_open('kategori/create', array ('enctype'=>'multipart/form-data'));
      ?>
    <h1> Kategori</h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group">
        <label class="control-label col-sm-2">
          Nama
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?=isset($default['nama'])? $default['Nama'] : ""?>" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">
          Deskripsi
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="deskripsi" value="<?=isset($default['deskripsi'])? $default['deskripsi'] : ""?>" >
        </div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2">
          Date          
        </label>
        <div class="col-sm-10">
          <input type="date"  class="form-control" name="date" value="<?=isset($default['date'])? $default['date'] : ""?>">
        </div>
      </div>
      
      <center>
      <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
      </center>
    </form>
  </div>
</body>
</html>