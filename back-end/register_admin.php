<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Arcadia Book</title>
</head>

<body>
    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background-color: rgba(192, 231, 237, 1);
        }

        section {
            display: flex;
            justify-content: space-around;
        }

        .photo img {
            position: fixed;
            z-index: 2;
            bottom: 0;
            margin-top: 120px;
            transform: translate(30%);
        }

        .form-sec {
            padding: 20px 100px;
            text-align: center;
            border-radius: 10px;
            background-color: white;
            transform: translate(-10%, 9%);
        }

        .form-sec h2 {
            margin-top: 50px;
            margin-bottom: -8px;
        }

        .form-sec p {
            font-size: 13px;
            margin-bottom: 40px;
        }

        .form-sec svg {
            transform: translate(-5%, 30%);
        }

        .form-sec input {
            margin-bottom: 20px;
            padding: 8px;
            padding-right: 20px;
        }

        .form-sec a {
            text-decoration: none;
        }

        form button {
            padding: 8px;
            background-color: #9EB9C2;
            font-size: 13px;
            border-radius: 3px;
            color: white;
            border: none;
        }

        form button :hover {
            color: black;
            background-color: #f0f0f0;
        }

        .register p {
            margin-top: 50px;
        }

        .register a {
            color: #9EB9C2;
        }
    </style>
    </head>

    <body>
        <?php
        include 'db.php';
        $perpus = new database();
        ?>
        <section>
            <!-- kiri -->
            <div class="photo">
                <img src="../img/cwek.png" alt="" width="360px">
            </div>
            <!-- kanan -->
            <div class="form-sec">
                <h2>WELCOME ADMIN!</h2>
                <p>let's find some book here</p>

                <form action="proses.php?aksi=register_admin" method="post">
                    <div>
                        <input type="text" id="username" name="username" placeholder="Input your username..." required>
                    </div>
                    <div>
                        <input type="email" id="email" name="email" placeholder="Input your email..." required>
                    </div>
                    <div style="margin-bottom: 30px;">
                        <input type="password" id="password" name="password" placeholder="Input your password..." required>
                    </div>
                    <button type="submit">Register as Admin</button>
                </form>


                <div class="register">
                    <p>have a account? <a href="login.html">login here</a></p>
                </div>
            </div>
        </section>
    </body>

</html>