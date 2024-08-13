<?php
session_start();
require_once "Database.php";
require_once "Users.php";
require_once "Administrator.php";
require_once "Auth.php";
require_once "Panitia.php";
require_once "Kandidat.php";
require_once "Pemilih.php";

$database = new Database();
$db = $database->openConnection();

$administrator = new Administrator($db);
$panitia = new Panitia($db);
$kandidat = new Kandidat($db);
$user = new Users($db);
$auth = new Auth($db);
$pemilih = new Pemilih($db);



// ini untuk authentikasi
if (isset($_POST['login-form'])) {
    $auth->username = $_POST['username'];
    $auth->password = $_POST['password'];
    $auth->Login();
}

if (isset($_POST['register'])) {
    $auth->username = $_POST['username'];
    $auth->password = $_POST['password'];
    $auth->level = $_POST['level'];
    $confirm_password = $_POST['confirm_password'];

    if ($auth->password !== $confirm_password) {
        $message = "Konfirmasi password tidak sesuai. Silakan coba lagi.";
        return;
    }
    $auth->register();
}
if (isset($_POST['logout'])) {
    $auth->logout();
}


// logic CRUD panitia
if(isset($_GET['delete_id'])) {
    $panitia->id_panitia =  $_GET['delete_id'];
    $panitia->destroy();
}
if(isset($_GET['edit_id'])) {
    $panitia->id_panitia =  $_GET['edit_id'];
    $panitia->findPanitia();
}
if (isset($_POST['simpan-panitia'])) {
    $panitia->nama_panitia = $_POST['nama_panitia'];
    $panitia->username = $_POST['username'];	
    $panitia->password = $_POST['password'];
    $panitia->level = $_POST['level'];
    $panitia->create();
}
if (isset($_POST['edit-panitia'])) {
    $panitia->id_user = $_POST['id_user'];
    $panitia->id_panitia = $_POST['panitia_id'];
    $panitia->nama_panitia = $_POST['nama_panitia'];
    $panitia->username = $_POST['username'];	
    $panitia->password = $_POST['password'];
    $panitia->level = $_POST['level'];
    $panitia->update();
}
// logic CRUD kandidat
if (isset($_POST['simpan-kandidat'])) {
    $kandidat->nis = $_POST['nis'];
    $kandidat->nama_calon = $_POST['nama_calon'];
    $kandidat->kelas = $_POST['kelas'];
    $kandidat->foto = $_FILES['foto'];
    $kandidat->visi = $_POST['visi'];
    $kandidat->misi = $_POST['misi'];
    $kandidat->nama_kk = $_POST['nama_kk'];
    $pemilih->username = $_POST['username']; 
    $pemilih->password = $_POST['password'];
    $pemilih->level = 'kandidat';
    $kandidat->createKandidat();
}
if (isset($_POST['daftar-kandidat'])) {
    $kandidat->nis = $_POST['nis'];
    $kandidat->nama_calon = $_POST['nama_calon'];
    $kandidat->kelas = $_POST['kelas'];
    $kandidat->foto = $_FILES['foto'];
    $kandidat->visi = $_POST['visi'];
    $kandidat->misi = $_POST['misi'];
    $kandidat->nama_kk = $_POST['nama_kk'];
    $pemilih->level = 'kandidat';
    $kandidat->daftar_kandidat();
}
if(isset($_GET['id_kandidat'])) {
    $kandidat->id_kandidat =  $_GET['id_kandidat'];
    $kandidat->findKandidat();
}
if(isset($_GET['id_kandidat-d'])) {
    $kandidat->id_kandidat =  $_GET['id_kandidat-d'];
    $kandidat->id_kk =  $_GET['id_kk'];
    $kandidat->destroyKandidat();
}
if (isset($_POST['edit-kandidat'])) {
    $kandidat->nis = $_POST['nis'];
    $kandidat->nama_calon = $_POST['nama_calon'];
    $kandidat->kelas = $_POST['kelas'];
    $kandidat->foto = $_FILES['foto'];
    $kandidat->visi = $_POST['visi'];
    $kandidat->misi = $_POST['misi'];
    $kandidat->nama_kk = $_POST['nama_kk'];
    $kandidat->username = $_POST['username']; 
    $kandidat->password = $_POST['password'];
    $kandidat->level = 'kandidat';
    $kandidat->updateKandidat();
}
// Logic CRUD pemilih
if (isset($_POST['simpan-pemilih'])) {
    $pemilih->nis = $_POST['nis'];
    $pemilih->nama_siswa = $_POST['nama_siswa'];
    $pemilih->kelas = $_POST['kelas'];
    $pemilih->keterangan = $_POST['keterangan'];
    $pemilih->username = $_POST['username']; 
    $pemilih->password = $_POST['password'];
    $pemilih->level = 'pemilih';
    $pemilih->createPemilih();
}

if (isset($_GET['id_pemilih'])) {
    $pemilih->id_pemilih = $_GET['id_pemilih'];
    $pemilih->editPemilih();
}

if (isset($_GET['id_pemilih-d'])) {
    $pemilih->id_pemilih = $_GET['id_pemilih-d'];
    $pemilih->destroyPemilih();
}

if (isset($_POST['edit-pemilih'])) {
    $pemilih->nis = $_POST['nis'];
    $pemilih->nama_siswa = $_POST['nama_siswa'];
    $pemilih->kelas = $_POST['kelas'];
    $pemilih->keterangan = $_POST['keterangan'];
    $pemilih->username = $_POST['username']; 
    $pemilih->password = $_POST['password'];
    $pemilih->level = 'pemilih';
    $pemilih->updatePemilih();
}

if (isset($_POST['pilih_kandidat'])) {
    $id_kandidat = $_POST['id_kandidat'];
    if (isset($_SESSION['kandidat-selected'])) {
        echo "<script>alert('kandidat sudah di pilih')</script>";
    }else {
        $pemilih->pilihKandidat($id_kandidat);
    }
}
?>