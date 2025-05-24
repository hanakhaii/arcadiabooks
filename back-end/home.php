<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".css">
</head>

<body>
    <div class="kurung">
        <nav>
            <h1>Arcadia Library</h1>

            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Explore</a></li>
            </ul>

            <a class="login" href="../back-end/login.php">Login</a>
        </nav>

        <section class="sec1">
            <div class="judul">
                <h1>access all <br> books <br> <span>instantly</span>.</h1>
                <p>Take a look at some <br> interesting stories and learn <br> something new</p>
                <a href="">Join Now</a>
            </div>

            <div class="gambar">
                <img src="/img/cwek.png" width="325" alt="" srcset="">
            </div>
        </section>

        <section class="sec2">
            <div class="about">
                <center>
                    <h1>About Arcadia Library</h1>
                    <p> <span>Arcadia Library,</span> sebuah platform yang memudahkan Anda dalam menemukan, menyimpan,
                        dan menjelajahi
                        berbagai
                        koleksi buku serta mengenal lebih dekat para penulisnya. Lewat Yumebook, Anda dapat mencari buku
                        yang tersedia di perpustakaan fisik, menambahkannya ke daftar bacaan, serta mengatur peminjaman
                        dengan sistem yang praktis dan terorganisir.</p>
                </center>
            </div>

            <div class="visi-misi">
                <div class="visi">
                    <h1>Visi</h1>
                    <p>Dengan Arcadia Library, Anda tidak hanya bisa menemukan buku yang Anda butuhkan, tetapi juga
                        mengelola riwayat peminjaman dengan lebih efisien. Kami ingin membangun budaya literasi yang
                        lebih modern, di mana teknologi membantu mendekatkan pembaca dengan buku tanpa menghilangkan
                        pengalaman khas dari perpustakaan fisik.</p>
                </div>
                <div class="misi">
                    <h1>Misi</h1>
                    <p>Arcadia Library ingin menjadi jembatan antara dunia digital dan perpustakaan fisik, menciptakan
                        ekosistem literasi yang lebih cerdas dan terintegrasi. Kami percaya bahwa membaca adalah
                        perjalanan yang tidak hanya memperkaya wawasan tetapi juga membangun koneksi yang lebih dalam
                        dengan ilmu dan cerita.</p>
                </div>
            </div>
        </section>

        <section class="sec3">
            <center>
                <h1>Explore</h1>
            </center>
            <div class="pilihan-buku">
                <div class="buku-item">
                    <img src="/img/tan.png" alt="Tan Malaka">
                    <h1>Tan Malaka</h1>
                </div>
                <div class="buku-item">
                    <img src="/img/konten(2).png" alt="Tanz Sabadah">
                    <h1>Tanz Sabadah Nuvadi</h1>
                </div>
                <div class="buku-item">
                    <img src="/img/konten.png" alt="Mariappa">
                    <h1>Mariappa Piva</h1>
                </div>
            </div>
        </section>

        <footer>
            <div class="foto">
                <img src="/img/cwok.png" width="325" alt="" srcset="">
            </div>

            <div class="bawah">
                <h1>Find <br> Anybook <br> You Want!</h1>
                <p>Just one touch!</p>
                <a href="">Join Now</a> <br>
                <label for="">© 2025, Yumebook. All rights reserved.</label>
            </div>
        </footer>
    </div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

    * {
        margin: 0;
        padding: 10;
        box-sizing: border-box;
        text-decoration: none;
    }

    body {
        margin: 40px 40px 40px;
        font-family: 'Poppins', sans-serif;
    }

    .kurung {
        background-color: #2686a648;
        padding: 50px 20px 20px 50px;
        border-radius: 15px;
    }

    nav {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    ul {
        list-style: none;
        display: flex;

    }

    ul li a {
        padding: 10px 20px;
        color: black;
        /* font-weight: bold; */
    }

    .login {
        background-color: #9BC8D7;
        border-radius: 5px;
        padding: 10px 20px;
        color: white;
    }

    /*bagian section 1*/
    .sec1 {
        display: flex;
        justify-content: space-evenly;
        margin-top: 50px;
        align-items: center;
    }

    .judul h1 {
        font-size: 50px;
        /* margin-left: 200px; */
    }

    .judul p {
        margin-top: 10px;
        font-size: 20px;
        padding-bottom: 25px;
    }

    .judul span {
        color: #2686A6;
    }

    .gambar img {
        /* position: fixed; */
        bottom: 0;
        margin-top: 80px;
    }

    .judul a {
        background-color: #9BC8D7;
        padding: 10px 20px;
        color: white;
        border-radius: 5px;
        /* margin-top: 80px; */
    }

    /* section 2 */
    .sec2 {
        background-color: #2686A6;
        padding: 60px 60px;
        margin-top: -7px;
        width: 90%;
        margin-left: 55px;
        border-radius: 25px;
    }

    .about h1 {
        font-size: 50px;
        padding-bottom: 40px;
    }

    .about span {
        font-weight: bold;
    }

    .about p {
        width: 600px;
        font-size: 18px;
    }

    .visi-misi {
        display: flex;
        justify-content: space-around;
        margin-top: 50px;
        text-align: center;
    }

    .visi-misi p {
        width: 300px;
    }

    .misi {
        background-color: #F0F0F0;
        padding: 30px 30px;
        border-radius: 15px;
    }

    .visi {
        background-color: #F0F0F0;
        padding: 30px 30px;
        border-radius: 15px;
    }

    /* section 3 */
.sec3 {
    padding: 60px 20px;
    margin-top: 50px;
}

.sec3 h1 {
    font-size: 40px;
    margin-bottom: 40px;
}

.pilihan-buku {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
}

.buku-item {
    width: 280px;
    text-align: center;
    background: #ffffff;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.buku-item:hover {
    transform: translateY(-10px);
}

.buku-item img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
}

.buku-item h1 {
    font-size: 1.2rem;
    color: #2686A6;
    margin: 0;
}

    /* footer */
    footer {
        display: flex;
        align-items: center;
    }

    .pilihan-buku {
        display: flex;
        justify-content: space-around;
        margin-top: 50px;
    }

    .bawah {
        background-color: #F0F0F0;
        padding: 40px 40px;
    }
</style>

</html>