<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Edit Slide</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <form class="mt-12" method="post" action="<?php echo site_url('Slide/rubah'); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">File</label>
                                <input type="file" name="nama" class="form-control">
                            </div>
                            <input type="hidden" name="id_slide" value="<?php echo $data->id_slide; ?>">

                            <a href="<?php echo site_url('Slide'); ?>">
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