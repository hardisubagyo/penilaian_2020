<div class="row">
    <div class="col-12">
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <?php foreach ($slide as $item) { ?>
                    <div class="carousel-item <?php if($item->id_slide == $max->maxid){ echo "active"; }else{} ?>">
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/foto/<?php echo $item->nama; ?>" width="100%" alt="First slide">
                    </div>        
                <?php } ?>

            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">10 Siswa Nilai Terbaik</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="campaign ct-charts"></div>
                    </div>
                    <!-- column -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Info Box -->
            <!-- ============================================================== -->
            
        </div>
    </div>
</div>