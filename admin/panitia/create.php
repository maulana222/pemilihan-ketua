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
        <div class="form">
            <form action="" method="post" class="">
            <h1>form tambah data panitia</h1>
                <label for="nama">nama panitia :</label>
                <input type="text" name="nama_panitia" require>
                <br>
                <label for="username">username :</label>
                <input type="text" name="username" id="username" require>
                <br>
                <label for="password">password :</label>
                <input type="text" name="password" id="password" require>
                <br>
                <label for="level">level :</label>
                <select name="level" id="level" require>
                    <option value="">pilih level</option>
                    <option value="admin">admin</option>
                    <option value="panitia">panitia</option>
                </select>
                <br>
                <button class="btn" type="submit" name="simpan-panitia">simpan</button>
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