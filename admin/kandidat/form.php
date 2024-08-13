
<div class="grid gap20">
    <div class="">
        <h2>informasi kandidat: </h2>
        <div class="grid">
            <div class="top-sm">
                <label for="nis">nis :</label>
                <input  value="<?= isset($_GET['id_kandidat']) ? $kandidat->nis : ''; ?>" type="number" name="nis" required >
            </div>
            <div class="top-sm">
                <label for="nama_calon">nama calon :</label>
                <input  value="<?= isset($_GET['id_kandidat']) ? $kandidat->nama_calon : ''; ?>" type="text" name="nama_calon" id="nama_calon" required>
            </div>
            <div class="top-sm">
                <label for="kelas">kelas :</label>
                <input  value="<?= isset($_GET['id_kandidat']) ? $kandidat->kelas : ''; ?>" type="text" name="kelas" id="kelas" required>
            </div>
            <div class="top-sm">
                <label for="nama_kk">nama kk :</label>
                <input  value="<?= isset($_GET['id_kandidat']) ? $kandidat->nama_kk : ''; ?>" type="text" name="nama_kk" id="nama_kk" required>
            </div>
            <div class="top-sm">
                <label for="foto">foto :</label>
                <?php if(isset($_GET['id_kandidat']))  {
                  ?>
                  <img src='../../assets/poto_kandidat/<?= isset($_GET['id_kandidat']) ? $kandidat->foto : ''; ?>' width='80px'>
                  <?php
                } ?>
         
                <input type="file" name="foto" id="foto" style="width: 100%;">
            </div>
        </div>
    </div>
    <div class="top-sm">
        <div class="top-sm">
            <h2>akun kandidat: </h2>
                <label for="username">Username :</label>
                <input type="text" value="<?= isset($_GET['id_kandidat']) ? $kandidat->username : ''; ?>" name="username" id="username" required>
            </div>
            <div class="top-sm">
                <label for="password">Password :</label>
                <input type="password" value="<?= isset($_GET['id_kandidat']) ? $kandidat->password : ''; ?>" name="password" id="password" required>
            </div>
    </div>
</div>
    <div class="top-sm">
        <label for="visi">visi :</label>
        <br>
        <textarea name="visi" id="visi" cols="30" rows="6" style="width: 100%;">
        <?= isset($_GET['id_kandidat']) ? $kandidat->visi : ''; ?>
    </textarea>
    </div>
        <div class="top-sm">
        <label for="misi">misi :</label>
    <br>
        <textarea name="misi" id="misi" cols="30" rows="6" style="width: 100%;">
        <?= isset($_GET['id_kandidat']) ? $kandidat->misi : ''; ?>
    </textarea>
    </div>
    
