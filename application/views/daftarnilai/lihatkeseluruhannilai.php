<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Data Nilai Kelas <?php echo $this->uri->segment('3'); ?></h4>
                    </div>
                </div>
                <br>
                
                <div class="row">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Siswa</th>
                                    <?php 
                                        foreach($matpel as $items) { 
                                            echo "<th>".$items->nama."</th>";
                                        }
                                    ?>
                                    <th>Sikap & Perilaku</th>
                                    <th rowspan="2">Total</th>
                                    <th rowspan="2">Rata-rata</th>
                                </tr>
                                <tr>
                                    <td>Matpel 1</td>
                                    <td>Matpel 2</td>
                                    <td>Matpel 3</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($siswa as $item) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $item->nama; ?></td>
                                        <?php 
                                            foreach($matpel as $items) { 
                                                echo "<td>".$items->nama."</td>";
                                            }
                                        ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php    
                                    }
                                ?>

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
</script>