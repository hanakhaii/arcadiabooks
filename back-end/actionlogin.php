<?php
session_start();
require_once "db.php";
$db = new Database();
$conn = $db->conn;

// Ambil input dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Hindari SQL Injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Ambil data user berdasarkan username
$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Bandingkan password (jika disimpan dengan hash, gunakan password_verify)
    if ($user['password'] === $password) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            header("Location: ../front-end/dashboard_user.html"); // dashboard admin
        } else if ($user['role'] === 'peminjam') {
            header("Location: ../front-end/home.html"); // dashboard peminjam/siswa
        } else {
            echo "Role tidak dikenal.";
        }
        exit;
    } else {
        echo "Password salah.";
    }
} else {
    echo "Username tidak ditemukan.";
}

mysqli_close($conn);
?>
