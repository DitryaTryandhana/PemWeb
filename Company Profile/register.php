<?php
include "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: ../index.html");
        exit();
    
    } else {
        $error = "Registrasi gagal!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - BELIFT LAB</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Register BELIFT LAB</h2>
        <?php if(isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form method="POST" action="">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="login-btn">Register</button>
            <div class="register-link">
            <p>Already have an account? <a href="../index.html">Login here</a></p>
            </div>
        </form>
    </div>
</body>
</html>
