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

            form a {
                padding: 8px;
                background-color: #9EB9C2;
                font-size: 13px;
                border-radius: 3px;
                color: white;
                transition: 0.3s ease-in-out;
            }

            form a:hover {
                color: black;
                background-color:rgb(173, 210, 222);
                transition: 0.3s ease-in-out;
            }

            form button {
                padding: 8px;
                background-color: #9EB9C2;
                transition: 0.3s ease-in-out;
                font-size: 13px;
                border-radius: 3px;
                color: white;
                border: none;
            }

            form button:hover {
                cursor: pointer;
                color: black;
                background-color: #f0f0f0;
                transition: 0.3s ease-in-out;
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
                <h2>WELCOME!</h2>
                <p>let's find some book here</p>
                
                <form action="proses.php?aksi=register" method="post">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 6c1.654 0 3 1.346 3 3s-1.346 3-3 3s-3-1.346-3-3s1.346-3 3-3m0-2C9.236 4 7 6.238 7 9s2.236 5 5 5s5-2.238 5-5s-2.236-5-5-5m0 13c2.021 0 3.301.771 3.783 1.445c-.683.26-1.969.555-3.783.555c-1.984 0-3.206-.305-3.818-.542C8.641 17.743 9.959 17 12 17m0-2c-3.75 0-6 2-6 4c0 1 2.25 2 6 2c3.518 0 6-1 6-2c0-2-2.354-4-6-4"/></svg>
                        <input type="text" id="username" name="username" placeholder="Input your username..." required>
                    </div>
                    <div>   
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 6c1.654 0 3 1.346 3 3s-1.346 3-3 3s-3-1.346-3-3s1.346-3 3-3m0-2C9.236 4 7 6.238 7 9s2.236 5 5 5s5-2.238 5-5s-2.236-5-5-5m0 13c2.021 0 3.301.771 3.783 1.445c-.683.26-1.969.555-3.783.555c-1.984 0-3.206-.305-3.818-.542C8.641 17.743 9.959 17 12 17m0-2c-3.75 0-6 2-6 4c0 1 2.25 2 6 2c3.518 0 6-1 6-2c0-2-2.354-4-6-4"/></svg>
                        <input type="email" id="email" name="email" placeholder="Input your email..." required>
                    </div>
                    <div style="margin-bottom: 30px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 17a2 2 0 0 1-2-2c0-1.11.89-2 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2m6 3V10H6v10zm0-12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10c0-1.11.89-2 2-2h1V6a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2zm-6-5a3 3 0 0 0-3 3v2h6V6a3 3 0 0 0-3-3" />
                        </svg>
                        <input type="password" id="password" name="password" placeholder="Input your password..." required>
                    </div>
                    <button type="submit">Register</button>
                </form>

                <div class="register">
                    <p>have a account? <a href="login.php">login here</a></p>
                </div>
            </div>
        </section>
    </body>
    </html>