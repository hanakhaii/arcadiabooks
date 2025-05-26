<?php
include_once '../db.php';
include "../session.php";
$perpus = new database();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="../../css/dasboard-admin.css">
    <title>Dashboard Arcadia Book</title>
</head>

<body>
    <section class="container">
        <!-- sidebar -->
        <aside class="sidebar">
            <!-- logo & overlay sidebar -->
            <div class="logo">
                <!-- logo -->
                <p>Arcadia Book</p>
                <i class="bi bi-layout-sidebar-inset"></i>
            </div>
            <!-- menu sidebar -->
            <ul class="menu">
                <!-- logo and menu -->
                <li id="dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.557 2.75H4.682A1.93 1.93 0 0 0 2.75 4.682v3.875a1.94 1.94 0 0 0 1.932 1.942h3.875a1.94 1.94 0 0 0 1.942-1.942V4.682A1.94 1.94 0 0 0 8.557 2.75m10.761 0h-3.875a1.94 1.94 0 0 0-1.942 1.932v3.875a1.943 1.943 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942V4.682a1.93 1.93 0 0 0-1.932-1.932m0 10.75h-3.875a1.94 1.94 0 0 0-1.942 1.933v3.875a1.94 1.94 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942v-3.875a1.93 1.93 0 0 0-1.932-1.932M8.557 13.5H4.682a1.943 1.943 0 0 0-1.932 1.943v3.875a1.93 1.93 0 0 0 1.932 1.932h3.875a1.94 1.94 0 0 0 1.942-1.932v-3.875a1.94 1.94 0 0 0-1.942-1.942" />
                    </svg>
                    Dashboard
                </li>

                <li id="books">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 6s1.5-2 5-2s5 2 5 2v14s-1.5-1-5-1s-5 1-5 1zm10 0s1.5-2 5-2s5 2 5 2v14s-1.5-1-5-1s-5 1-5 1z" />
                    </svg>
                    Books
                </li>

                <li id="categories">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M6.5 11L12 2l5.5 9zm11 11q-1.875 0-3.187-1.312T13 17.5t1.313-3.187T17.5 13t3.188 1.313T22 17.5t-1.312 3.188T17.5 22M3 21.5v-8h8v8zM17.5 20q1.05 0 1.775-.725T20 17.5t-.725-1.775T17.5 15t-1.775.725T15 17.5t.725 1.775T17.5 20M5 19.5h4v-4H5zM10.05 9h3.9L12 5.85zm7.45 8.5" />
                    </svg>
                    Categories
                </li>

                <li id="authors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                            <path d="M5.076 17C4.089 4.545 12.912 1.012 19.973 2.224c.286 4.128-1.734 5.673-5.58 6.387c.742.776 2.055 1.753 1.913 2.974c-.1.868-.69 1.295-1.87 2.147C11.85 15.6 8.854 16.78 5.076 17" />
                            <path d="M4 22c0-6.5 3.848-9.818 6.5-12" />
                        </g>
                    </svg>
                    Authors
                </li>

                <li id="borrower">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 19v-1.25c0-2.071-1.919-3.75-4.286-3.75h-3.428C7.919 14 6 15.679 6 17.75V19m9-11a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                    </svg>
                    Borrowers
                </li>

                <li id="loan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                        <path fill="currentColor" d="m15 22l-1.41 1.41L16.17 26H4V8H2v18c0 1.103.897 2 2 2h12.17l-2.58 2.59L15 32l5-5z" />
                        <circle cx="11" cy="16" r="1" fill="currentColor" />
                        <path fill="currentColor" d="M24 20H8c-1.103 0-2-.897-2-2v-4c0-1.103.897-2 2-2h16c1.103 0 2 .897 2 2v4c0 1.103-.897 2-2 2M8 14v4h16v-4z" />
                        <path fill="currentColor" d="M28 4H15.83l2.58-2.59L17 0l-5 5l5 5l1.41-1.41L15.83 6H28v18h2V6c0-1.102-.897-2-2-2" />
                    </svg>
                    Loan
                </li>
                <!-- footer -->
                 <div class="footer">
                    <a class="nav-link" href="../logout.php">
                    <li class="logout" style="color: #FF0000;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.023 5.5a9 9 0 1 0 9.953 0M12 2v8" color="currentColor" />
                        </svg>
                        Logout
                    </li>
                    </a>
                </div>
            </ul>
        </aside>

        <!-- main -->
        <main class="main_dashboard">
           

            <h1>Books Data</h1>

            <a href="add_book.php" class="btn-create">Add New Book</a>

            <!-- table for books list data -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>ISBN</th>
                        <th>Publisher</th>
                        <th>Publication Year</th>
                        <th>Copy</th>
                        <th>Cover</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- untuk ngasi peringatakn ketika hapus gagal karena status buku yang di pinjam atau terlambat -->
                     <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'masih_dipinjam') {
                            echo "<script>alert('Buku masih dipinjam atau terlambat, tidak bisa dihapus!');</script>";
                        } elseif ($_GET['error'] == 'sistem') {
                            echo "<script>alert('Terjadi kesalahan sistem saat menghapus buku!');</script>";
                        }
                        echo "<script>window.history.replaceState({}, document.title, window.location.pathname);</script>";
                    }
                    ?>

                            
                    <?php
                    $books = $perpus->getAllBooks();
                    foreach ($books as $index => $book): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $book['title'] ?></td>
                            <td><?= $book['category_name'] ?></td>
                            <td><?= $book['isbn'] ?></td>
                            <td><?= $book['publisher'] ?></td>
                            <td><?= $book['publication_Year'] ?></td>
                            <td><?= $book['copy'] ?></td>
                            <td><img src="../../back-end/uploads/<?= $book['cover'] ?>" alt="cover"></td>
                            <td>
                                <a href="../DashboardAdmin/edit_book.php?id=<?= $book['book_id'] ?>" class="btn-edit">Edit</a> 
                                <a href="../proses.php?aksi=hapus_buku&id=<?= $book['book_id'] ?>"
                                    onclick="return confirm('Hapus buku ini?')"
                                    class="btn-delete">Hapus</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                        
        </main>

    </section>

    <!-- javascript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.querySelector(".sidebar");
            const toggleIcon = document.querySelector(".sidebar .logo i");

            // Fungsi toggle sidebar
            toggleIcon.addEventListener("click", function() {
                sidebar.classList.toggle("closed");

                // Ganti ikon
                if (sidebar.classList.contains("closed")) {
                    toggleIcon.classList.remove("bi-layout-sidebar-inset");
                    toggleIcon.classList.add("bi-layout-sidebar-inset-reverse");
                } else {
                    toggleIcon.classList.remove("bi-layout-sidebar-inset-reverse");
                    toggleIcon.classList.add("bi-layout-sidebar-inset");
                }
            });
        });

        // Toggle Mobile Menu
        function toggleMobileMenu() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('closed');
        }


        // Fungsi untuk menangani klik pada <li>
        function handleLiClick(event) {
            // Dapatkan ID dari elemen yang diklik
            const id = event.currentTarget.id;

            // Tentukan URL berdasarkan ID
            let url;
            switch (id) {
                case 'dashboard':
                    url = 'dashboard_admin.php';
                    break;
                case 'books':
                    url = 'books_data.php';
                    break;
                case 'categories':
                    url = 'categories_data.php';
                    break;
                case 'authors':
                    url = 'authors_data.php';
                    break;
                case 'borrower':
                    url = 'borrowers_data.php';
                    break;
                case 'loan':
                    url = 'loan.php';
                    break;
                default:
                    url = '#';
            }

            // Arahkan ke URL yang sesuai
            window.location.href = url;
        }

        // Dapatkan semua elemen <li> dengan ID
        const liElements = document.querySelectorAll('ul.menu li[id]');

        // Tambahkan event listener untuk setiap elemen <li>
        liElements.forEach(li => {
            li.addEventListener('click', handleLiClick);
        });
    </script>
</body>

</html>