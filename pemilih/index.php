<?php 
    include_once "../layout/header.php";

?>
        <div class="container">
            <h1 class="center">Hello , <?= $user->username ?> </h1>
            <form action="" method="post">
                <button class="tbn-float-right" type="submit" name="logout">Keluar</button>
            </form>

            <button><a href="../index.php">pilih Kandidat</a></button>
        </div>


<?php 
    include_once "../layout/footer.php";
?>
