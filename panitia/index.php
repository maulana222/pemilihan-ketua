<?php 
    include_once "../layout/header.php";

?>
        <div class="container">
            <h1 class="center">Hello panitia </h1>

            <form action="" method="post">
                <button class="tbn-float-right" type="submit" name="logout">Keluar</button>
            </form>
            <br>
            <button><a href="pemilih/index.php">kelola data pemilih</a></button><br>
            <button><a href="kandidat/index.php">kelola data kandidat</a></button><br>

           
        </div>

<?php 
    include_once "../layout/footer.php";
?>