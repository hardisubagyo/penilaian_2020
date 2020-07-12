<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Detail Nilai Kelas <?php echo $this->uri->segment('3'); ?> Tanggal <?php echo $matpel->nama; ?></h4>
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
                        <table id="zero_config" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($tanggal as $item) { 
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $item->tanggal; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('DaftarNilai/Lihat/'.$this->uri->segment('3').'/'.$this->uri->segment('4').'/'.$item->tanggal); ?>">
                                                <button type="button" class="btn waves-effect waves-light btn-info">Lihat Nilai</button>
                                            </a>
                                            <a href="<?php echo site_url('DaftarNilai/Edit/'.$this->uri->segment('3').'/'.$this->uri->segment('4').'/'.$item->tanggal); ?>">
                                                <button type="button" class="btn waves-effect waves-light btn-warning">Edit Nilai</button>
                                            </a>
                                            <a href="<?php echo site_url('DaftarNilai/Hapus/'.$this->uri->segment('3').'/'.$this->uri->segment('4').'/'.$item->tanggal); ?>">
                                                <button type="button" class="btn waves-effect waves-light btn-danger">Hapus Nilai</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>