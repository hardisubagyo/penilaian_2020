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
<div class="row m-t-30">
    <div class="col-md-6">
        <div class="card text-white bg-danger">
            <div class="card-header">
                <h4 class="m-b-0 text-white">KOPASSUS</h4></div>
            <div class="card-body">
                <h3 class="card-title"><?php echo $kopassus->total; ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-warning">
            <div class="card-header">
                <h4 class="m-b-0 text-white">NON KOPASSUS</h4></div>
            <div class="card-body">
                <h3 class="card-title"><?php echo $nonkopassus->total; ?></h3>
            </div>
        </div>
    </div>
    
</div>

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
                    <div class="col-lg-12">
                        <div class="campaign ct-charts"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Rata-rata Nilai Persiswa</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="chart1 ct-charts" style="height: 300px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        "use strict";

        var chart = new Chartist.Line('.campaign', {
            labels: [
                        <?php 
                            foreach($nilai as $item){
                                echo "'".$item->nama."',";
                            }
                        ?>
                    ],
            series: [
                        [
                            <?php 
                                foreach($nilai as $item){
                                    echo $item->total.",";
                                }
                            ?>
                        ]
                    ]
            }, {
            showArea: true,
            fullWidth: true,
            plugins: [
                Chartist.plugins.tooltip()
            ],
            axisY: {
                onlyInteger: true,
                scaleMinSpace: 40,
                offset: 20,
                labelInterpolationFnc: function(value) {
                    return (value / 1) + 'k';
                }
            },

        });

        chart.on('draw', function(ctx) {
            if (ctx.type === 'area') {
                ctx.element.attr({
                    x1: ctx.x1 + 0.001
                });
            }
        });

        chart.on('created', function(ctx) {
            var defs = ctx.svg.elem('defs');
            defs.elem('linearGradient', {
                id: 'gradient',
                x1: 0,
                y1: 1,
                x2: 0,
                y2: 0
            }).elem('stop', {
                offset: 0,
                'stop-color': 'rgba(255, 255, 255, 1)'
            }).parent().elem('stop', {
                offset: 1,
                'stop-color': 'rgba(64, 196, 255, 1)'
            });
        });

        /*Rata-rata*/
        new Chartist.Bar('.chart1', {
            labels: [
                    <?php 
                        foreach($kkm as $item){
                            echo "'".$item->nama."',";
                        }
                    ?>
                ],
            series: [
                [
                    <?php 
                        foreach($nilai as $item){
                            echo "'".$item->total."',";
                        }
                    ?>
                ]
            ]
        }, {
            stackBars: true,
            axisY: {
                labelInterpolationFnc: function(value) {
                    return value;
                }
            },
            axisX: {
                showGrid: false
            },
            plugins: [
                Chartist.plugins.tooltip()
            ],
            seriesBarDistance: 1,
            chartPadding: {
                top: 15,
                right: 15,
                bottom: 5,
                left: 0
            }
        }).on('draw', function(data) {
            if (data.type === 'bar') {
                data.element.attr({
                    style: 'stroke-width: 25px'
                });
            }
        });


    });
</script>