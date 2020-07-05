<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Pengguna</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                        <a href="<?php echo site_url('Pengguna/Add'); ?>">
                            <button type="button" class="btn waves-effect waves-light btn-secondary">Tambah Pengguna</button>
                        </a>
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
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($data as $item) { 
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $item->nama; ?></td>
                                        <td><?php echo $item->email; ?></td>
                                        <td><?php echo $item->alamat; ?></td>
                                        <td><?php echo $item->telp; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('Pengguna/Edit/'.$item->id_pengguna); ?>">
                                                <button type="button" class="btn waves-effect waves-light btn-warning">Edit</button>
                                            </a>
                                            <button type="button" class="btn waves-effect waves-light btn-danger" onclick="ConfirmDelete(<?php echo $item->id_pengguna; ?>)">Hapus</button>
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

<script>
    $(document).ready(function(){
       $('#zero_config').DataTable(); 
    });

    function ConfirmDelete(val)
    {
        if (confirm("Hapus Data ?"))
            location.href='Pengguna/Delete/'+val;
    }
</script>