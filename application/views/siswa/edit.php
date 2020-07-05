<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Edit Siswa</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <form class="mt-12" method="post" action="<?php echo site_url('Siswa/rubah'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NRP</label>
                                <input type="text" name="nrp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NRP" value="<?php echo $data->nrp; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Siswa</label>
                                <input type="text" name="nomor" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Siswa" value="<?php echo $data->nomor; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="<?php echo $data->nama; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Asal Satuan</label>
                                <select name="asal_satuan" class="form-control">
                                    <option value="Kopassus" <?php if($data->asal_satuan == "Kopassus"){echo "selected";}else{} ?>>Kopassus</option>
                                    <option value="Non Kopassus" <?php if($data->asal_satuan == "Non Kopassus"){echo "selected";}else{} ?>>Non Kopassus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Senjata Laras Panjang</label>
                                <input type="text" name="nsl_panjang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Senjata Laras Panjang" value="<?php echo $data->nsl_panjang; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Senjata Laras Pendek</label>
                                <input type="text" name="nsl_pendek" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Senjata Laras Pendek" value="<?php echo $data->nsl_pendek; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input type="text" name="kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="<?php echo $data->kelas; ?>">
                            </div>
                            <input type="hidden" name="id_siswa" value="<?php echo $data->id_siswa; ?>">

                            <a href="<?php echo site_url('Siswa'); ?>">
                                <button type="button" class="btn btn-warning">Kembali</button>
                            </a>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
       $('#zero_config').DataTable(); 
    });
</script>