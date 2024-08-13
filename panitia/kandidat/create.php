<?php
require_once "../../controlRequest.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data panitia</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="form-lg">
                <form action="" method="post" class="" enctype="multipart/form-data">
                <h1>form tambah data panitia</h1>
                    <?php include_once "form.php"?>
                    <button class="btn" type="submit" name="simpan-kandidat">simpan</button>
                </form>
                <button class="tbn-float-left"><a href="index.php" > < kembali</a></button>
            </div>
        </div>
    </div>
</body>
</html>