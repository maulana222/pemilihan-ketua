<?php

require_once "controlRequest.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan ketua replikas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
        <div class="container " style="margin-bottom: 200px;">
            <?php
                if (empty($_SESSION['userId'])) {  ?>
                    <div class=""   style="margin: 30px;">
                        <button class="" ><a href="auth/login.php">Login</a></button>
                        <button class=""><a href="auth/login.php">daftar</a></button>   
                    </div>
            <?php   
                }else {
                    $user->find();
                    if ($user->level == "admin") {
                    ?>
                    <button><a href="admin/">dashboard <?= $user->level ;?></a></button>
                    <?php
                    }elseif ($user->level == "kandidat") {
                        ?>
                        <button><a href="kandidat/">dashboard <?= $user->level ;?></a></button>
                        <?php

                    }
                }
            ?>
            
            <h1 class="center bold" style="margin: 20px; font-size: 28px;">pemilihan Ketua Replikas</h1>
            <?php
            if (isset($_GET['pilih_kandidat'])) {
                echo $_GET['id_kandidat'];
            }
            ?>
            <h3>Daftar Kandidat : </h3>
            <div class="grid-candidat">
                <?php
                $datakandidat = $kandidat->getAllData();
                    foreach ($datakandidat as  $value) {
                ?>
                <div class="card-candidat">
                     <div class="">
                        <div class="header-card">
                            <img src="assets/poto_kandidat/<?= $value['foto']?>" alt="" style="width: 100%;">
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
        </div>

<!-- <footer>this footer</footer> -->
</body>
</html>