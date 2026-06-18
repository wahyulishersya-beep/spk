<?php
include 'db.php';

// Ambil data dari database
$query = mysqli_query($conn, "SELECT * FROM penilaian");
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

// Normalisasi dan bobot
$bobot = array(0.3, 0.25, 0.2, 0.25); // Bobot: k1, luas_tanah, lokasi, urgensi
$matriks = array();
$normal = array();

// Buat matriks kriteria
foreach ($data as $item) {
    $matriks[] = array(
        'id_penilaian' => $item['id_penilaian'],
        'nama_pemohon' => $item['nama_pemohon'],
        'k1' => $item['kelengkapan_berkas'],
        'k2' => $item['luas_tanah'],
        'k3' => strtolower($item['lokasi_strategis']) == 'ya' ? 1 : 0,
        'k4' => $item['urgensi_pemohon']
    );
}

// Hitung nilai pembagi
$pembagi = array(0, 0, 0, 0);
foreach ($matriks as $m) {
    $pembagi[0] += pow($m['k1'], 2);
    $pembagi[1] += pow($m['k2'], 2);
    $pembagi[2] += pow($m['k3'], 2);
    $pembagi[3] += pow($m['k4'], 2);
}
for ($i = 0; $i < 4; $i++) {
    $pembagi[$i] = $pembagi[$i] == 0 ? 1 : sqrt($pembagi[$i]);
}

// Normalisasi dan pembobotan
$hasil = array();
foreach ($matriks as $m) {
    $v = array();
    $v[0] = ($m['k1'] / $pembagi[0]) * $bobot[0];
    $v[1] = ($m['k2'] / $pembagi[1]) * $bobot[1];
    $v[2] = ($m['k3'] / $pembagi[2]) * $bobot[2];
    $v[3] = ($m['k4'] / $pembagi[3]) * $bobot[3];

    $hasil[] = array(
        'id' => $m['id_penilaian'],
        'nama' => $m['nama_pemohon'],
        'nilai' => $v
    );
}

// Tentukan solusi ideal
$idealPos = array(0, 0, 0, 0);
$idealNeg = array(0, 0, 0, 0);
for ($i = 0; $i < 4; $i++) {
    $nilai_ke_i = array();
    foreach ($hasil as $h) {
        $nilai_ke_i[] = $h['nilai'][$i];
    }
    $idealPos[$i] = max($nilai_ke_i);
    $idealNeg[$i] = min($nilai_ke_i);
}

// Hitung jarak & preferensi
foreach ($hasil as $key => $h) {
    $dplus = 0;
    $dmin = 0;
    for ($i = 0; $i < 4; $i++) {
        $dplus += pow($h['nilai'][$i] - $idealPos[$i], 2);
        $dmin += pow($h['nilai'][$i] - $idealNeg[$i], 2);
    }
    $dplus = sqrt($dplus);
    $dmin = sqrt($dmin);
    $hasil[$key]['preferensi'] = $dmin / ($dplus + $dmin);
}

// Urutkan berdasarkan preferensi tertinggi
usort($hasil, function($a, $b) {
    if ($a['preferensi'] == $b['preferensi']) return 0;
    return ($a['preferensi'] < $b['preferensi']) ? 1 : -1;
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil SPK</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4 text-indigo-600">Hasil SPK Metode TOPSIS</h1>
        <table class="min-w-full border text-center">
            <thead class="bg-indigo-200">
                <tr>
                    <th class="border px-4 py-2">Peringkat</th>
                    <th class="border px-4 py-2">Nama Pemohon</th>
                    <th class="border px-4 py-2">Nilai Preferensi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($hasil as $row) {
                    echo "<tr>
                            <td class='border px-4 py-2'>{$no}</td>
                            <td class='border px-4 py-2'>{$row['nama']}</td>
                            <td class='border px-4 py-2'>" . round($row['preferensi'], 4) . "</td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>