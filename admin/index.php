<?php 
    include_once "../layout/header.php";
?>
    <div class="container">
        <h1 class="center">hello admin</h1>
        <form action="" method="post">
                <button class="tbn-float-right" type="submit" name="logout">Keluar</button>
            </form>
        <button>
            <a href="panitia/index.php">kelola data panitia</a><br>
        </button>
        <button>
            <a href="pemilih/index.php">kelola data pemilih</a><br>
        </button>
        <button>
            <a href="kandidat/index.php">kelola data kandidat</a><br>
        </button>

        
        <h3>Daftar Kandidat : </h3>
            <div class="grid-candidat">
                <?php
                $datakandidat = $kandidat->getAllData();
                    foreach ($datakandidat as  $value) {
                ?>
                <div class="card-candidat">
                     <div class="">
                        <div class="header-card">
                            <img src="../assets/poto_kandidat/<?= $value['foto']?>" alt="" style="width: 100%;">
                        </div>
                        <div class="content">
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
                            <p class="tbn-float-right">jumlah suara : <span><?= $value['jumlah_suara']?> orang</span></p>

                            <form action="" method="post">
                                <input type="number" name="id_kandidat" hidden value="<?= $value['id_kandidat']?>">
                                <button class="btn" type="submit" <?= (empty($_SESSION['userId'])) ? "disabled" : ""?> value="" name="pilih_kandidat"><?= (empty($_SESSION['userId'])) ? "kamu harus login terlebih dahulu" : "Pilih Kandidat"?></button>
                            </form>
                           
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        <button>
            <a href="laporan.php">Generate hasil Laporan</a><br>
        </button>

    </div>
    
<?php 
    include_once "../layout/footer.php";
?>