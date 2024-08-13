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
            <h2>akun: </h2>
            <div class="">
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </div>
        
