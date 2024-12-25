<?php require './views/Components/Head.php' ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans text-gray-800 bg-gray-100 min-h-screen flex flex-col">
    <!-- Main Content -->
    <nav class="bg-white shadow-md py-8">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Tombol Kembali -->
        <button onclick="window.history.back()" 
                class="text-lg font-semibold hover:text-gray-500 flex items-center px-4 py-2">
            <i class="fa-solid fa-right-from-bracket mr-2" style="transform: rotate(180deg);"></i>
            Kembali
        </button>
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Tentang Kami</h1>
        </div>
    </nav>

    <div class="flex flex-col lg:flex-row flex-grow mt-6 px-6 lg:px-20 gap-8">

        <!-- Left Section: About Text -->
        <div class="flex-1 lg:w-2/3 bg-gray-100 p-10 rounded-lg flex justify-center items-start">
            <section class="max-w-lg w-full">
                <p class="mb-4 text-sm leading-relaxed text-justify">
                    Cari Kos adalah platform inovatif yang didedikasikan untuk memudahkan pencarian hunian bagi para
                    mahasiswa, pekerja, dan siapa saja yang membutuhkan tempat tinggal sementara. Kami memahami bahwa
                    menemukan kos yang sesuai dengan kebutuhan dan anggaran bisa menjadi tantangan, terutama di
                    kota-kota besar. Oleh karena itu, CariKos hadir untuk membantu Anda menemukan kos idaman dengan
                    cepat, mudah, dan efisien.
                </p>
                <p class="mb-4 text-sm leading-relaxed text-justify">
                    Dengan fitur pencarian yang canggih dan informasi yang lengkap, pengguna dapat menelusuri pilihan
                    kos berdasarkan lokasi, harga, fasilitas, serta tipe hunian yang diinginkan. Kami bekerja sama
                    dengan pemilik kos terpercaya untuk memastikan semua informasi yang kami tampilkan akurat dan
                    up-to-date, sehingga Anda dapat membuat keputusan yang tepat.
                </p>
                <p class="mb-4 text-sm leading-relaxed text-justify">
                    Visi kami adalah menjadi platform pencarian kos terbaik di Indonesia, memberikan pengalaman
                    pencarian
                    yang nyaman dan terpercaya bagi semua pengguna. Misi kami adalah menjembatani antara pencari kos dan
                    pemilik kos dengan layanan yang transparan, mudah diakses, dan dapat diandalkan.
                </p>
                <p class="text-sm leading-relaxed text-justify">
                    Temukan kos impian Anda dengan CariKos dan nikmati pengalaman tinggal yang lebih baik!
                </p>
            </section>
        </div>

        <!-- Right Section: Image -->
        <div class="flex justify-center items-center lg:w-1/3">
            <img src="<?= ASSETS?>image/logo.png" alt="Foto Kost" class="max-w-full h-auto rounded-lg">
        </div>

    </div>

</body>

</html>
<?php require './views/Components/Foot.php' ?>