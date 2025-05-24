<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="/css/dasboard-admin.css">
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
                    <li class="logout" onclick="alert('apakah anda yakin ingin logout?')" style="color: #FF0000;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.023 5.5a9 9 0 1 0 9.953 0M12 2v8" color="currentColor" />
                        </svg>
                        Logout
                    </li>
                </div>
            </ul>
        </aside>

        <!-- content -->
        <main class="main_dashboard">
            <!-- header, sapaan awal untuk Admin -->
            <header>
                <h1>Hello <span style="color: #2686A6;">Admin</span>,</h1>
                <h3>Welcome to Dashboard!</h3>
                <p style="color: #0f5065;">To get started, please select the menu on the left side.</p>
            </header>

            <section class="opening">
                
            </section>

            <!-- section panduan Admin -->
            <section class="as_admin">
                <h2>Top #3 Most Frequently Borrowed Book</h2>
                <div class="container-admin">
                    <div style="margin-top: 10px;">
                        <h2>#2</h2>
                        <img src="/img/30827710.jpg" alt="" srcset="">
                        <h3>Matahari</h3>
                        <div class="text-container">
                            <p>Matahari</p>
                            <p>oleh</p>
                            <p>Tere Liye</p>
                        </div>
                    </div>
                    <div style="margin-top: -30px;">
                        <h2>#1</h2>
                        <img src="/img/30827710.jpg" alt="" srcset="">
                        <h3>Matahari</h3>
                        <div class="text-container">
                            <p>Matahari</p>
                            <p>oleh</p>
                            <p>Tere Liye</p>
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <h2>#3</h2>
                        <img src="/img/30827710.jpg" alt="" srcset="">
                        <h3>Matahari</h3>
                        <div class="text-container">
                            <p>Matahari</p>
                            <p>oleh</p>
                            <p>Tere Liye</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="grid">
                <div class="one-grid">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                        <path fill="none" stroke="#2686A6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 6s1.5-2 5-2s5 2 5 2v14s-1.5-1-5-1s-5 1-5 1zm10 0s1.5-2 5-2s5 2 5 2v14s-1.5-1-5-1s-5 1-5 1z" />
                    </svg>
                    <h5>Total Books</h5>
                    <h1>250</h1>
                </div>
                <div class="one-grid">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                        <path fill="none" stroke="#2686A6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 19v-1.25c0-2.071-1.919-3.75-4.286-3.75h-3.428C7.919 14 6 15.679 6 17.75V19m9-11a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                    </svg>
                    <h5>Active Users</h5>
                    <h1>50</h1>
                </div>
            </section>
        </main>
    </section>

    <div class="footer-main">&copy; 2025, Yumebook. All rights reserved.</div>

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
                case 'category':
                    url = 'categories_data.php';
                    break;
                case 'authors':
                    url = 'authors_data.php';
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