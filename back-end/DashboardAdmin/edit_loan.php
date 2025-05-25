<?php
include "../db.php";
$db = new database();

$loan_id = $_GET['loan_id'];

// Ambil semua data buku + penulis
$query = "SELECT 
            loan_time.*, 
            book.title, 
            book.isbn, 
            book.cover, 
            writer.name AS writer_name 
          FROM loan_time
          JOIN book ON loan_time.book_id = book.book_id
          JOIN writer ON book.writer_id = writer.writer_id
          WHERE loan_time.loan_id = $loan_id";

$data = mysqli_query($db->conn, $query);
$data = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Loan Data</title>
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
        
        <div class="logo">ARCADIA BOOKS</div>
        <h1>Edit Loan Data</h1>

        <form action="proses_edit_loan.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="loan_id" value="<?= $data['loan_id'] ?>">
            <label for="cover">Cover Buku :</label>
            <img src="../uploads/<?= $data['cover'] ?>" class="cover-preview">


           <label for="book">Nama Buku :</label>
            <input type="text" value="<?= $data['title'] ?>" require>




            <label for="email">Email :</label>
            <input type="text" value="<?= $data['email'] ?>" require>


            <label for="author">Author :</label>
            <input type="text" class="form-control" id="writer_name" name="writer_name" value="<?= $data['writer_name'] ?>" require>

             <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $data['isbn'] ?>" require>
            
            <label for="loan_date">Tanggal Peminjaman :</label>
            <input type="date" id="loan_date" name="loan_date" value="<?= $data['loan_date'] ?>"  required>

            <label for="estimated_return_date">Perkiraan Tanggal Pengembalian :</label>
           <input type="date" id="estimated_return_date" name="estimated_return_date" value="<?= $data['estimated_return_date'] ?>" require>

            <label for="return_date">Tanggal Pengembalian:</label>
            <input type="date" id="return_date" name="return_date" value="<?= $data['return_date'] ?>" require >

            <label for="status">Status Peminjaman :</label>
            <select name="status" required>
                <option value="dipinjam" <?= $data['status'] == 'dipinjam' ? 'selected' : '' ?>>dipinjam</option>
                <option value="dikembalikan" <?= $data['status'] == 'dikembalikan' ? 'selected' : '' ?>>dikembalikan</option>
                <option value="terlambat" <?= $data['status'] == 'terlambat' ? 'selected' : '' ?>>terlambat</option>
             </select>

            <button type="submit" class="btn-submit">Update Loan Data</button>

        </form>
    </div>
<script>
document.getElementById("list_book").addEventListener("change", function () {
    const selected = this.options[this.selectedIndex];
    const writer = selected.getAttribute("data-writer");
    const isbn = selected.getAttribute("data-isbn");
    const cover = selected.getAttribute("data-cover");

    document.getElementById("writer").value = writer || "";
    document.getElementById("isbn").value = isbn || "";

    if (cover) {
        document.getElementById("book_cover").src = "../uploads/" + cover;
    } else {
        document.getElementById("book_cover").src = "";
    }
});
// ketika loan di isi akan otomatis estimasinya 7 hari 
document.getElementById('loan_date').addEventListener('change', function() {
    const loanDate = this.value;
    if (loanDate) {
        const date = new Date(loanDate);
        date.setDate(date.getDate() + 7); // tambah 7 hari
        const year = date.getFullYear();
        const month = ('0' + (date.getMonth() + 1)).slice(-2);
        const day = ('0' + date.getDate()).slice(-2);
        const estimatedReturn = `${year}-${month}-${day}`;
        document.getElementById('estimated_return_date').value = estimatedReturn;
    } else {
        document.getElementById('estimated_return_date').value = '';
    }
});

</script>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            

</body>
</html>
