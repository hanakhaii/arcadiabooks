<?php
include '../db.php';
$perpus = new database();
$book = $perpus->getBookById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Edit Buku</h2>
    <form action="../proses.php?aksi=edit_buku&id=<?= $book['book_id'] ?>" method="POST" enctype="multipart/form-data">
        Judul: <input type="text" name="judul" value="<?= $book['title'] ?>"><br>
        ISBN: <input type="text" name="isbn" value="<?= $book['isbn'] ?>"><br>
        Penerbit: <input type="text" name="publisher" value="<?= $book['publisher'] ?>"><br>
        Tahun: <input type="number" name="tahun" value="<?= $book['publication_Year'] ?>"><br>
        Copy: <input type="number" name="copy" value="<?= $book['copy'] ?>"><br>
        Cover Baru (Opsional): <input type="file" name="cover"><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>