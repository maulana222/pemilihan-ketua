



    <?php 
    include_once "../layout/header.php";

?>
        <div class="container">
        <div class="card">
            <div class="form-lg">
                <form action="" method="post" class="" enctype="multipart/form-data">
                <h1>Pelengkapan data</h1>
                <h2>informasi pemilih</h2>
                <div class="grid bold">
                        <div class="">
                            <label for="nis">NIS :</label>
                            <input value="<?= isset($_GET['id_pemilih']) ? $pemilih->nis : ''; ?>" type="number" name="nis" required>
                        </div>
                        <div class="">
                            <label for="nama_siswa">Nama Siswa :</label>
                            <input value="<?= isset($_GET['id_pemilih']) ? $pemilih->nama_siswa : ''; ?>" type="text" name="nama_siswa" id="nama_siswa" required>
                        </div>
                </div>
                <div class="">
                    <label for="kelas">Kelas :</label>
                            <input value="<?= isset($_GET['id_pemilih']) ? $pemilih->kelas : ''; ?>" type="text" name="kelas" id="kelas" required>
                        </div>
                        <div class="">
                            <label for="keterangan">keterangan :</label>
                                <select name="keterangan" id="keterangan" require>
                                    <option value="">pilih keterangan</option>
                                    <option value="siswa aktif" <?= isset($_GET['id_pemilih']) ? ($pemilih->keterangan === "siswa aktif" ? "selected" : "") : ''; ?>>siswa aktif</option>
                                    <option value="alumni" <?= isset($_GET['id_pemilih']) ? ($pemilih->keterangan === "alumni" ? "selected" : "") : ''; ?>>alumni</option>
                            </select>
                        </div>
                    <hr>
                </div>

                    <button class="btn" type="submit" name="simpan-pemilih">simpan</button>
                </form>
             </div>
            </div>
        </div>

<?php 
    include_once "../layout/footer.php";
?>