<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* Custom styles */
    .container {
        max-width: 700px;
    }

    .card-input {
        max-width: 500px;
        margin: 0 auto;
    }

    .success-container {
        max-width: 700px;
        margin: 100px auto;
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        padding: 30px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body class="bg-gray-50">
    <nav class="bg-white shadow-md py-8 mb-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Pembayaran Kost</h1>
        </div>
    </nav>

    <!-- Form Section -->
    <div class="container mx-auto">
        <div class="card-input bg-white p-8 shadow rounded-lg">
            <form id="paymentForm" action="success.html" method="post">
                <!-- ID Kost -->
                <div class="mb-4">
                    <label for="id_kost" class="block text-sm font-medium text-gray-700">ID Kost</label>
                    <input type="text" id="id_kost" name="id_kost"
                        class="p-3 w-full border border-gray-300 rounded-md mt-2" placeholder="Masukkan ID Kost"
                        required />
                </div>

                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" class="p-3 w-full border border-gray-300 rounded-md mt-2"
                        placeholder="Masukkan Nama" required />
                </div>

                <!-- Tanggal Bayar -->
                <div class="mb-4">
                    <label for="tgl_bayar" class="block text-sm font-medium text-gray-700">Tanggal Bayar</label>
                    <input type="date" id="tgl_bayar" name="tgl_bayar"
                        class="p-3 w-full border border-gray-300 rounded-md mt-2" required />
                </div>

                <!-- Metode Bayar -->
                <div class="mb-4">
                    <label for="metode_dibayar" class="block text-sm font-medium text-gray-700">Metode Bayar</label>
                    <select id="metode_dibayar" name="metode_dibayar"
                        class="p-3 w-full border border-gray-300 rounded-md mt-2" required>
                        <option value="" disabled selected>-- Pilih Metode --</option>
                        <option value="QRIS">QRIS</option>
                        <option value="Ditempat">Ditempat</option>
                    </select>
                </div>

                <!-- Jumlah Bayar -->
                <div class="mb-4">
                    <label for="jumlah_bayar" class="block text-sm font-medium text-gray-700">Jumlah Bayar</label>
                    <input type="text" id="jumlah_bayar" name="jumlah_bayar"
                        class="p-3 w-full border border-gray-300 rounded-md mt-2" placeholder="Masukkan Jumlah Bayar"
                        required />
                </div>

                <!-- Submit Button -->
                <div class="mt-6 text-center">
                    <button type="submit" id="continue-button"
                        class="bg-[#68422d] text-white px-6 py-3 rounded-lg hover:bg-[#5a3724] transition duration-200">
                        Lanjutkan Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<!-- Halaman Success -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Sukses</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <div class="success-container">
        <h1 class="text-2xl font-bold">SELAMAT PEMBAYARAN ANDA TELAH BERHASIL</h1>
        <p class="mt-4 text-lg">Silahkan datang ke tempat kost untuk melakukan transaksi.</p>
        <a href="index.html"
            class="mt-6 inline-block text-sm font-semibold text-white bg-[#68422d] px-6 py-3 rounded-lg hover:bg-[#5a3724] transition">Selesai</a>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    .qr-container {
        max-width: 700px;
        margin: 100px auto;
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        padding: 30px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .qr-image {
        max-width: 300px;
        margin: 20px auto;
    }
    </style>
</head>

<body class="bg-gray-50">
    <div class="qr-container">
        <h1 class="text-2xl font-bold">GUNAKAN APLIKASI PEMBAYARAN UNTUK MELAKUKAN SCAN PADA KODE QR DI BAWAH</h1>


        <!-- QRIS Image -->
        <img src="path-to-your-qris-image.jpg" alt="QRIS Code" class="qr-image" />

        <a href="success.html"
            class="mt-6 inline-block text-sm font-semibold text-white bg-[#68422d] px-6 py-3 rounded-lg hover:bg-[#5a3724] transition">Selesai</a>
    </div>
</body>

</html>