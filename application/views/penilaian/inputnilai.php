<div class="row">
    <div class="col-12">
        <div class="card">
            <form method="post" action="<?php echo site_url('Penilaian/SimpanNilai'); ?>">
                <div class="card-header">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Input Nilai</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Siswa</th>
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
                        <input type="hidden" name="kelas" value="<?php echo $this->uri->segment('3'); ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo site_url('Penilaian'); ?>">
                        <button type="button" class="btn btn-warning">Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>