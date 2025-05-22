<?php

class database {
    public $host = "localhost";
    public $username = "root";
    public $password = "";  
    public $database = "library";
    public $conn ; 
    function __construct() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    function register($username, $email, $password) {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    }
}

$perpus = new database();

?>