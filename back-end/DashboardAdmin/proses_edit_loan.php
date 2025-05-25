<?php
include "../db.php";
$db = new database();

$loan_id = $_POST['loan_id'];
$status = $_POST['status'];
$return_date = $_POST['return_date'];


// Ambil data lama dulu
$loan = mysqli_fetch_assoc(mysqli_query($db->conn, "SELECT book_id, status FROM loan_time WHERE loan_id = $loan_id"));
$book_id = $loan['book_id'];
$old_status = $loan['status'];

// Jika status berubah dari 'dipinjam' ke 'dikembalikan', tambahkan stok
if ($old_status != 'dikembalikan' && $status == 'dikembalikan') {
    mysqli_query($db->conn, "UPDATE book SET copy = copy + 1 WHERE book_id = $book_id");
}

// Tketika status dikembalikan return date harus di isi
if ($status == 'dikembalikan') {
    $return_date = date('Y-m-d');
} else {
    $return_date = $_POST['return_date'];
}

// Jika status berubah dari 'dikembalikan' ke 'dipinjam', kurangi stok
if ($old_status == 'dikembalikan' && $status == 'dipinjam') {
    mysqli_query($db->conn, "UPDATE book SET copy = copy - 1 WHERE book_id = $book_id");
}

// Update status di tabel loan
mysqli_query($db->conn, "UPDATE loan_time SET status = '$status', return_date = '$return_date' WHERE loan_id = $loan_id");
 header("Location:../../back-end/DashboardAdmin/loan.php");
?>
