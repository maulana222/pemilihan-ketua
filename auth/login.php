<?php 
    include_once "../layout/header.php";
?>
   <div class="container">
        <div class="card">
            <div class="login-form">
                <h1 class="center">Login</h1>
                <form action="" method="post">
                    <input placeholder="usernama" type="text" name="username" id="username">
                    <input placeholder="password" type="password" name="password" id="password">
                    <button type="submit" class="btn btn-biru" name="login-form">Login</button>
                </form>
            </div>
            <a href="register.php">daftar?</a>
        </div>
   </div>

<?php 
    include_once "../layout/footer.php";
?>