<?php
include '../db.php';
session_start();
// cek login jika perlu…

if (!isset($_GET['category_id'])) {
    header('Location: dashboard-peminjam.php');
    exit;
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");


$catId = (int)$_GET['category_id'];
// 1) Ambil nama kategorinya biar bisa ditampilkan di judul
$catRes = mysqli_query($perpus->conn, 
    "SELECT category_name FROM category WHERE category_id = $catId");
$catRow = mysqli_fetch_assoc($catRes);
$catName = $catRow['category_name'] ?? 'Unknown';

$books = $perpus->booksByCategory($catId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/css/coreui.min.css" rel="stylesheet">
    <title>Arcadia Books</title>
    <link rel="stylesheet" href="../../css/dashboard-peminjam.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/js/coreui.bundle.min.js"></script>
</head>

  <body>
      <!-- sidebar -->
      <sidebar class="sidebar sidebar-narrow border-end" style="height: 100vh; position: fixed; background-color: #9BC8D7; top: 0;">
        <div class="sidebar-header border-bottom">
          <div class="sidebar-brand">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
              </svg>
          </div>
        </div>
        <ul class="sidebar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard-peminjam.php">
              <i class="nav-icon cil-speedometer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="#fff" d="M6 19h3v-6h6v6h3v-9l-6-4.5L6 10zm-2 2V9l8-6l8 6v12h-7v-6h-2v6zm8-8.75" />
                  </svg>
              </i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="loan-time.php">
              <i class="nav-icon cil-speedometer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="#fff" d="M6 2h12v6l-4 4l4 4v6H6v-6l4-4l-4-4zm10 14.5l-4-4l-4 4V20h8zm-4-5l4-4V4H8v3.5zM10 6h4v.75l-2 2l-2-2z" />
                  </svg>
              </i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">
              <i class="nav-icon cil-speedometer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="#fff" d="M12 21q-3.45 0-6.012-2.287T3.05 13H5.1q.35 2.6 2.313 4.3T12 19q2.925 0 4.963-2.037T19 12t-2.037-4.962T12 5q-1.725 0-3.225.8T6.25 8H9v2H3V4h2v2.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924t1.925 2.85T21 12t-.712 3.513t-1.925 2.85t-2.85 1.925T12 21m2.8-4.8L11 12.4V7h2v4.6l3.2 3.2z" />
                  </svg>
              </i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">
              <i class="nav-icon cil-speedometer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.023 5.5a9 9 0 1 0 9.953 0M12 2v8" color="currentColor" />
                  </svg>
              </i>
            </a>
          </li>
        </ul>
      </sidebar>

      <!-- main content -->
      <main>      
        <!-- header -->
        <header>
          <!-- watermark -->
          <h5>Arcadia Books</h5>
          <!-- account icon -->
          <div class="account-icn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="translate: -50% -50%">
              <circle cx="12" cy="6" r="4" fill="currentColor" />
              <path fill="currentColor" d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" opacity="0.5" />
            </svg>
          </div>
        </header>

        <section class="back-btn">
            <a href="/back-end/DashboardPeminjam/dashboard-peminjam.php" class="navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z" />
                </svg>
                Dashboard
            </a>
        </section>

        <!-- welcome to user -->
        <section class="hero">
          <h1><?= htmlspecialchars($catName) ?></h1>
          <p>Every page is like stepping into a new world!</p>
        </section>

        <!-- all books preview -->
        <section class="all-books">
          <!-- books grid -->
          <div class="books">
            <?php foreach($books as $b): ?> 
            <!-- for -book div -->
            <div class="book">
              <img src="../../back-end/uploads/<?= htmlspecialchars($b['cover'] ?? 'default.jpg') ?>"
               alt="cover">
              <h5><?= $b['title']?></h5>
              <div class="container">
                <p style="font-weight: bold;"><?= $b['category_name']?></p>
                <p>oleh</p>
                <p style="font-weight: bold;"><?= $b['writer']?></p>
                <p> • </p>
                <p>2016</p>
              </div>
            </div>
             <?php endforeach; ?>
          </div>
        </section>
      </main>

      <!-- copyright -->
      <footer>
        <p>© 2025, Arcadia Book. All right reserved</p>
      </footer>
  </body>
</html>