<?php $this->load->view('cabang/header_cabang');?>
  
<div class="panel panel-default">
  <div class="panel-heading"><b><?=$title?></b></div>
    <div class="panel-body">  
<?=$this->session->flashdata('pesan')?>
     
      
      <div class="row">
        <div class="col-sm-6">
          <h4 style="border-bottom: 1; margin-bottom: 12px;">UPDATE BACKGROUND DEPAN KTA <hr style="border-color: red; margin-top: 0;"></h4>
          <form action="<?=base_url()?>cabang/update_dpn" method="post" enctype="multipart/form-data">
            <img src="<?=base_url()?>assets/images/kta/<?=$dpn->url?>" class="img img-responsive">
            <div style="margin: 12px 0;">
              <input type="file" name="filefoto" >
              <input type="hidden" name="filelama" class="form-control" value="<?php echo $dpn->url;?>">
              <input type="hidden" name="kode" class="form-control" value="<?php echo $dpn->id;?>">
              <input type="submit" class="btn btn-success" value="Update">
            </div>
          </form>            
        </div>

        <div class="col-sm-6">
          <h4 style="border-bottom: 1; margin-bottom: 12px;">UPDATE BACKGROUND BELAKANG KTA <hr style="border-color: red; margin-top: 0;"></h4>
          <form action="<?=base_url()?>cabang/update_bkg" method="post" enctype="multipart/form-data">
            <img src="<?=base_url()?>assets/images/kta/<?=$bkg->url?>" class="img img-responsive">
            <div style="margin: 12px 0;">
              <input type="file" name="filefoto" >
              <input type="hidden" name="filelama" class="form-control" value="<?php echo $bkg->url;?>">
              <input type="hidden" name="kode" class="form-control" value="<?php echo $bkg->id;?>">
              <input type="submit" class="btn btn-success" value="Update">
            </div>
          </form>
        </div>
      </div>
      

     
    </div>
  </div>
</div> 
<?php $this->load->view('cabang/footer_cabang');?>