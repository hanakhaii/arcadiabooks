<?php
include "../db.php";
$db = new database();

// Ambil semua data buku + penulis
$query = "SELECT book.title, book.isbn, book.cover, writer.name AS writer_name 
          FROM book
          LEFT JOIN writer ON book.writer_id = writer.writer_id ";

$result = mysqli_query($db->conn, $query);
// Query untuk ambil semua email user
$email_result = mysqli_query($db->conn, "SELECT email FROM user WHERE role = 'peminjam'");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Add Loan Data</title>
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
        <a href="/back-end/DashboardAdmin/loan.php" class="navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z" />
            </svg>
            Dashboard
        </a>
    </section>

    <div class="logo">ARCADIA BOOKS</div>
    <h1>Add Loan Data</h1>

    <form action="proses_add_loan.php" method="post" enctype="multipart/form-data">
        <label for="cover">Cover Buku :</label>
        <img id="book_cover" src="" alt="Preview Cover" class="cover-preview">

        <label for="book">Nama Buku :</label>
        <select id="list_book" name="title" required>
            <option value="">-- Pilih Buku --</option>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <option
                    value="<?= htmlspecialchars($row['title']); ?>"
                    data-writer="<?= htmlspecialchars($row['writer_name']); ?>"
                    data-isbn="<?= htmlspecialchars($row['isbn']); ?>"
                    data-cover="<?= htmlspecialchars($row['cover']); ?>">
                    <?= htmlspecialchars($row['title']); ?>
                </option>
            <?php endwhile; ?>
        </select>




        <label for="email">Email :</label>
        <select id="email" name="email" required>
            <option value="">-- Pilih Email --</option>
            <?php while ($email_row = mysqli_fetch_assoc($email_result)) : ?>
                <option value="<?= htmlspecialchars($email_row['email']) ?>">
                    <?= htmlspecialchars($email_row['email']) ?>
                </option>
            <?php endwhile; ?>
        </select>


        <label for="author">Author :</label>
        <input type="text" class="form-control" id="writer" name="writer" readonly>

        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control" id="isbn" name="isbn" readonly>

        <label for="loan_date">Tanggal Peminjaman :</label>
        <input type="date" id="loan_date" name="loan_date" required>

        <label for="estimated_return_date">Perkiraan Tanggal Pengembalian :</label>
        <input type="date" id="estimated_return_date" name="estimated_return_date" readonly>
        <!-- 
            <label for="return_date">Tanggal Pengembalian:</label> -->
        <input type="hidden" id="return_date" name="return_date">

        <label for="status">Status Peminjaman :</label>
        <select id="status" name="status" required>
            <option value="dipinjam">dipinjam</option>
            <option value="dikembalikan">dikembalikan</option>
            <option value="terlambat">terlambat</option>
        </select>

        <button type="submit" class="btn-submit">Add Loan Data</button>
    </form>
    <script>
        document.getElementById("list_book").addEventListener("change", function() {
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