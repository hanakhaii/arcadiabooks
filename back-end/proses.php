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
        $writer_id = $_POST['writer_id'];
        $category_id = $_POST['category_id'];
        $isbn = $_POST['isbn'];
        $publisher = $_POST['publisher'];
        $year = $_POST['tahun'];
        $copy = $_POST['copy'];

        $cover = $_FILES['cover']['name'];
        $tmp = $_FILES['cover']['tmp_name'];
        $path = "uploads/" . $cover;

        if (move_uploaded_file($tmp, $path)) {
            $query = "INSERT INTO book (title, writer_id, category_id, isbn, publisher, publication_year, copy, cover)
                VALUES ('$title', '$writer_id', '$category_id', '$isbn', '$publisher', '$year', '$copy', '$cover')";

            mysqli_query($perpus->conn, $query);
            header("Location: ../back-end/DashboardAdmin/books_data.php?pesan=sukses");
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
   if ($aksi == 'hapus_buku') {
    $book_id = $_GET['id'];
    $result = $perpus->deleteBook($book_id);

    if ($result == "success") {
        header("Location: ../back-end/DashboardAdmin/books_data.php?pesan=hapus_sukses");
    } elseif ($result == "book_in_use") {
        header("Location: ../back-end/DashboardAdmin/books_data.php?pesan=hapus_gagal&error=masih_dipinjam");
    } else {
        header("Location: ../back-end/DashboardAdmin/books_data.php?pesan=hapus_gagal&error=sistem");
    }
}
    if ($aksi == 'tambah_kategori') {
        $category_name = $_POST['nama'];
        $result = $perpus->createCategory($category_name);

        if ($result) {
            header("Location: ../back-end/DashboardAdmin/categories_data.php?pesan=sukses");
        } else {
            header("Location: ../back-end/DashboardAdmin/add_category.php?pesan=gagal");
        }
    }

    if ($aksi == 'edit_kategori') {
        $id = $_POST['id'];
        $category_name = $_POST['nama'];

        $result = $perpus->updateCategory($id, $category_name);

        if ($result) {
            header("Location: ../back-end/DashboardAdmin/categories_data.php?pesan=update_sukses");
        } else {
            header("Location: ../back-end/DashboardAdmin/edit_category.php?id=$id&pesan=update_gagal");
        }
    }

    if ($aksi == 'hapus_kategori') {
        $id = $_GET['id'];
        $result = $perpus->deleteCategory($id);

        if ($result) {
            header("Location: ../back-end/DashboardAdmin/categories_data.php?pesan=hapus_sukses");
        } else {
            header("Location: ../back-end/DashboardAdmin/categories_data.php?pesan=hapus_gagal&error=used");
        }
    }
    if ($aksi == 'deleteloan') {
        $id = $_GET['loan_id'];
        $result = $perpus->deleteLoanTime($id);
        if ($result) {
            header("Location: ../back-end/DashboardAdmin/loan.php?pesan=hapus_sukses");
        } else {
            header("Location: ../back-end/DashboardAdmin/loan.php?pesan=hapus_gagal&error=used");
        }
    }

    if ($aksi == 'tambah_writer') {
        $name = $_POST['name'];
        $bio  = $_POST['bio'];
        $result = $perpus->createWriter($name, $bio);

        if ($result) {
            header("Location: ../back-end/DashboardAdmin/authors_data.php?pesan=sukses");
        } else {
            header("Location: ../back-end/DashboardAdmin/add_authors.php?pesan=gagal");
        }
        exit();
    }

    if ($aksi == 'edit_writer') {
        $id   = $_POST['writer_id'];
        $name = $_POST['name'];
        $bio  = $_POST['bio'];

        $result = $perpus->updateWriter($id, $name, $bio);

        if ($result) {
            header("Location: ../back-end/DashboardAdmin/authors_data.php?pesan=update_sukses");
        } else {
            header("Location: ../back-end/DashboardAdmin/edit_authors.php?writer_id=$id&pesan=update_gagal");
        }
        exit();
    }

    if ($aksi == 'hapus_writer') {
        $id     = $_GET['writer_id'];
        $result = $perpus->deleteWriter($id);

        if ($result) {
            header("Location: ../back-end/DashboardAdmin/authors_data.php?pesan=hapus_sukses");
        } else {
            // misal gagal karena masih digunakan di buku
            header("Location: ../back-end/DashboardAdmin/authors_data.php?pesan=hapus_gagal&error=used");
        }
        exit();
    }
}