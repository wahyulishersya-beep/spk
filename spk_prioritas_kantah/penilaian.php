<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Kriteria</title>
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
                        <a href="penilaian.php" class="flex items-center px-4 py-3 text-sm font-medium text-white rounded-lg bg-indigo-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Penilaian
                        </a>
                        <a href="hasil.php" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Hasil Penilaian
                        </a>
                        <a href="login.php" class="flex items-center px-4 py-3 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50">
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
            <!-- Mobile header -->
            <div class="md:hidden flex items-center justify-between px-4 py-3 bg-white border-b">
                <div class="text-lg font-bold text-indigo-600">Dashboard</div>
                <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile sidebar (hidden by default) -->
            <div id="mobile-menu" class="hidden md:hidden bg-white border-b">
                <nav class="px-2 py-4 space-y-1">
                    <a href="dashboard.html" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="input_pemohon.html" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Input Pemohon
                    </a>
                    <a href="penilaian.php" class="flex items-center px-3 py-2 text-sm font-medium text-white rounded-md bg-indigo-600">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Penilaian
                    </a>
                    <a href="hasil.php" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Hasil SPK
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-red-600 rounded-md hover:bg-red-50">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </a>
                </nav>
            </div>

            <!-- Content header -->
            <div class="px-6 py-4 bg-white border-b">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">Form Penilaian Kriteria</h1>
                    <div class="text-sm text-gray-600">Menilai masing-masing pemohon berdasarkan kriteria SPK</div>
                </div>
            </div>

            <!-- Main content area -->
            <div class="flex-1 overflow-y-auto p-6">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-6">
                        <form class="space-y-6" action="simpan_penilaian.php" method="POST">
                            <div class="grid grid-cols-1 gap-6">
                                 <!-- ID -->
                                 <div>
                                    <label for="id_pemohon" class="block text-sm font-medium text-gray-700">ID</label>
                                     <select id="id_pemohon" name="id_pemohon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border" onchange="fetchData(this.value)">
                                        <option value="">Pilih ID Pemohon</option>
                                        <?php
                                        // Koneksi ke database
                                        include 'db.php'; // Pastikan Anda memiliki file db.php untuk koneksi database
                                        $result = mysqli_query($conn, "SELECT id_pemohon, nama_pemohon FROM pemohon");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$row['id_pemohon']}'>{$row['id_pemohon']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <!-- Nama Pemohon -->
                                <div>
                                    <label for="nama_pemohon" class="block text-sm font-medium text-gray-700">Nama Pemohon</label>
                                    <input type="text" id="nama_pemohon" name="nama_pemohon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border" readonly>
                                </div>

                                <!-- Kelengkapan Berkas -->
                                <div>
                                    <label for="kelengkapan_berkas" class="block text-sm font-medium text-gray-700">Kelengkapan Berkas</label>
                                    <select id="kelengkapan_berkas" name="kelengkapan_berkas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border" required>
                                        <option value="">Pilih nilai (1-5)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <!-- Luas Tanah -->
                                <div>
                                    <label for="luas_tanah" class="block text-sm font-medium text-gray-700">Luas Tanah (m²)</label>
                                    <input type="number" id="luas_tanah" name="luas_tanah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border -indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border" readonly>
                                </div>

                                <!-- Status Tanah -->
                                <div>
                                    <label for="status_tanah" class="block text-sm font-medium text-gray-700">Status Tanah</label>
                                    <input type="text" id="status_tanah" name="status_tanah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border" readonly>
                                </div>
                                
                                <!-- Lokasi Strategis -->
                                <div>
                                    <label for="lokasi_strategis" class="block text-sm font-medium text-gray-700">Lokasi Strategis</label>
                                    <select id="lokasi_strategis" name="lokasi_strategis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border" required>
                                        <option value="">Pilih</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>

                                <!-- Urgensi Pemohon -->
                                <div>
                                    <label for="urgensi_pemohon" class="block text-sm font-medium text-gray-700">Urgensi Pemohon</label>
                                    <select id="urgensi_pemohon" name="urgensi_pemohon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border" required>
                                        <option value="">Pilih nilai (1-5)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-3 pt-6">
                                <button type="reset" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Reset
                                </button>
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Simpan Penilaian
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function fetchData(id_pemohon) {
        if (id_pemohon) {
            fetch(`get_pemohon_data.php?id=${id_pemohon}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nama_pemohon').value = data.nama_pemohon;
                    document.getElementById('luas_tanah').value = data.luas_tanah;
                    document.getElementById('status_tanah').value = data.status_tanah;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        } else {
            document.getElementById('nama_pemohon').value = '';
            document.getElementById('luas_tanah').value = '';
            document.getElementById('status_tanah').value = '';
        }
    }
</script>
</body>
</html>
