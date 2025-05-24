<?php
session_start();

// Jika sudah dikonfirmasi logout
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Hapus semua sesi
    session_unset();
    session_destroy();

    // Cegah akses kembali ke halaman sebelumnya
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");

    // replace untuk menghapus halaman logout dari history
    echo "<script>
    alert('Anda telah berhasil logout');
    window.location.replace('../front-end/home.html'); 
    </script>";

    exit;
}

// Jika belum dikonfirmasi, tampilkan konfirmasi
echo "<script>
    var keluar = confirm('Yakin ingin logout?');
    if (keluar) {
        window.location.href = 'logout.php?confirm=yes';
    } else {
        window.history.back(); // Kembali ke halaman sebelumnya
    }
</script>";
?>
