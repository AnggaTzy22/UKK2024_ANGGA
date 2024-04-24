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
<title>Halaman Edit Album</title>
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
    }

    h1 {
        color: #333;
        font-size: 2rem;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    h1 .icon {
        margin-right: 10px;
        font-size: 24px;
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

    form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    input[type="text"], input[type="submit"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: calc(100% - 16px);
        margin-bottom: 10px;
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
</style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-edit icon"></i>Halaman Edit Album</h1>
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <form action="update_album.php" method="POST">
            <?php
            include "koneksi.php";
            $albumid=$_GET['albumid'];
            $sql=mysqli_query($conn,"SELECT * FROM album WHERE albumid='$albumid'");
            while($data=mysqli_fetch_array($sql)){
            ?>
            <input name="albumid" value="<?php echo $data['albumid']; ?>"  hidden />
            <table>
                <tr>
                    <td>Nama Album</td>
                    <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Ubah"></td>
                </tr>
            </table>
            <?php
            }
            ?>
        </form>
    </div>
</body>
</html>
