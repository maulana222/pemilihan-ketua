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
        <div class="form">
            <form action="" method="post" class="">
            <h1>form edit  data panitia</h1>
                <input type="number" name="id_user" hidden value="<?= $panitia->id_user?>">
                <input type="number" name="panitia_id" hidden value="<?= $panitia->id_panitia?>">
                <label for="nama">nama panitia :</label>
                <input type="text" name="nama_panitia" required value="<?= $panitia->nama_panitia?>" >
                <br>
                <label for="username">username :</label>
                <input type="text" name="username" id="username" required value="<?= $panitia->username?>">
                <br>
                <label for="password">password :</label>
                <input type="text" name="password" id="password" required value="<?= $panitia->password?>">
                <br>
                <label for="level">level :</label>
                <select name="level" id="level">
                    <option value="admin"<?= ($panitia->level === 'admin' ? 'selected' : '') ?>>admin</option>
                    <option value="panitia"<?= ($panitia->level === 'panitia' ? 'selected' : '') ?>>panitia</option>
                </select>
                <br>
                <button class="btn" type="submit" name="edit-panitia">simpan</button>
                <button><a href="index.php" class="tbn">kembali</a></button>
            </form>
        </div>
    </div>
    <style>
         .form {
            background-color: white;
            border-radius: 8px;
            padding: 20px 30px  ;
            max-width: 400px;
            margin: auto;
        }
    </style>
</body>
</html>