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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Pemasukan</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                        <a href="<?php echo site_url('Keuangan/Pemasukan'); ?>">
                            <button type="button" class="btn waves-effect waves-light btn-secondary">Tambah Pemasukan</button>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($pemasukan as $item) { 
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $item->tanggal; ?></td>
                                        <td><?php echo number_format($item->nominal,0,'.','.'); ?></td>
                                        <td><?php echo $item->keterangan; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('Keuangan/EditPemasukan/'.$item->id_pemasukan); ?>">
                                                <button type="button" class="btn waves-effect waves-light btn-warning">Edit</button>
                                            </a>
                                            <button type="button" class="btn waves-effect waves-light btn-danger" onclick="ConfirmDeletePemasukan(<?php echo $item->id_pemasukan; ?>)">Hapus</button>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Pengeluaran</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                        <a href="<?php echo site_url('Keuangan/Pengeluaran'); ?>">
                            <button type="button" class="btn waves-effect waves-light btn-secondary">Tambah Pengeluaran</button>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="table-responsive">
                        <table id="zero_config_pengeluaran" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($pengeluaran as $item) { 
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $item->tanggal; ?></td>
                                        <td><?php echo number_format($item->nominal,0,'.','.'); ?></td>
                                        <td><?php echo $item->keterangan; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('Keuangan/EditPengeluaran/'.$item->id_pengeluaran); ?>">
                                                <button type="button" class="btn waves-effect waves-light btn-warning">Edit</button>
                                            </a>
                                            <button type="button" class="btn waves-effect waves-light btn-danger" onclick="ConfirmDeletePengeluaran(<?php echo $item->id_pengeluaran; ?>)">Hapus</button>
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
       $('#zero_config_pengeluaran').DataTable(); 
    });

    function ConfirmDeletePemasukan(val)
    {
        if (confirm("Hapus Data ?"))
            location.href='Keuangan/DeletePemasukan/'+val;
    }

    function ConfirmDeletePengeluaran(val)
    {
        if (confirm("Hapus Data ?"))
            location.href='Keuangan/DeletePengeluaran/'+val;
    }
</script>