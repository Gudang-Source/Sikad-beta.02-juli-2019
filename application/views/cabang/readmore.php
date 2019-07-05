<?php $this->load->view('cabang/header_cabang');?>

<?php foreach($data as $v):?>
    <div class="col-md-12 thumbnail" style="background-image: <?=$v->gambar;?>; ">
        <?php $this->load->model('model_konten');

            echo "<h1 class='text-center'>". $v->judul. "</h1>";
            echo "<p class='text-center'>". $v->id_kader."<br/></p>";
            echo "<h3 class='text-center'><b>". $v->kategori . "</b></h3>";
            echo "<p class='text-justify'>".$v->posting."</p>";
            echo $v->id_kom. "<br>";
            echo $v->id_rayon. "<br>";
            echo "<p style='margin-top: 12px'>". date('l d F-Y', strtotime($v->tanggal)) ."</p>";
       ?>
    </div>
<?php endforeach;?>    
<!-- <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div> -->
<!--starai row isi konten-->

<!--starai row-->

</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php $this->load->view('cabang/footer_cabang');?>