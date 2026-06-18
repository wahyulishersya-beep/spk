<?php
include 'db.php'; // Pastikan koneksi database aktif

if (isset($_GET['id'])) {
    $id = $_GET['id']; // ambil dari parameter "id"
    $result = mysqli_query($conn, "SELECT id_pemohon, nama_pemohon, luas_tanah, status_tanah FROM pemohon WHERE id_pemohon = '$id'");
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
}
?>
