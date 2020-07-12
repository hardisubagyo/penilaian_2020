<div class="row">
    <div class="col-12">
        <div class="card">
            <form method="post" action="<?php echo site_url('Penilaian/SimpanNilaiSikap'); ?>">
                <div class="card-header">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Input Nilai Kelas <?php echo $this->uri->segment('3'); ?> Sikap & Perilaku</h4>
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
                                        <th width="5%">No</th>
                                        <th width="25%">Nama Siswa</th>
                                        <th width="15%">Nilai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($siswa as $item) { 
                                    ?>  
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $item->nama; ?></td>
                                            <td>
                                                <input type="hidden" name="siswa<?php echo $item->id_siswa; ?>" value="<?php echo $item->id_siswa; ?>">
                                                <input type="number" class="form-control" name="nilai<?php echo $item->id_siswa; ?>">
                                            </td>
                                            <td><textarea class="form-control" name="keterangan<?php echo $item->id_siswa; ?>"></textarea></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
                <div class="card-footer">
                    <a href="<?php echo site_url('Penilaian/InputNilai/'.$kelas); ?>">
                        <button type="button" class="btn btn-warning">Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>