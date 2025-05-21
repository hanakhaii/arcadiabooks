<?php

class database {
    var $host = "localhost";
    var $username = "root";
    var $password = "";  
    var $database = "library";
    
    function __construct() {
        $koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    function register($username, $email, $password) {
        $koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    }
}

$perpus = new database();

?>