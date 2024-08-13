<?php 
    include_once "../layout/header.php";
?>
    <div class="container">
        <h1 style="text-align: center;">Laporan </h1>
        <h3 class="print">Daftar Kandidat : </h3>
            <div class="kd" style="">
                <?php
                $datakandidat = $kandidat->getAllData();
                    foreach ($datakandidat as  $value) {
                ?>
                <div class="cd-kd">
                     <div class="">
                        <div class="" style="display: flex;">
                            <img src="../assets/poto_kandidat/<?= $value['foto']?>" alt="" style="width: 200px;object-fit: cover;">
                            <div class="ct-kd" >
                                <p class="bold">Kandidat : <span class="big-text"><?= $value['nama_calon']?></span>
                                <br>Kelas : <span class=""><?= $value['kelas']?></span>
                                <br>konsetrasi Keahlian : <span><?= $value['nama_kk']?></span>
                                </p>
                           
                                <p><span class="bold">visi</span> : <br>
                                    <?= $value['visi']?>
                                </p>
                                <p><span class="bold">misi</span> : <br>
                                <?= $value['misi']?>
                                
                                </p>
                                <p class="">jumlah suara : <span><?= $value['jumlah_suara']?> orang</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        <button onclick="window.print()" class="print">
            <a href="laporan.php">Generate hasil Laporan</a><br>
        </button>

    </div>
    
<?php 
    include_once "../layout/footer.php";
?>