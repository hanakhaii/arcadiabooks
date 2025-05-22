<?php
session_start();
require_once "db.php";
$db = new Database();
$conn = $db->conn;

// Ambil input dari form
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Hindari SQL Injection
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Ambil data user berdasarkan username
$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Bandingkan password (jika disimpan dengan hash, gunakan password_verify)
    if ($user['password'] === $password) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];

        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            header("Location: ../back-end/Dashboard Peminjam/dashboard-peminjam.php"); // dashboard admin
        } else if ($user['role'] === 'peminjam') {
            header("Location: ../back-end/Dashboard Peminjam/dashboard-peminjam.php"); // dashboard peminjam/siswa
        } else {
            echo "Role tidak dikenal.";
        }
        exit;
    } else {
        echo "Password salah.";
    }
} else {
    echo "email tidak ditemukan.";
}

mysqli_close($conn);
?>
