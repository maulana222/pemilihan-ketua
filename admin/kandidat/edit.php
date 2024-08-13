<?php
require_once "../../controlRequest.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data panitia</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
     
        <button><a href="index.php" class="tbn">kembali</a></button>
        <div class="form form-lg">
            <form action="" method="post" enctype="multipart/form-data">
                <h2 class="center">edit data panitia</h2>
                <?php include_once "form.php"?>
                <button class="btn" type="submit" name="edit-kandidat">simpan</button>
            </form>
        </div>
    </div>

</body>
</html>