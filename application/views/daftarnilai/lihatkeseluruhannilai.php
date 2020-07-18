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
                        <table id="zero_config" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Siswa</th>
                                    <?php 
                                        foreach($matpel as $items) { 
                                            $getTgl = $this->db->query("
                                                SELECT 
                                                    tanggal 
                                                FROM tr_nilai 
                                                JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
                                                WHERE id_mata_pelajaran = '$items->id_mata_pelajaran' 
                                                AND tm_siswa.kelas = '$kelas'
                                                GROUP BY tanggal"
                                            )->result();

                                            if(count($getTgl) != 0){
                                                echo "<th colspan='".count($getTgl)."'>".$items->nama."</th>";
                                            }
                                        }

                                        $getTglSikap = $this->db->query("
                                            SELECT 
                                                tanggal 
                                            FROM tr_nilai_sikap 
                                            JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai_sikap.id_siswa
                                            WHERE tm_siswa.kelas = '$kelas'
                                            GROUP BY tanggal"
                                        )->result();

                                        if(count($getTglSikap) != 0){
                                            echo "<th colspan='".count($getTglSikap)."'>Sikap & Perilaku</th>";
                                        }
                                    ?>
                                    <th rowspan="2">Total</th>
                                    <th rowspan="2">Rata-rata</th>
                                </tr>
                                <tr>
                                    <?php 
                                        foreach($matpel as $items) { 
                                            $getTgl = $this->db->query("
                                                SELECT 
                                                    tanggal 
                                                FROM tr_nilai 
                                                JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai.id_siswa
                                                WHERE id_mata_pelajaran = '$items->id_mata_pelajaran' 
                                                AND tm_siswa.kelas = '$kelas'
                                                GROUP BY tanggal
                                            ")->result();
                                            foreach($getTgl as $rows){
                                                echo "<td>".$rows->tanggal."</td>";
                                            }
                                        } 

                                        $getTglSikap = $this->db->query("
                                            SELECT 
                                                tanggal 
                                            FROM tr_nilai_sikap 
                                            JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai_sikap.id_siswa
                                            WHERE tm_siswa.kelas = '$kelas'
                                            GROUP BY tanggal"
                                        )->result();
                                        if(count($getTglSikap) != 0){
                                            foreach ($getTglSikap as $value) {
                                                echo "<td>".$value->tanggal."</td>";
                                            }    
                                        }
                                    ?>
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
                                                $getTgl = $this->db->query("SELECT tanggal FROM tr_nilai WHERE id_mata_pelajaran = '$items->id_mata_pelajaran' GROUP BY tanggal")->result();
                                                foreach($getTgl as $rows){
                                                    $getNilaiSiswa = $this->db->query("SELECT nilai FROM tr_nilai WHERE id_mata_pelajaran = '$items->id_mata_pelajaran' AND tanggal = '$rows->tanggal' AND id_siswa = '$item->id_siswa'")->row();
                                                    if(!empty($getNilaiSiswa->nilai)){
                                                        echo "<td>".$getNilaiSiswa->nilai."</td>";
                                                    }else{}
                                                }
                                
                                            } 
                                
                                            $getNilaiSikap = $this->db->query("
                                                SELECT 
                                                    nilai 
                                                FROM tr_nilai_sikap 
                                                JOIN tm_siswa ON tm_siswa.id_siswa = tr_nilai_sikap.id_siswa
                                                WHERE tm_siswa.kelas = '$kelas' AND tr_nilai_sikap.id_siswa = '$item->id_siswa'"
                                            )->result();
                                            if(count($getNilaiSikap) != 0){
                                                foreach ($getNilaiSikap as $value) {
                                                    echo "<td>".$value->nilai."</td>";
                                                }
                                            }
                                        ?>
                                        
                                        <td>
                                            <?php
                                                $total = $this->db->query("
                                                        SELECT 
                                                            SUM(total) as total 
                                                        FROM ( 
                                                            SELECT 
                                                                SUM(tr_nilai.nilai) as total 
                                                            FROM tm_siswa 
                                                            JOIN tr_nilai ON tr_nilai.id_siswa = tm_siswa.id_siswa 
                                                            WHERE tm_siswa.id_siswa = '$item->id_siswa'
                                                            UNION 
                                                            SELECT 
                                                                SUM(tr_nilai_sikap.nilai) as total 
                                                            FROM tm_siswa 
                                                            JOIN tr_nilai_sikap ON tr_nilai_sikap.id_siswa = tm_siswa.id_siswa 
                                                            WHERE tm_siswa.id_siswa = '$item->id_siswa'
                                                        ) temp 
                                                    ")->row();
                                                echo $total->total;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $rata = $this->db->query("
                                                        SELECT 
                                                            AVG(total) as total 
                                                        FROM ( 
                                                            SELECT 
                                                                AVG(tr_nilai.nilai) as total 
                                                            FROM tm_siswa 
                                                            JOIN tr_nilai ON tr_nilai.id_siswa = tm_siswa.id_siswa 
                                                            WHERE tm_siswa.id_siswa = '$item->id_siswa'
                                                            UNION 
                                                            SELECT 
                                                                AVG(tr_nilai_sikap.nilai) as total 
                                                            FROM tm_siswa 
                                                            JOIN tr_nilai_sikap ON tr_nilai_sikap.id_siswa = tm_siswa.id_siswa 
                                                            WHERE tm_siswa.id_siswa = '$item->id_siswa'
                                                        ) temp 
                                                    ")->row();
                                                echo number_format($rata->total,2,',','.');
                                            ?>
                                        </td>
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