<?php
// Sambungkan ke database
$conn = new mysqli("localhost", "root", "", "cari_kost");

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memeriksa apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Mengambil data dari form
    $id_kost = $conn->real_escape_string($_POST['id_kost']);
    $id_user = $conn->real_escape_string($_POST['id_user']); 
    $nama_user = $conn->real_escape_string($_POST['nama_user']); // Correct this
    $tgl_bayar = $conn->real_escape_string($_POST['tgl_bayar']);
    $metode_bayar = $conn->real_escape_string($_POST['metode_bayar']);
    $jumlah_bayar = $conn->real_escape_string($_POST['jumlah_bayar']);
    $status_pembayaran = "Belum Bayar"; // Use this in the query as status_pembayaran
    
    // Validasi id_kost: Cek apakah ada di tabel kost
    $check_id_kost = "SELECT * FROM kost WHERE id_kost = '$id_kost'";
    $result = $conn->query($check_id_kost);

    if ($result->num_rows > 0) {
        // Jika id_kost ada, jalankan query insert
        $sql = "INSERT INTO pembayaran (id_kost, id_user, nama_user, tanggal_bayar, metode_bayar, jumlah_bayar, status_pembayaran) 
                VALUES ('$id_kost', '$id_user', '$nama_user', '$tgl_bayar', '$metode_bayar', '$jumlah_bayar', '$status_pembayaran')";
        
        if ($conn->query($sql) === TRUE) {
            // Redirect berdasarkan metode pembayaran
            if ($metode_bayar === "QRIS") {
                header("Location: /project_paw/pencari/transaksiqris");
                exit();
            } elseif ($metode_bayar === "Ditempat") {
                header("Location: /project_paw/pencari/transaksiditempat");
                exit();
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('ID Kost tidak valid! Pastikan ID Kost tersedia di database.');</script>";
    }
}

// Tutup koneksi database
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <nav class="bg-white shadow-md py-8 mb-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Pembayaran Kost</h1>
        </div>
    </nav>

    <!-- Form Pembayaran -->
    <div class="container mx-auto">
        <div class="bg-white p-8 shadow rounded-lg max-w-md mx-auto">
            <form action="" method="post">
                <!-- ID Kost -->
                <div class="mb-4">
                    <label for="id_kost" class="block text-sm font-medium text-gray-700">ID Kost</label>
                    <input type="text" name="id_kost" id="id_kost" required
                        class="p-3 w-full border border-gray-300 rounded-md mt-2" placeholder="Masukkan ID Kost">
                </div>

                <div class="mb-4">
                    <label for="id_user" class="block text-sm font-medium text-gray-700">ID User</label>
                    <input type="text" name="id_user" id="id_user" required
                        class="p-3 w-full border border-gray-300 rounded-md mt-2" placeholder="Masukkan ID User">
                </div>

                <div class="mb-4">
                    <label for="nama_user" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama_user" id="nama_user" required
                        class="p-3 w-full border border-gray-300 rounded-md mt-2" placeholder="Masukkan Nama">
                </div>


                <!-- Tanggal Bayar -->
                <div class="mb-4">
                    <label for="tgl_bayar" class="block text-sm font-medium text-gray-700">Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar" id="tgl_bayar" required
                        class="p-3 w-full border border-gray-300 rounded-md mt-2">
                </div>

                <!-- Metode Bayar -->
                <div class="mb-4">
                    <label for="metode_bayar" class="block text-sm font-medium text-gray-700">Metode Bayar</label>
                    <select name="metode_bayar" id="metode_bayar" required
                        class="p-3 w-full border border-gray-300 rounded-md mt-2">
                        <option value="" disabled selected>-- Pilih Metode --</option>
                        <option value="QRIS">QRIS</option>
                        <option value="Ditempat">Ditempat</option>
                    </select>
                </div>

                <!-- Jumlah Bayar -->
                <div class="mb-4">
                    <label for="jumlah_bayar" class="block text-sm font-medium text-gray-700">Jumlah Bayar</label>
                    <input type="number" name="jumlah_bayar" id="jumlah_bayar" required
                        class="p-3 w-full border border-gray-300 rounded-md mt-2" placeholder="Masukkan Jumlah Bayar">
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-[#68422d] text-white px-6 py-3 rounded-lg hover:bg-[#523524] transition">
                        Lanjutkan Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>