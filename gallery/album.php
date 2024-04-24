<?php
session_start();
if(!isset($_SESSION['userid'])){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Album</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Reset CSS */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        max-width: 1200px; /* Atur lebar maksimum container */
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .header-container {
    background-color: #007bff;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    text-align: center;
    color: #fff; /* Tambahkan properti color di sini */
}


    h1 {
        color: #333;
        font-size: 2rem;
        margin-bottom: 20px;
        text-align: center;
    }

    p {
        margin-bottom: 20px;
        text-align: center;
        color: #fff;
    }

    ul {
        list-style-type: none;
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    li {
        margin-right: 20px;
    }

    a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    td {
        background-color: #f8f9fa;
    }

    input[type="text"], input[type="submit"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: calc(100% - 16px);
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 10px;
        display: block;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .icon {
        margin-right: 5px;
    }

    .btn-action {
        padding: 8px 12px;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: inline-block;
        margin-right: 5px;
    }

    .btn-action:hover {
        background-color: #0056b3;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .logo {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo h2 {
        color: #007bff;
        font-size: 2rem;
        margin-bottom: 5px;
    }

    .logo p {
        color: #777;
        font-size: 0.8rem;
    }

    .saran {
        background-color: #f0f0f0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .saran h3 {
        color: #333;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .saran p {
        color: #777;
        font-size: 1rem;
    }

    .tips-trick {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .tips-trick h3 {
        color: #333;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .tips-trick ul {
        margin-bottom: 10px;
    }

    .tips-trick li {
        margin-bottom: 5px;
        color: #777;
        font-size: 1rem;
    }
h1
{color: #FFFFFF;}
</style>
</head>
<body>
    <div class="container">
        <div class="header-container" style="background-color: #007bff;">
            <h1>Halaman Album</h1>
            <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        </div>
        <ul>
            <li><a href="home.php"><i class="fas fa-home icon"></i>Home</a></li>
            <li><a href="album.php"><i class="fas fa-images icon"></i>Album</a></li>
            <li><a href="foto.php"><i class="fas fa-camera icon"></i>Foto</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
        </ul>
        <div class="tips-trick">
            <h3>Tips & Trick:</h3>
            <ul>
                <li>Pastikan nama album dan deskripsi yang Anda tambahkan jelas dan deskriptif.</li>
                <li>Gunakan gambar berkualitas tinggi untuk memperindah album Anda.</li>
                <li>Jangan lupa untuk mengatur privasi album sesuai keinginan Anda.</li>
            </ul>
        </div>
            
        <form action="tambah_album.php" method="post" onsubmit="return validateForm()">
            <table>
                <tr>
                    <td>Nama Album</td>
                    <td><input type="text" name="namaalbum" id="namaalbum"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsi" id="deskripsi"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
            <tr>
                <th>ID</th>
                <th>Nama Album</th>
                <th>Deskripsi</th>
                <th>Tanggal dibuat</th>
                <th>Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $sql = mysqli_query($conn, "SELECT * FROM album where userid='$userid'");
            while ($data = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?= $data['albumid'] ?></td>
                    <td><?= $data['namaalbum'] ?></td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td><?= $data['tanggaldibuat'] ?></td>
                    <td class="btn-container">
                        <a href="hapus_album.php?albumid=<?= $data['albumid'] ?>" class="btn-action"><i class="fas fa-trash-alt icon"></i> Hapus</a>
                        <a href="edit_album.php?albumid=<?= $data['albumid'] ?>" class="btn-action"><i class="fas fa-edit icon"></i> Edit</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <script>
        function validateForm() {
            var namaAlbum = document.getElementById('namaalbum').value;
            var deskripsi = document.getElementById('deskripsi').value;

            if (namaAlbum == '' || deskripsi == '') {
                alert('Nama Album dan Deskripsi tidak boleh kosong!');
                return false;
            }
            return true;
        }
    </script>
    <form action="edit_album.php" method="post" onsubmit="return validateEditForm()">
    <!-- Form untuk edit album -->
</form>

</body>
</html>
