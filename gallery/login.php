<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #017cff, #0044cc); /* Ubah warna background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
            max-width: 80%;
            text-align: center;
            overflow: hidden;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            font-size: 36px;
            transition: color 0.3s ease;
            cursor: pointer;
        }

        h1:hover {
            color: #3498db;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 25px;
            border: none;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 25px;
            background-color: #017cff; /* Ubah warna button */
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Warna button saat dihover */
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .icon {
            margin-right: 5px;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
            z-index: -1;
            pointer-events: none;
        }

        .error-message,
        .success-message {
            margin-top: 10px;
            display: none;
            color: red; /* Warna teks notifikasi error */
        }

        .success-message {
            color: green; /* Warna teks notifikasi sukses */
        }

        .message.show {
            display: block;
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-lock icon"></i> Masuk dengan akun anda</h1>
        <form action="proses_login.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Masuk">
            <div class="error-message message" id="error-message"><?php echo $error_message ?? ''; ?></div> <!-- Peringatan jika username/password salah -->
            <div class="success-message message" id="success-message"><?php echo $success_message ?? ''; ?></div> <!-- Pesan sukses (opsional) -->
        </form>
        <p class="footer">Belum mempunyai akun? <a href="register.php">Daftar Sekarang</a></p>
    </div>
    <img class="wave" src="https://cdn.jsdelivr.net/gh/thoughtbot/refills/assets/waves.svg" alt="Wave Illustration">

    <script>
        function validateForm() {
            var username = document.getElementsByName('username')[0].value;
            var password = document.getElementsByName('password')[0].value;

            // Contoh validasi sederhana
            if (username.trim() === '' || password.trim() === '') {
                var errorMessage = document.getElementById('error-message');
                errorMessage.innerText = 'Username dan Password tidak boleh kosong!';
                errorMessage.classList.add('show'); // Tampilkan pesan error dengan menambahkan class 'show'
                setTimeout(function() {
                    errorMessage.classList.remove('show'); // Sembunyikan pesan error setelah beberapa detik
                }, 3000); // 3000 milidetik = 3 detik
                return false;
            }

            // Contoh pesan sukses (opsional)
            var successMessage = document.getElementById('success-message');
            successMessage.innerText = 'Login berhasil!';
            successMessage.classList.add('show'); // Tampilkan pesan sukses dengan menambahkan class 'show'
            setTimeout(function() {
                successMessage.classList.remove('show'); // Sembunyikan pesan sukses setelah beberapa detik
            }, 3000); // 3000 milidetik = 3 detik

            return true;
        }
    </script>
</body>
</html>
