<head>
    <title><?=$title?></title> <!-- variabel diambil dari controller -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="icon" href="<?=base_url()?>assets/images/logo/pmii.jpg">
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet"> <!-- Custom styles for this template -->
<style>
    body{
        margin:20px 10%;
    }
</style>
</head>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <div class="panel-heading"><b><?=$title?></b></div>
  <div class="panel-body">
  <?=$this->session->flashdata('pesan')?>
     <form action="<?=base_url()?>member/updatefoto" method="post" enctype="multipart/form-data"><!-- form action mengarah ke fungsi update pada controller -->
       <table class="table table-striped">
         <tr>
         <?php foreach ($data as $row ) {?>
          <td style="width:15%;">File Foto</td>
          <td>
            <div class="col-sm-6">
                <input type="file" name="filefoto" >
                <!-- file gambar kita buat pada field hidden -->
                <input type="hidden" name="filelama" class="form-control" value="<?php echo $row['foto'];?>">
                <!-- Id gambar kita hidden pada input field dimana berfungsi sebagai identitas yang dibawa untuk update -->
                <input type="hidden" name="kode" class="form-control" value="<?php echo $row['id'];?>">
            </div>
            <div class="col-sm-6 align-right">
                <img src="<?=base_url()?>assets/foto/<?=$row['foto']?>" alt="" style="width:50%"></div>
            </td>
            <?php };?>
         </tr>
         <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Update">
            <button type="reset" class="btn btn-default" onclick="history.back()">Batal</button>
          </td>
         </tr>
       </table>
     </form>
      </div>
  </div>    <!-- /panel -->
</div>