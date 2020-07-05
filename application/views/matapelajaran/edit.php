<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Edit Mata Pelajaran</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <form class="mt-12" method="post" action="<?php echo site_url('MataPelajaran/rubah'); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Mata Pelajaran</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="MataPelajaran" value="<?php echo $data->nama; ?>">
                            </div>
                            <input type="hidden" name="id_mata_pelajaran" value="<?php echo $data->id_mata_pelajaran; ?>">

                            <a href="<?php echo site_url('MataPelajaran'); ?>">
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