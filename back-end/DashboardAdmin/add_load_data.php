<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Add Loan Data</title>
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
            max-width: 700px;
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
        input[type="email"],
        select {
            width: 100%;
            padding: 12px 15px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            appearance: none;
        }

        select {
            border: 1px solid #ccc;
        }

        .cover-preview {
            margin-top: 10px;
            max-height: 150px;
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
        <div class="logo">YUMEBOOK</div>
        <h1>Add Loan Data</h1>

        <form action="proses_add_loan.php" method="post" enctype="multipart/form-data">
            <label for="cover">Cover Buku :</label>
            <input type="file" id="cover" name="cover" accept="image/*">
            <img src="" alt="Preview Cover" class="cover-preview">

            <label for="book">Nama Buku :</label>
            <select id="book" name="book" required>
                <option value="VFCFVZDGSERDBF">Tan : Sebuah Novel</option>
                <option value="BFXDHXDFJGKHXTJD">BFXDHXDFJGKHXTJD</option>
            </select>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="a@.com" required>

            <label for="author">Author :</label>
            <select id="author" name="author" required>
                <option value="Hendri Teja">Hendri Teja</option>
                <option value="VFCFVZDGSERDBF">VFCFVZDGSERDBF</option>
                <option value="BFXDHXDFJGKHXTJD">BFXDHXDFJGKHXTJD</option>
            </select>

            <label for="status">Status Peminjaman :</label>
            <select id="status" name="status" required>
                <option value="dipinjam">dipinjam</option>
                <option value="dikembalikan">dikembalikan</option>
                <option value="terlambat">terlambat</option>
            </select>

            <button type="submit" class="btn-submit">Add Loan Data</button>
        </form>
    </div>
</body>
</html>
