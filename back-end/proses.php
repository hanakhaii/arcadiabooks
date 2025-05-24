<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
$perpus = new database();

$aksi = $_GET['aksi'];
if (isset($_GET['aksi'])) {
    if ($aksi == 'register') {
        $perpus->register($_POST['username'], $_POST['email'], $_POST['password']);
        header("location:login.php?pesan=register");
    }
    if ($aksi == 'register_admin') {
        $perpus->register($_POST['username'], $_POST['email'], $_POST['password'], 'admin');
        header("location:login.php?pesan=register");
    }
    if ($aksi == 'tambah_buku') {
        $title = $_POST['judul'];
        $writer_name = $_POST['writer_name'];
        $category_name = $_POST['category_name'];
        $isbn = $_POST['isbn'];
        $publisher = $_POST['publisher'];
        $year = $_POST['tahun'];
        $copy = $_POST['copy'];

        $cover = $_FILES['cover']['name'];
        $tmp = $_FILES['cover']['tmp_name'];
        $path = "uploads/" . $cover;

        // Upload cover buku
        if (move_uploaded_file($tmp, $path)) {
            // Simpan ke database
            $query = "INSERT INTO book (title, writer_name, category_name, isbn, publisher, publication_year, copy, cover)
                    VALUES ('$title', '$writer_name', '$category_name', '$isbn', '$publisher', '$year', '$copy', '$cover')";

            mysqli_query($perpus->conn, $query);
            header("Location: add_book.php?pesan=sukses");
        } else {
            echo "Gagal upload cover buku.";
        }
    }
    if ($aksi == 'edit_buku') {
        $id = $_GET['id'];
        $cover = null;

        if ($_FILES['cover']['name'] != '') {
            $cover = $_FILES['cover']['name'];
            $tmp = $_FILES['cover']['tmp_name'];
            move_uploaded_file($tmp, "uploads/" . $cover);
        }

        $perpus->updateBook($id, $_POST, $cover);
        header("Location: ../back-end/dashboardadmin/books_data.php?pesan=update");
    }

    if (isset($_GET['hapus_buku'])) {
        $book_id = $_GET['delete_book'];
        $hapus = $db->deleteBook($book_id);

        if ($hapus) {
            header("Location: dashboardadmin/books_data.php?pesan=berhasil_hapus");
        } else {
            header("Location: dashboardadmin/books_data.php?pesan=gagal_hapus_dipinjam");
        }
        exit;
    }
}
