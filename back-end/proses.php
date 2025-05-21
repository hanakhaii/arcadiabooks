<?php
include 'db.php';
$perpus = new database();

$aksi = $_GET['aksi'];
if(isset($_GET['aksi'])){
    if($aksi == 'register'){
        $perpus->register($_POST['username'], $_POST['email'], $_POST['password']);
        header("location:login.php?pesan=register");
    }if($aksi == 'register_admin'){
        $perpus->register($_POST['username'], $_POST['email'], $_POST['password'], 'admin');
        header("location:login.php?pesan=register");
    }
} 

?>