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
    <link rel="stylesheet" href="/css/dasboard-admin.css">
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

        h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        input {
            margin-top: 10px;
            margin-bottom: 30px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
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
            margin-bottom: 30px;
            transition: 0.3s ease-in-out;
        }
        
        .btn-submit:hover {
            background-color: #166380;
            transition: 0.3s ease-in-out;
        }
    </style>
</head>

<body>
    <!-- navigation -->
    <section class="back-btn">
        <a href="/back-end/DashboardAdmin/books_data.php" class="navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z" />
            </svg>
            Dashboard
        </a>
    </section>

    <div class="logo">ARCADIA BOOKS</div>
    <h2>Edit Buku</h2>
    <form action="../proses.php?aksi=edit_buku&id=<?= $book['book_id'] ?>" method="POST" enctype="multipart/form-data">
        Judul: <input type="text" name="judul" value="<?= $book['title'] ?>"><br>
        ISBN: <input type="text" name="isbn" value="<?= $book['isbn'] ?>"><br>
        Penerbit: <input type="text" name="publisher" value="<?= $book['publisher'] ?>"><br>
        Tahun: <input type="number" name="tahun" value="<?= $book['publication_Year'] ?>"><br>
        Copy: <input type="number" name="copy" value="<?= $book['copy'] ?>"><br>
        Cover Baru (Opsional): <input type="file" name="cover"><br>
        <input type="submit" value="Update" class="btn-submit">
    </form>
</body>

</html>