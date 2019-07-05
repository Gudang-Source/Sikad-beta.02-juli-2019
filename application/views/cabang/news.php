<?php $this->load->view('cabang/header_cabang');?>


<?php if(!empty($data)){
 foreach($data as $v):?>
    <div class="col-md-3 text-center thumbnail" style="margin-right: 2px; ">
        <?php
            echo "<h3>". $v->judul. "</h3>";
            echo $v->id_kader."<br/>";
            echo date('l d F-Y', strtotime($v->tanggal))."<br/>";
            echo "<b>". $v->kategori . "</b>";
            echo "<p>".word_limiter($v->posting, 3)."</p>";
            echo anchor('cabang/read_news/'.$v->id_konten.'/'.$v->judul, 'ReadMore', "class='btn btn-xs btn-primary'" );
       ?>
    </div>

<?php endforeach;?>
<?php }else{ ?>    
    <div class="col-md-3 text-center thumbnail" style="margin-right: 2px; ">
        <h3><span class="fa fa-database"></span> Tidak ada data</h3>
    </div>    
<?php }?>
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php $this->load->view('cabang/footer_cabang');?>