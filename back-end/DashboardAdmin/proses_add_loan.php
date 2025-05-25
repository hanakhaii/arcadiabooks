<?php
include "../db.php";
$db = new database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $email = $_POST['email'];
    $loan_date = $_POST['loan_date'];
    $return_date = $_POST['return_date'];
    $status = $_POST['status'];

    // Tambah 7 hari ke loan_date
    $estimated_return_date = date('Y-m-d', strtotime($loan_date . '+7 days'));
    $return_date_value = ($return_date != '') ? "'$return_date'" : "NULL";

    // Ambil book_id dari judul buku
    $query = "SELECT book_id FROM book WHERE title = '$title'";
    $result = mysqli_query($db->conn, $query);
    $data = mysqli_fetch_assoc($result);
    $book_id = $data['book_id'];

    if ($status == "dipinjam") {
    mysqli_query($db->conn, "UPDATE book SET copy = copy - 1 WHERE title = '$title'");
    }


    // Insert ke tabel loan
    $sql = "INSERT INTO loan_time (book_id, email, loan_date, estimated_return_date, return_date, status)
            VALUES ('$book_id', '$email', '$loan_date', '$estimated_return_date', $return_date_value, '$status')";

    if (mysqli_query($db->conn, $sql)) {
        header("Location:../../back-end/DashboardAdmin/loan.php");
    } else {
        echo "Gagal menambahkan data.";
    }
}
?>
