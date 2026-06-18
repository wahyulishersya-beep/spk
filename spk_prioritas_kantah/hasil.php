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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan (TOPSIS)</title>
     <link rel="icon" type="image/png" href="icon\favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #f9fafb;
            --accent: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
        }
        
        .card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="flex h-full">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-r">
                <div class="flex items-center justify-center h-16 px-4 border-b">
                    <img src="icon\favicon.png" alt="Logo Kantah" class="h-8 w-8 mr-2">
                    <div class="text-xl font-bold text-indigo-600">KANTAH PRIORITAS</div>
                </div>
                <div class="flex flex-col flex-grow p-4 overflow-y-auto">
                    <nav class="flex-1 space-y-2">
                        <a href="dashboard.html" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="input_pemohon.html" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Input Pemohon
                        </a>
                        <a href="penilaian.php" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Penilaian
                        </a>
                        <a href="hasil.php" class="flex items-center px-4 py-3 text-sm font-medium text-white rounded-lg bg-indigo-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Hasil SPK
                        </a>
                        <a href="login.php" id="logoutButton" class="flex items-center px-4 py-3 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </a>
                    </nav>
                </div>
                <div class="p-4 border-t">
                    <div class="flex items-center">
                        <img src="icon\profiladm.jpg" alt="Foto profil operator dengan latar belakang biru dan ikon orang" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">Operator</div>
                            <div class="text-sm text-gray-500">Admin</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Content header -->
            <div class="px-6 py-4 bg-white border-b">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">Hasil Perhitungan Penilaian</h1>
                    <div class="text-sm text-gray-600">Berikut hasil perangkingan prioritas pemohon</div>
                </div>
            </div>

            <!-- Main content area -->
            <div class="flex-1 overflow-y-auto p-6">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pemohon</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Preferensi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ranking</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                $no = 1;
                                foreach ($hasil as $row) {
                                    echo "<tr>
                                            <td class='px-6 py-4 whitespace-nowrap'>{$row['nama']}</td>
                                            <td class='px-6 py-4 whitespace-nowrap'>" . round($row['preferensi'], 4) . "</td>
                                            <td class='px-6 py-4 whitespace-nowrap'>{$no}</td>
                                          </tr>";
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        // Fungsi untuk menampilkan konfirmasi sebelum logout
        document.getElementById('logoutButton').addEventListener('click', function(event) {
        event.preventDefault();  // Mencegah navigasi ke halaman login.php
        var isConfirmed = confirm('Anda yakin untuk keluar?');
    
        if (isConfirmed) {
        // Jika pengguna mengonfirmasi, lakukan redirect ke login page
        window.location.href = 'login.php';
    }
});
    </script>
</body>
</html>