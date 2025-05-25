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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
        <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #fff;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .logo {
            color: #A9C4CF;
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 40px;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-weight: 600;
            margin: 20px 0 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-submit {
            background-color: #1F7A9E;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            float: right;
            margin-top: 30px;
        }

        .btn-submit:hover {
            background-color: #166380;
        }
    </style>
</head>

<body>
    <div class="logo">ARCADIA BOOKS</div>
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