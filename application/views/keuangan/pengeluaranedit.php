<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Edit Pengeluaran</h4>
                    </div>
                    <div class="ml-auto d-flex no-block align-items-center">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <form class="mt-12" method="post" action="<?php echo site_url('Keuangan/rubahPengeluaran'); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal" value="<?php echo $data->tanggal; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Nominal</label>
                                    <input type="text" id="nominal" name="nominal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nominal" value="<?php echo $data->nominal; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="exampleInputEmail1">Keterangan</label>
                                    <textarea name="keterangan" class="form-control"><?php echo $data->keterangan; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Struk</label>
                                    <input type="file" name="struk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Struk">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <img src="<?php echo base_url(); ?>assets/struk/<?php echo $data->struk; ?>" width="100%">
                                </div>
                            </div>

                            <input type="hidden" name="id_pengeluaran" value="<?php echo $data->id_pengeluaran; ?>">

                            <a href="<?php echo site_url('Keuangan'); ?>">
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

    var rupiah = document.getElementById('nominal');
    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, '');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa            = split[0].length % 3,
        rupiah          = split[0].substr(0, sisa),
        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>