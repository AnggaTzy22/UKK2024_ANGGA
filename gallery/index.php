<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Landing</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* General Styles */
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    /* Header Styles */
    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 30px;
        font-size: 2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Welcome Section Styles */
    .welcome-section {
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 30px;
    }

    .welcome-section h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .welcome-section p {
        font-size: 1.2rem;
    }

    /* Navigation Styles */
    ul {
        list-style-type: none;
        padding: 0;
        text-align: center;
        margin-bottom: 40px;
    }

    li {
        display: inline-block;
        margin-right: 20px;
    }

    a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: color 0.3s ease;
        padding: 10px 20px;
        border-radius: 5px;
    }

    a:hover {
        color: #0056b3;
    }

    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
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

    img {
        max-width: 150px;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .actions a {
        color: #fff;
        background-color: #007bff;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        text-decoration: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .actions a:hover {
        background-color: #0056b3;
    }

    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        li {
            display: block;
            margin-bottom: 10px;
        }

        .actions {
            flex-direction: column;
        }

        .actions a {
            width: 100%;
        }
    }
</style>
</head>
<body>
    <div class="container">     
        <div class="welcome-section">
            <h2>Selamat datang di Halaman Landing</h2>
            <?php
            session_start();
            if(!isset($_SESSION['userid'])){
            ?>
            <p>Jika anda belum masuk. Silakan Login atau register untuk melanjutkan.</p>
            <?php
            }else{
            ?>
            <p>Selamat datang, <b><?=$_SESSION['namalengkap']?></b>! Anda dapat mengakses fitur-fitur di bawah ini:</p>
            <?php
            }
            ?>
        </div>
        <ul>
            <?php
            if(isset($_SESSION['userid'])){
            ?>
            <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="album.php"><i class="fas fa-images"></i> Album</a></li>
            <li><a href="foto.php"><i class="fas fa-camera"></i> Foto</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li> 
            <?php
            }else{
            ?>
            <li><a href="register.php"><i class="fas fa-user-plus"></i> Register</a></li>
            <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <?php
            }
            ?>
        </ul>
        <div>
            <h2>Tabel Foto Terbaru</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Uploader</th>
                    <th>Jumlah Like</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include "koneksi.php";
                $sql= mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
                while ($data=mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?=$data['fotoid']?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><img src="gambar/<?=$data['lokasifile']?>" alt="Foto <?=$data['judulfoto']?>"></td>
                    <td><?=$data['namalengkap']?></td>
                    <td>
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                    </td>
                    <td class="actions">
                        <a href="like.php?fotoid=<?=$data['fotoid']?>"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="komentar.php?fotoid=<?=$data['fotoid']?>"><i class="far fa-comments"></i> Komentar</a>
                    </td>
                </tr>
                <?php   
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
