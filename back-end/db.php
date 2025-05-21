<?php

class database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "library";
    public $conn;
    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    function register($username, $email, $password, $role = 'peminjam')
    {
        $koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        // Amankan input dari SQL injection
        $username = mysqli_real_escape_string($koneksi, $username);
        $email = mysqli_real_escape_string($koneksi, $email);
        $password = mysqli_real_escape_string($koneksi, $password);
        $role = mysqli_real_escape_string($koneksi, $role);


        // Tambahkan role 'peminjam' secara default
        $query = "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
        mysqli_query($koneksi, $query);
    }
}

$perpus = new database();
