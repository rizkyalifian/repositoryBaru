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
  

  <div class="container">
  <?php echo validation_errors(); ?>
    <?php 
      echo form_open('v_blog/add', array ('enctype'=>'multipart/form-data'));
      ?>
    <h1> Artikel</h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group">
        <label class="control-label col-sm-2">
          Judul
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="judul" value="<?=isset($default['judul'])? $default['judul'] : ""?>" >
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
      <div class="form-group">
        <label class="control-label col-sm-2">
          Content         
        </label>
        <div class="col-sm-10">
          <textarea name="content" class="form-control" ><?=isset($default['content'])? $default['content'] : ""?></textarea>
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2">Gambar :</label>
         
          <div class="col-sm-10">
            <span class="input-group-addon"><input type="file"  name="gambar" class="file"></span>
          </div><br>
        </div>
         <div class="form-group">
        <label class="control-label col-sm-2">
          Link_Download
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="link_download" value="<?=isset($default['link_download'])? $default['link_download'] : ""?>" >
        </div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2">
          Pengembang
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="Pengembang" value="<?=isset($default['Pengembang'])? $default['Pengembang'] : ""?>" >
        </div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2">
          Publisher
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="Publisher" value="<?=isset($default['Publisher'])? $default['Publisher'] : ""?>" >
        </div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2">
          Platforms
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="Platforms" value="<?=isset($default['Platforms'])? $default['Platforms'] : ""?>" >
        </div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2">
          Rating
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="Rating" value="<?=isset($default['Rating'])? $default['Rating'] : ""?>" >
        </div>
      </div>
      <div class="form-group">
            <label>Kategori</label>
            <?php echo form_dropdown('kat_id', $kategori, set_value('kat_id'), 'class="form-control" required' ); ?>
            <div class="invalid-feedback">Pilih dulu kategorinya gan</div>
          </div>
      <center>
      <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
      </center>
    </form>
  </div>
</body>
</html>
<!-- 
<label>Kategori</label>
            <select class="form-control" name="nama" id="kat_id">
            <option selected>Pilih Kategori</option>
            <?php foreach ($kategori as $key) {?>
              <option value="<?php echo $key->kat_id; ?>"><?php echo $key->Kategori; ?></<?php
            }?>
             </select> -->