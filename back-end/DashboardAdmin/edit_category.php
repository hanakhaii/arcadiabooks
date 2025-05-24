<?php
require_once '../db.php';
$perpus = new database();

$id = $_GET['id'];
$category = $perpus->getCategoryById($id);

if (!$category) {
    header("Location: categories_data.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <title>Edit Category</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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
    <div class="container">
        <div class="logo">ARCADIA BOOKS</div>
        <h1>Edit Category</h1>
        <form action="../proses.php?aksi=edit_kategori" method="post">
            <input type="hidden" name="id" value="<?= $category['category_id'] ?>">

            <label for="nama">Category Name :</label>
            <input type="text" id="nama" name="nama"
                value="<?= htmlspecialchars($category['category_name']) ?>" required>

            <button type="submit" class="btn-submit">Update Category</button>
        </form>
    </div>
</body>

</html>