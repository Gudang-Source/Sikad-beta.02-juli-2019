<div class="page-header">
	<h1>
		ADMIN CABANG
	</h1>
</div><!-- /.page-header -->

<div class="alert alert-block alert-info text-center">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>
    <p>
        <img class="img-responsive img-thumbnail" src="<?=base_url();?>assets/images/logo/pc_pmii.jpg"  />
    </p>    
</div>

    <?php if(!empty($from_kom) || !empty($from_pr) || !empty($from_mm)){?>
        <?php foreach($from_kom as $v) :?>
            <div class="col-md-4 col-xs-12 text-center">
                <div class="thumbnail">
                    <h3>Konten Dari Komisariat</h3>
                    <h4><?=$v->j?></h4>
                    <?php echo anchor('cabang/get_all_news/'.$v->id_pengurus.'/Komisariat', 'ReadMore', "class='btn btn-xs btn-primary'");?>
                </div>
            </div>
        <?php endforeach;?>

        <?php foreach($from_pr as $v) :?>
            <div class="col-md-4 col-xs-12 text-center">
                <div class="thumbnail">
                    <h3>Konten Dari Rayon</h3>
                    <h4><?=$v->j?></h4>
                    <?php echo anchor('cabang/get_all_news/'.$v->id_pengurus.'/Rayon', 'ReadMore', "class='btn btn-xs btn-primary'");?>
                </div>
            </div>
        <?php endforeach;?>

        <?php foreach($from_mm as $v) :?>
            <div class="col-md-4 col-xs-12 text-center">
                <div class="thumbnail">
                    <h3>Konten Dari Kader</h3>
                    <h4><?=$v->j?></h4>
                    <?php echo anchor('cabang/get_all_news/'.$v->id_pengurus.'/kader', 'ReadMore', "class='btn btn-xs btn-primary'");?>
                </div>
            </div>
        <?php endforeach;?>

    <?php }else{?>
        <div class="col-md-12">
            <h1>Tidak Ada Kabar</h1>
        </div>   
    <?php }?>



<!-- <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div> -->
<!--starai row isi konten-->

<!--starai row-->

</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<script type="text/javascript" src="<?=base_url()?>assets/js/plugin/highcharts.js"></script>
<script src="<?=base_url()?>assets/js/plugin/highcharts-3d.js"></script>
<script src="<?=base_url()?>assets/js/plugin/modules/exporting.js"></script>
