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

<body class="bg-gray-50"></body>
<nav class="bg-white shadow-md py-8 mb-8">
    <div class="container mx-auto flex justify-center">
        <h1 class="text-2xl font-bold text-gray-800">Pembayaran Kost</h1>
    </div>
</nav>
<div class="qr-container">
    <h1 class="text-2xl font-bold">GUNAKAN APLIKASI PEMBAYARAN UNTUK MELAKUKAN SCAN PADA KODE QR DI BAWAH</h1>


    <!-- QRIS Image -->
    <img src="../public/assets/image/barcode.png" alt="QRIS Code" class="qr-image" />

    <a href="success.html"
        class="mt-6 inline-block text-sm font-semibold text-white bg-[#68422d] px-6 py-3 rounded-lg hover:bg-[#5a3724] transition">Selesai</a>
</div>
</body>

</html>