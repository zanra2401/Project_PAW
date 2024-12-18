<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Sukses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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

    .qr-image {
        max-width: 300px;
        margin: 20px auto;
    }
    </style>
</head>

<body class="bg-gray-50">
    <nav class="bg-white shadow-md py-8 mb-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Pembayaran Kost</h1>
        </div>
    </nav>

    <div class="success-container">
        <h1 class="text-2xl font-bold">SELAMAT PEMBAYARAN ANDA TELAH BERHASIL</h1>
        <p class="mt-4 text-lg">Silahkan datang ke tempat kost untuk melakukan transaksi.</p>
        <a href="index.html"
            class="mt-6 inline-block text-sm font-semibold text-white bg-[#68422d] px-6 py-3 rounded-lg hover:bg-[#68422d] transition">Selesai</a>
    </div>

</body>

</html>