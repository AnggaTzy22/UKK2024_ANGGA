<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #017cff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            max-width: 80%;
            text-align: center;
        }

        h1 {
            color: #007bff;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .icon {
            font-size: 64px;
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-gap: 10px;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .validation-msg {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <span class="icon">&#128274;</span>
        <h1>Halaman Registrasi</h1>
        <form action="proses_register.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="namalengkap" placeholder="Nama Lengkap" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="submit" value="Register">
        </form>
        <div id="validationMsg" class="validation-msg"></div>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementsByName('username')[0].value.trim();
            var password = document.getElementsByName('password')[0].value.trim();
            var email = document.getElementsByName('email')[0].value.trim();
            var namalengkap = document.getElementsByName('namalengkap')[0].value.trim();
            var alamat = document.getElementsByName('alamat')[0].value.trim();
            var validationMsg = document.getElementById('validationMsg');

            if (username === '' || password === '' || email === '' || namalengkap === '' || alamat === '') {
                validationMsg.innerText = 'Semua kolom harus diisi!';
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
