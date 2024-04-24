<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $isikomentar = $_POST['isikomentar'];

    // Cek apakah ada kolom yang kosong
    if (empty($fotoid) || empty($judulfoto) || empty($deskripsifoto) || empty($isikomentar)) {
        echo "<script>alert('Harap lengkapi semua kolom!');</script>";
        echo "<script>window.location.href='index.php';</script>"; // Redirect ke halaman lain jika form tidak lengkap
        exit; // Hentikan eksekusi script
    }

    // Proses penyimpanan komentar ke database
    // ... (lanjutkan dengan kode penyimpanan ke database)
}
?>
