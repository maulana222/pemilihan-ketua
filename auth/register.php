<?php 
    include_once "../layout/header.php";
?>
<div class="container" >
        <div class="card">
            <div class="login-form">
            <form action="" method="post">
                <h2>Register</h2>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <?= isset($message) ? $message : ''?>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <select name="level" id="level">
                    <option value="">daftar sebagai</option>
                    <option value="pemilih">pemilih</option>
                    <option value="kandidat">Kandidat</option>
                </select>
                <div class="form-group">
                    <button type="submit" class="btn" name="register">Register</button>
                </div>
            </form>
            <a href="login.php">Login</a>
            </div>
        </div>
</div>
  
<?php 
    include_once "../layout/footer.php";
?>