<?php
include 'db.php';

$id_pemohon         = $_POST['id_pemohon'];
$nama_pemohon       = $_POST['nama_pemohon'];
$kelengkapan_berkas = $_POST['kelengkapan_berkas'];
$luas_tanah         = $_POST['luas_tanah'];
$status_tanah       = $_POST['status_tanah'];
$lokasi_strategis   = $_POST['lokasi_strategis'];
$urgensi_pemohon    = $_POST['urgensi_pemohon'];

$sql = "INSERT INTO penilaian (id_pemohon, nama_pemohon, kelengkapan_berkas, luas_tanah, status_tanah, lokasi_strategis, urgensi_pemohon)
        VALUES ('$id_pemohon', '$nama_pemohon', '$kelengkapan_berkas', '$luas_tanah', '$status_tanah', '$lokasi_strategis', '$urgensi_pemohon')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data berhasil disimpan!'); window.location.href = 'penilaian.php';</script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
?>