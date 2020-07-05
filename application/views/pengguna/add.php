<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Tambah Pengguna</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <form class="mt-12" method="post" action="<?php echo site_url('Pengguna/simpan'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Telp</label>
                                <input type="text" name="telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telp">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Repassword">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Repassword</label>
                                <input type="password" name="repassword" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Repassword">
                            </div>
                            <a href="<?php echo site_url('Pengguna'); ?>">
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