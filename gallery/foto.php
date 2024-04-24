<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Foto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 100%;
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
            margin-bottom: 30px;
            text-align: center;
        }

        .header-container h1,
        .header-container p {
            color: #fff;
            margin: 0;
        }

        h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            margin-bottom: 20px;
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

        form table {
            margin-bottom: 30px;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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

        input[type="text"],
        input[type="file"],
        input[type="submit"] {
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
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .icon {
            margin-right: 5px;
        }

        .action-column {
            padding: 10px;
        }

        .tips-trick-container {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .tips-trick-container h3 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .tips-trick-container ul {
            margin-bottom: 10px;
        }

        .tips-trick-container li {
            margin-bottom: 5px;
            color: #777;
            font-size: 1rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header-container">
        <h1>Halaman Foto</h1>
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    </div>
    <ul>
        <li><a href="index.php"><i class="fas fa-home icon"></i>Home</a></li>
        <li><a href="album.php"><i class="fas fa-images icon"></i>Album</a></li>
        <li><a href="foto.php"><i class="fas fa-camera icon"></i>Foto</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
    </ul>
    <div class="tips-trick-container">
        <h3>Tips & Trick:</h3>
        <ul>
            <li>Pastikan judul dan deskripsi foto Anda jelas dan informatif.</li>
            <li>Pilih lokasi file yang tepat dan pastikan gambar terlihat baik.</li>
            <li>Gunakan album untuk mengorganisir foto-foto Anda dengan baik.</li>
        </ul>
    </div>
    <form action="tambah_foto.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"SELECT * FROM album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Unggah</th>
                <th>Lokasi File</th>
                <th>Album</th>
                <th>Disukai</th>
                <th>Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"SELECT * FROM foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while ($data=mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?=$data['fotoid']?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                        <br>
                        <a href="gambar/<?=$data['lokasifile']?>" target="_blank">Lihat Gambar</a>
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td class="action-column">
                        <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>"><i class="fas fa-trash-alt icon"></i>Hapus</a>
                        <br>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>"><i class="fas fa-edit icon"></i>Edit</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </form>
</div>
<script>
// Validasi form sebelum pengiriman
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
        const judulInput = form.querySelector('input[name="judulfoto"]');
        const deskripsiInput = form.querySelector('input[name="deskripsifoto"]');
        const lokasiFileInput = form.querySelector('input[name="lokasifile"]');
        const albumIdSelect = form.querySelector('select[name="albumid"]');

        // Validasi judul tidak boleh kosong
        if (judulInput.value.trim() === '') {
            alert("Judul tidak boleh kosong!");
            event.preventDefault();
            return false;
        }

        // Validasi deskripsi tidak boleh kosong
        if (deskripsiInput.value.trim() === '') {
            alert("Deskripsi tidak boleh kosong!");
            event.preventDefault();
            return false;
        }

        // Validasi lokasi file tidak boleh kosong
        if (lokasiFileInput.value.trim() === '') {
            alert("Lokasi File tidak boleh kosong!");
            event.preventDefault();
            return false;
        }

        // Validasi album dipilih
        if (albumIdSelect.value === '') {
            alert("Pilih album terlebih dahulu!");
            event.preventDefault();
            return false;
        }

        // Form valid, lanjutkan pengiriman
        return true;
    });
});
</script>
</body>
</html>
