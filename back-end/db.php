<?php

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

    function books($keyword = '') {
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


    function category(){
        $data = mysqli_query($this->conn, "SELECT * FROM category");
        while($d = mysqli_fetch_array($data)){
        $hasil[] = $d; 
        }
        return $hasil;
        }

    function history($email) {
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


    function loantime($email) {
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

}



$perpus = new database();
?>