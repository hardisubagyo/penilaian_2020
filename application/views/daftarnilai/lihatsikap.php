<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Nilai Sikap & Perilaku Kelas <?php echo $this->uri->segment('3'); ?> Tanggal <?php echo $this->uri->segment('4'); ?></h4>
                    </div>
                </div>
                <br>
                
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success alert-rounded"> <i class="mdi mdi-checkbox-marked-circle-outline"></i> 
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('failed')) { ?>
                    <div class="alert alert-danger alert-rounded"> <i class="mdi mdi-close"></i> 
                        <?php echo $this->session->flashdata('failed'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Siswa</th>
                                    <th width="15%">Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($nilai as $item) { 
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $item->namasiswa; ?></td>
                                        <td><?php echo $item->nilai; ?></td>
                                        <td><?php echo $item->keterangan; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo site_url('DaftarNilai/LihatDetailNilaiSikap/'.$this->uri->segment('3')); ?>">
                    <button type="button" class="btn btn-warning">Kembali</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
       $('#zero_config').DataTable(); 
    });
</script>