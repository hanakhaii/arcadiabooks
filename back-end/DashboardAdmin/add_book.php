<?php
include '../db.php';
$perpus = new database();
$writers = $perpus->getWriters();
$categories = $perpus->category();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dasboard-admin.css">
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
        input[type="number"],
        input[type="file"],
        select {
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
        }

        .btn-submit:hover {
            background-color: #166380;
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
    <h1>Add Book</h1>

    <form action="../proses.php?aksi=tambah_buku" method="post" enctype="multipart/form-data">
        <label for="cover">Cover Buku :</label>
        <input type="file" id="cover" name="cover">

        <label for="judul">Judul Buku :</label>
        <input type="text" id="judul" name="judul" placeholder="Contoh: Tan: Sebuah Novel">

        <label for="writer_id">Penulis Buku :</label>
        <select id="writer_id" name="writer_id">
            <option value="">-- Pilih Penulis --</option>
            <?php foreach ($writers as $w) : ?>
                <option value="<?= $w['writer_id'] ?>"><?= $w['name'] ?></option>
            <?php endforeach; ?>
        </select>


        <label for="category_id">Kategori Buku :</label>
        <select id="category_id" name="category_id">
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($categories as $c) : ?>
                <option value="<?= $c['category_id'] ?>"><?= $c['category_name'] ?></option>
            <?php endforeach; ?>
        </select>


        <label for="isbn">ISBN :</label>
        <input type="text" id="isbn" name="isbn">

        <label for="publisher">Publisher :</label>
        <input type="text" id="publisher" name="publisher">

        <label for="tahun">Tahun Rilis Buku :</label>
        <input type="number" id="tahun" name="tahun" placeholder="Contoh: 2025">

        <label for="copy">Jumlah Copy :</label>
        <input type="number" id="copy" name="copy" placeholder="Contoh: 10">

        <button type="submit" class="btn-submit">Add Book</button>
    </form>
</body>

</html>