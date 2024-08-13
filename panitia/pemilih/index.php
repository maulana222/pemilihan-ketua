<?php
require_once "../../controlRequest.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Data Pemilih</h1>
        <button class="tbn-float-right"><a href="create.php" style="text-decoration: none;">Tambah Data  +</a></button>
        
        <table border="1">
            <tr>
                <th>NO</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($pemilih->getAllData() as $value) {
                ?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= $value['nis'] ?></td>
                    <td><?= $value['nama_siswa'] ?></td>
                    <td><?= $value['kelas'] ?></td>
                    <td><?= $value['keterangan'] ?></td>
                    <td>
                        <button>
                            <a href="edit.php?id_pemilih=<?= $value['id_pemilih']?>">Edit</a> 
                        </button>

                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
        <button class="tbn-float-left"><a href="../index.php">&lt; Kembali</a></button>
    </div>
</div>

<?php 
    include_once "../../layout/footer.php";
?>