<?php
session_start();
if(!isset($_SESSION['userid'])){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Komentar</title>
	<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            margin: 20px 0;
            padding: 0;
            text-align: center;
        }

        ul li {
            display: inline;
            margin-right: 10px;
        }

        ul li a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        ul li a:hover {
            color: #0056b3;
        }

        form {
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="submit"] {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
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
    </style>

</head>
<body>
	<h1>Halaman Komentar</h1>
<p>selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
<ul>
        <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="album.php"><i class="fas fa-images"></i>Album</a></li>
        <li><a href="foto.php"><i class="far fa-image"></i>Foto</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
<form action="tambah_komentar.php" method="post">
	<?php
	include "koneksi.php";
	$fotoid=$_GET['fotoid'];
	$sql=mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
	while($data=mysqli_fetch_array($sql)){
	?>
	<input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
	<table>
		<tr>
			<td>Judul foto</td>
			<td> <input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td> <input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
		</tr>
		<tr>
			<td>Foto</td>
			<td> <img src="gambar/<?=$data['lokasifile']?>"width="200px"></td>
		</tr>
		<tr>
			<td>Komentar</td>
			<td> <input type="text" name="isikomentar"></td>
		</tr>
		<tr>
 			<td></td>
			<td> <input type="submit" value="tambah komentar"></td>
		</tr>
	</table>
	<?php
	}
	?>
</form>
<table width="100%" border="1" cellspacing="0">
	<tr>
		<th>ID</th>
		<th>Nama</th>
		<th>Komentar</th>
		<th>Tanggal</th>
	</tr>
		<?php
				include "koneksi.php";
				$userid=$_SESSION['userid'];
				$sql=mysqli_query($conn,"SELECT * FROM komentarfoto,user WHERE komentarfoto.userid=user.userid");
				while($data=mysqli_fetch_array($sql)){
				?>
	<tr>
		<td><?=$data['komentarid']?></td>
		<td><?=$data['namalengkap']?></td>
		<td><?=$data['isikomentar']?></td>
		<td><?=$data['tanggalkomentar']?></td>
	</tr>
	<?php
}
?>
</table>
</body>
</html>