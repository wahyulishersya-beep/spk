<?php
// db.php
$host = "localhost";
$user = "root";        
$pass = "";            // tidak pakai password
$db   = "spk_prioritas";   // Nama database

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>