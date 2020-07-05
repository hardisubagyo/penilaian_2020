<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Tambah Siswa</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <form class="mt-12" method="post" action="<?php echo site_url('Siswa/simpan'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NRP</label>
                                <input type="text" name="nrp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NRP">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Siswa</label>
                                <input type="text" name="nomor" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Siswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Asal Satuan</label>
                                <select name="asal_satuan" class="form-control">
                                    <option value="Kopassus">Kopassus</option>
                                    <option value="Non Kopassus">Non Kopassus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Senjata Laras Panjang</label>
                                <input type="text" name="nsl_panjang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Senjata Laras Panjang">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Senjata Laras Pendek</label>
                                <input type="text" name="nsl_pendek" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Senjata Laras Pendek">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input type="text" name="kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas">
                            </div>
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