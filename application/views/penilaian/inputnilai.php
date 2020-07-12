<div class="row">
    <div class="col-12">
        <div class="card">
            
                <div class="card-header">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Input Nilai Kelas <?php echo $this->uri->segment('3'); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Sikap & Perilaku</td>
                                        <td>
                                            <a href="<?php echo site_url('Penilaian/InsertSikap/'.$this->uri->segment('3')); ?>">
                                                <button type="button" class="btn waves-effect waves-light btn-info">Input Nilai</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                        $no = 2;
                                        foreach($matpel as $item) { 
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $item->nama; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('Penilaian/InsertNilai/'.$this->uri->segment('3').'/'.$item->id_mata_pelajaran) ; ?>">
                                                    <button type="button" class="btn waves-effect waves-light btn-info">Input Nilai</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo site_url('Penilaian'); ?>">
                        <button type="button" class="btn btn-warning">Kembali</button>
                    </a>
                </div>
        </div>
    </div>
</div>