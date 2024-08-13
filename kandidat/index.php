<?php 
    include_once "../layout/header.php";
    $kandidat->getKandidat(); 
?>
        <div class="container">
            <h1 class="center">Hello, <?= $kandidat->nama_calon ?> </h1>
            <div class="card flex gap10">
                <div class="">
                    <img src="../assets/poto_kandidat/<?=  $kandidat->foto_name ?>" width="80px"  alt="">
                </div>
                <div class="bold    ">
                    <p>Kandidat :  <span><?= $kandidat->nama_calon ?> </span></p>
                    <p>Kelas : <span><?= $kandidat->kelas?></span></p>
                    <p>NIS : <span><?= $kandidat->nis?></span></p>
                    </div>
                </div>
                <button class=""><a href="../index.php">pilih Kandidat</a></button>
                <form action="" method="post">
                    <button class="tbn-float-right" type="submit" name="logout">Keluar</button>
                </form>
            <br>
        </div>

<?php 
    include_once "../layout/footer.php";
?>