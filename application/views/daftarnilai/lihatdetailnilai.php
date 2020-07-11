<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Detail Nilai Kelas <?php echo $this->uri->segment('3'); ?> Tanggal <?php echo $this->uri->segment('4'); ?></h4>
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
                                    <th>Nama Siswa</th>
                                    <?php foreach($matpel as $matpels) { ?>
                                        <th><?php echo $matpels->nama; ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($siswa as $item) { 
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <input type="hidden" name="<?php echo "siswa".$item->id_siswa; ?>" value="<?php echo $item->id_siswa; ?>">
                                            <?php echo $item->nama; ?>        
                                        </td>
                                        <?php foreach($matpel as $matpels) { ?>
                                            <td><input type="text" name="<?php echo "input-".$item->id_siswa."-".$matpels->id_mata_pelajaran; ?>" class="form-control"></td>
                                        <?php } ?>
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