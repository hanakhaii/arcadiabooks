<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "library";
    public $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    function register($username, $email, $password, $role = 'peminjam')
    {
        $koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        // Amankan input dari SQL injection
        $username = mysqli_real_escape_string($koneksi, $username);
        $email = mysqli_real_escape_string($koneksi, $email);
        $password = mysqli_real_escape_string($koneksi, $password);
        $role = mysqli_real_escape_string($koneksi, $role);


        // Tambahkan role 'peminjam' secara default
        $query = "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
        mysqli_query($koneksi, $query);
    }

    function books($keyword = '')
    {
        $keyword = mysqli_real_escape_string($this->conn, $keyword);
        if ($keyword == '') {
            $sql = "SELECT book.title, book.cover, writer.name AS writer, category.category_name AS category, book.publication_year AS publication_year
                FROM book
                JOIN writer ON book.writer_id = writer.writer_id
                JOIN category ON book.category_id = category.category_id";
        } else {
            $sql = "SELECT book.title, book.cover, writer.name AS writer, category.category_name AS category, book.publication_year AS publication_year
                FROM book
                JOIN writer ON book.writer_id = writer.writer_id
                JOIN category ON book.category_id = category.category_id
                WHERE book.title LIKE '%$keyword%' OR writer.name LIKE '%$keyword%'";
        }
        $data = mysqli_query($this->conn, $sql);
        $hasil = [];
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }


    function category()
    {
        $data = mysqli_query($this->conn, "SELECT * FROM category");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function booksByCategory($categoryId)
    {
        $categoryId = (int)$categoryId;
        $sql = "SELECT 
                book.title, 
                book.cover, 
                writer.name AS writer, 
                book.publication_year, 
                category.category_name 
            FROM book
            JOIN writer   ON book.writer_id   = writer.writer_id
            JOIN category ON book.category_id = category.category_id
            WHERE book.category_id = $categoryId";

        $res = mysqli_query($this->conn, $sql);
        $out = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $out[] = $row;
        }
        return $out;
    }


    function getWriters()
    {
        $data = mysqli_query($this->conn, "SELECT name FROM writer");
        $hasil = [];
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Ambil semua buku dengan detail lengkap
    function getAllBooks()
    {
        $sql = "SELECT book.*, writer.name AS writer_name, category.category_name 
            FROM book 
            JOIN writer ON book.writer_id = writer.writer_id 
            JOIN category ON book.category_id = category.category_id";
        $data = mysqli_query($this->conn, $sql);
        $hasil = [];
        while ($d = mysqli_fetch_assoc($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Ambil detail buku berdasarkan ID
    function getBookById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM book WHERE book_id = $id";
        $data = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($data);
    }

    // Update buku
    function updateBook($id, $data, $cover = null)
    {
        $id = (int)$id;
        $judul = mysqli_real_escape_string($this->conn, $data['judul']);
        $isbn = mysqli_real_escape_string($this->conn, $data['isbn']);
        $publisher = mysqli_real_escape_string($this->conn, $data['publisher']);
        $tahun = (int)$data['tahun'];
        $copy = (int)$data['copy'];

        $coverQuery = $cover ? ", cover = '$cover'" : "";

        $sql = "UPDATE book SET 
                title = '$judul', 
                isbn = '$isbn', 
                publisher = '$publisher', 
                publication_year = $tahun, 
                copy = $copy
                $coverQuery
            WHERE book_id = $id";

        return mysqli_query($this->conn, $sql);
    }

    public function deleteCategory($id)
    {
        $id = (int)$id;
        // Cek apakah kategori digunakan di buku
        $check = mysqli_query($this->conn, "SELECT * FROM book WHERE category_id = $id");
        if (mysqli_num_rows($check) > 0) {
            return false;
        }
        $sql = "DELETE FROM category WHERE category_id = $id";
        return mysqli_query($this->conn, $sql);
    }
    public function deleteBook($id)
    {
        $id = (int)$id;

        // Cek apakah buku sedang dipinjam (memiliki relasi di tabel loan_time)
        $check = mysqli_query($this->conn, "SELECT * FROM loan_time WHERE book_id = $id");
        if (mysqli_num_rows($check) > 0) {
            return false; // Buku tidak bisa dihapus karena masih dipinjam
        }

        // Jika tidak ada relasi, hapus buku
        $sql = "DELETE FROM book WHERE book_id = $id";
        return mysqli_query($this->conn, $sql);
    }


    // Tambahkan method berikut di dalam class database
    public function createCategory($category_name)
    {
        $category_name = mysqli_real_escape_string($this->conn, $category_name);
        $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";
        return mysqli_query($this->conn, $sql);
    }

    public function updateCategory($id, $category_name)
    {
        $id = (int)$id;
        $category_name = mysqli_real_escape_string($this->conn, $category_name);
        $sql = "UPDATE category SET category_name = '$category_name' WHERE category_id = $id";
        return mysqli_query($this->conn, $sql);
    }


    public function getCategoryById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM category WHERE category_id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }



    function history($email)
    {
        $sql = "SELECT 
                book.title, 
                book.cover, 
                writer.name AS writer, 
                category.category_name AS category_name, 
                book.publication_year, 
                loan_time.loan_date, 
                loan_time.return_date, 
                loan_time.estimated_return_date,
                loan_time.status
            FROM loan_time
            JOIN book ON loan_time.book_id = book.book_id
            JOIN writer ON book.writer_id = writer.writer_id
            JOIN category ON book.category_id = category.category_id
            WHERE loan_time.email = '$email'";

        $data = mysqli_query($this->conn, $sql);
        $hasil = [];
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }


    function loantime($email)
    {
        $sql = "SELECT 
                book.title, 
                book.cover, 
                writer.name AS writer, 
                category.category_name AS category_name, 
                book.publication_year, 
                loan_time.loan_date, 
                loan_time.return_date, 
                loan_time.estimated_return_date,
                loan_time.status
            FROM loan_time
            JOIN book ON loan_time.book_id = book.book_id
            JOIN writer ON book.writer_id = writer.writer_id
            JOIN category ON book.category_id = category.category_id
            WHERE loan_time.email = '$email' 
            AND loan_time.status IN ('dipinjam', 'terlambat')";  // hanya tampilkan yang masih dipinjam atau terlambat

        $data = mysqli_query($this->conn, $sql);
        $hasil = [];
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Ambil semua user
    function getUsers()
    {
        $data = mysqli_query($this->conn, "SELECT * FROM user");
        $hasil = [];
        while ($d = mysqli_fetch_assoc($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Hapus user berdasarkan email
    public function deleteUser($email)
    {
        $email = mysqli_real_escape_string($this->conn, $email);

        // Cek apakah user masih memiliki pinjaman aktif
        $checkLoans = mysqli_query(
            $this->conn,
            "SELECT * FROM loan_time WHERE email = '$email' AND status IN ('dipinjam', 'terlambat')"
        );

        if (mysqli_num_rows($checkLoans) > 0) {
            return false; // User masih memiliki pinjaman aktif
        }

        // Hapus riwayat peminjaman terlebih dahulu
        mysqli_query($this->conn, "DELETE FROM loan_time WHERE email = '$email'");

        // Baru hapus user
        $sql = "DELETE FROM user WHERE email = '$email'";
        return mysqli_query($this->conn, $sql);
    }

    function getLoansByEmail($email)
    {
        $email = mysqli_real_escape_string($this->conn, $email);
        $sql = "SELECT loan_time.*, book.title, book.cover 
            FROM loan_time
            JOIN book ON loan_time.book_id = book.book_id
            WHERE loan_time.email = '$email'
            ORDER BY loan_date DESC";

        $data = mysqli_query($this->conn, $sql);
        $hasil = [];
        while ($d = mysqli_fetch_assoc($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    
}

$perpus = new database();
