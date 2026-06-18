<?php
include 'db.php'; // koneksi database

// ambil data dari form
$nama_pemohon   = $_POST['nama_pemohon'];
$nik            = $_POST['nik'];
$lokasi_tanah   = $_POST['lokasi_tanah'];
$luas_tanah     = $_POST['luas_tanah'];
$status_tanah   = $_POST['status_tanah'];
$tanggal_pengajuan  = $_POST['tanggal_pengajuan'];

// menyimpan data ke tabel 'pemohon'
$sql = "INSERT INTO pemohon (nama_pemohon, nik, lokasi_tanah, luas_tanah, status_tanah, tanggal_pengajuan)
        VALUES ('$nama_pemohon', '$nik', '$lokasi_tanah', '$luas_tanah', '$status_tanah', '$tanggal_pengajuan')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Data berhasil disimpan!');
        window.location.href = 'input_pemohon.html';
    </script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>