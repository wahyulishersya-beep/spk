<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login KANTAH PRIORITAS</title>
    <link rel="icon" type="image/png" href="icon\favicon.png">
    <style>
        /* Styling for the body to center content */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('baground/atrbpn.jpg') no-repeat center center fixed; /* Ganti dengan path gambar background Anda */
            background-size: cover; /* Membuat gambar menyesuaikan dengan ukuran layar tanpa merubah rasio */
            background-attachment: fixed; /* Membuat background tetap saat halaman digulir */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Login Page Styling */
        .login-container {
            background: rgba(255, 255, 255, 0.8); /* Background putih transparan */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        #loginPage h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        #loginForm {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        button {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Login Page -->
    <div class="login-container">
        <div id="loginPage">
            <h2>Post Operator Login</h2>
            <form id="loginForm">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>