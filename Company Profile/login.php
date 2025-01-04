<?php
session_start();
include "../config/koneksi.php";

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['id'];
            echo json_encode(['success' => true]);
            exit();
        }
    }
    
    echo json_encode([
        'success' => false,
        'message' => 'Invalid username or password'
    ]);
    exit();
}

echo json_encode([
    'success' => false,
    'message' => 'Invalid request method'
]);
