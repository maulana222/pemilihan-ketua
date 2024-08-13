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
            <h1>data kandidat</h1>
            <button class="tbn-float-right"><a href="create.php" style="text-decoration: none;">tambah data  +</a></button>
            
            <table border="1">
                <tr>
                    <th>id</th>
                    <th>nis</th>
                    <th>nama_calon</th>
                    <th>kelas</th>
                    <th>foto</th>
                    <th>visi</th>
                    <th>misi</th>
                    <th>nama_kk</th>
                    <th>action</th>
                </tr>
                <?php
                $i = 1;
          
            foreach ($kandidat->getAllData() as $value) {
                ?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= $value['nis'] ?></td>
                    <td><?= $value['nama_calon'] ?></td>
                    <td><?= $value['kelas'] ?></td>
                    <td><img src="../../assets/poto_kandidat/<?= $value['foto'] ?>" width="80px"  alt=""></td>
                    <td><?= $value['visi'] ?></td>
                    <td><?= $value['misi'] ?></td>
                    <td><?= $value['nama_kk'] ?></td>
                    <td>
                        <button>
                            <a href="edit.php?id_kandidat=<?= $value['id_kandidat']?>">edit </a>
                        </button>
                    </td>
                    
                </tr>
                <?php
            }
                ?>
            </table>
            <button class="tbn-float-left"><a href="../index.php" > < kembali</a></button>
        </div>
    </div>
 
<?php 
    include_once "../../layout/footer.php";
?>