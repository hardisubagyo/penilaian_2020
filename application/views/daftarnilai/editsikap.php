<div class="row">
    <div class="col-12">
        <div class="card">
            <form method="post" action="<?php echo site_url('DaftarNilai/ubahsikap'); ?>">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Edit Nilai Sikap & Perilaku Kelas <?php echo $this->uri->segment('3'); ?> Tanggal <?php echo $this->uri->segment('4'); ?></h4>
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
                                            <td>
                                                <?php echo $item->namasiswa; ?>        
                                            </td>
                                            <td>
                                                <input type="hidden" name="siswa<?php echo $item->id_siswa; ?>" value="<?php echo $item->id_siswa; ?>">
                                                <input type="number" class="form-control" name="nilai<?php echo $item->id_siswa; ?>" value="<?php echo $item->nilai; ?>">
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="keterangan<?php echo $item->id_siswa; ?>"><?php echo $item->keterangan; ?></textarea>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="kelas" value="<?php echo $this->uri->segment('3'); ?>">
                <input type="hidden" name="tanggal" value="<?php echo $this->uri->segment('4'); ?>">
                <div class="card-footer">
                    <a href="<?php echo site_url('DaftarNilai/LihatDetailNilaiSikap/'.$this->uri->segment('3')); ?>">
                        <button type="button" class="btn btn-warning">Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>