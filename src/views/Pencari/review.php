<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Apartemen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <!-- Header Filter -->
        <div class="flex justify-center items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Filter</h2>

        </div>


        <form class="space-y-6">
            <!-- Urutkan -->
            <div>
                <label class="block text-gray-600 font-medium mb-2">Urutkan</label>
                <div>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="Urutkan" value="Paling populer" class="text-blue-500">
                        <span>Paling populer</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="Urutkan" value="Hunian Terbaru" class="text-blue-500">
                        <span>Hunian Terbaru</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="Urutkan" value="Harga terendah" class="text-blue-500" checked>
                        <span>Harga terendah</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="Urutkan" value="Harga tertinggi" class="text-blue-500">
                        <span>Harga tertinggi</span>
                    </label>
                </div>
            </div>

            <!-- Harga per Bulan -->
            <div>
                <label class="block text-gray-600 font-medium mb-2">Harga per Bulan</label>
                <div class="flex space-x-4">
                    <!-- Input Min -->
                    <input type="text" placeholder="Min"
                        class="w-1/2 border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300"
                        oninput="formatRupiah(this)" />
                    <div class="flex items-center justify-center px-4">-</div>
                    <!-- Input Max -->
                    <input type="text" placeholder="Max"
                        class="w-1/2 border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300"
                        oninput="formatRupiah(this)" />
                </div>
            </div>

            <!-- Fasilitas bersama -->
            <div>
                <label class="block text-gray-600 font-medium mb-2">Fasilitas bersama</label>
                <div>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Internet/Wi-Fi" class="text-blue-500">
                        <span>Internet/Wi-Fi</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Parkir Motor" class="text-blue-500">
                        <span>Parkir Motor</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Kulkas" class="text-blue-500">
                        <span>Kulkas</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Dapur" class="text-blue-500">
                        <span>Dapur</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="CCTV" class="text-blue-500">
                        <span>CCTV</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Ruang tamu" class="text-blue-500">
                        <span>Ruang tamu</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Mesin" class="text-blue-500">
                        <span>Mesin cuci</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Dispenser" class="text-blue-500">
                        <span>Dispenser</span>
                    </label>
                </div>
            </div>


            <!-- Fasilitas Kamar -->
            <div>
                <label class="block text-gray-600 font-medium mb-2">Fasilitas Kamar</label>
                <div>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Jendela" class="text-blue-500">
                        <span>Jendela</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="AC" class="text-blue-500">
                        <span>AC</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="TV kabel" class="text-blue-500">
                        <span>TV kabel</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Kursi" class="text-blue-500">
                        <span>Kursi</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Kasur" class="text-blue-500">
                        <span>Kasur</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Kamar Mandi Dalam" class="text-blue-500">
                        <span>Kamar Mandi Dalam</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Meja" class="text-blue-500">
                        <span>Meja</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Lemari" class="text-blue-500">
                        <span>Lemari</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Kipas Angin" class="text-blue-500">
                        <span>Kipas Angin</span>
                    </label>
                </div>
            </div>

            <!-- Tata Tertib -->
            <div>
                <label class="block text-gray-600 font-medium mb-2">Fasilitas Kamar</label>
                <div>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="Jendela" class="text-blue-500">
                        <span>Boleh Membawa Pets</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="AC" class="text-blue-500">
                        <span>Pasutri</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="Fasilitas" value="TV kabel" class="text-blue-500">
                        <span>Memiliki Jam Malam</span>
                </div>
            </div>

            <!-- Tombol Terapkan -->
            <button type="submit"
                class="w-full text-white py-2 rounded-lg font-medium focus:outline-none focus:ring focus:ring-[#83493d]"
                style="background-color: #83493d;">
                Terapkan Filter
            </button>
        </form>
    </div>

    <script>
        /**
         * Fungsi untuk menangani tombol kembali
         */
        function handleBack() {
            // Aksi ketika tombol "Kembali" diklik
            alert('Filter ditutup!'); // Contoh aksi, bisa diubah sesuai kebutuhan.
        }

        function formatRupiah(input) {
            let value = input.value;

            // Simpan nilai input tanpa menghapus angka dari inputan pengguna
            let cleanValue = value.replace(/[^0-9]/g, '');

            // Format angka dengan pemisah ribuan
            let formattedValue = '';
            let count = 0;

            for (let i = cleanValue.length - 1; i >= 0; i--) {
                count++;
                formattedValue = cleanValue[i] + formattedValue;
                if (count % 3 === 0 && i !== 0) {
                    formattedValue = '.' + formattedValue;
                }
            }

            // Update input value dengan Rp dan nilai yang sudah diformat
            input.value = 'Rp ' + formattedValue;
        }
    </script>
</body>

</html>