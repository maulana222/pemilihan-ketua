<?php 
    include_once "../layout/header.php";
?>
      <div class="container">
        <div class="card">
            <div class="form-lg">
                <form action="" method="post" class="" enctype="multipart/form-data">
                <h1>form tambah data kandidat</h1>
                    
                <div class="grid ">
                    <div class="">
                        <label for="nis">nis :</label>
                        <input  value="<?= isset($_GET['id_kandidat']) ? $kandidat->nis : ''; ?>" type="text" name="nis" required >
                    </div>
                    <div class="">
                        <label for="nama_calon">nama_calon :</label>
                        <input  value="<?= isset($_GET['id_kandidat']) ? $kandidat->nama_calon : ''; ?>" type="text" name="nama_calon" id="nama_calon" required>
                    </div>
                    <div class="">
                        <label for="kelas">kelas :</label>
                        <input  value="<?= isset($_GET['id_kandidat']) ? $kandidat->kelas : ''; ?>" type="text" name="kelas" id="kelas" required>
                    </div>
                    <div class="">
                        <label for="nama_kk">nama kk :</label>
                        <input  value="<?= isset($_GET['id_kandidat']) ? $kandidat->nama_kk : ''; ?>" type="text" name="nama_kk" id="nama_kk" required>
                    </div>
                    <div class="">
                    <label for="visi">visi :</label>
                    <br>
                    <textarea name="visi" id="visi" cols="30" rows="10" style="width: 100%;">
                    <?= isset($_GET['id_kandidat']) ? $kandidat->visi : ''; ?>
                    </textarea>
                    </div>
                    <div class="">
                    <label for="misi">misi :</label>
                    <br>
                    <textarea name="misi" id="misi" cols="30" rows="10" style="width: 100%;">
                    <?= isset($_GET['id_kandidat']) ? $kandidat->misi : ''; ?>
                    </textarea>
                    </div>
                    <div class="">
                    <label for="foto">foto :</label>
                    <input type="file" name="foto" id="foto">
                    </div>
                </div>
                    <button class="btn" type="submit" name="daftar-kandidat">simpan</button>
                </form>
                <button class="tbn-float-left"><a href="index.php" > < kembali</a></button>
            </div>
        </div>
    </div>

<?php 
    include_once "../layout/footer.php";
?>