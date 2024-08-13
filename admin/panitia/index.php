<?php
require_once "../../controlRequest.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kelola data panitia</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    
<div class="container">
        <div class="card">
            <h1>data panitia</h1>
            <button class="tbn-float-right"><a href="create.php"> tambah data +</a></button>

            <table border="1">
                <tr>
                    <th>id</th>
                    <th>nama</th>
                    <th>level</th>
                    <th>action</th>
                </tr>
                <?php
                $i = 1;
                foreach ($panitia->getAllData() as $value) {
                ?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?=  $value['nama_panitia']?></td>
                    <td><?=  $value['level']?></td>
                    <td>
                        <button>
                            <a href="edit.php?edit_id=<?= $value['id_panitia']?>">edit </a>  
                        </button>|
                        <button>
                            <a href="index.php?delete_id=<?=  $value['id_panitia']?>" onclick="return confirm('apa anda yakin ingin menghapus data ini ?')">hapus</a>
                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
            <button class="tbn-float-left"><a href="../index.php" >kembali</a></button>
        </div>
    </div>
        
<?php 
    include_once "../../layout/footer.php";
?>