<?php require './views/Components/Head.php' ?>

<body class="font-roboto bg-white-200 text-black">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Kebijakan Aplikasi Pencari Kost</h1>
        </div>
    </nav>

    <div class="container mx-auto p-6 bg-white rounded-lg  my-10">
        <?php 
        $sections = [
            [
                'title' => 'Ketentuan Umum',
                'number' => 1,
                'content' => 'Aplikasi ini disediakan untuk membantu pengguna menemukan dan memesan kost secara online. Dengan menggunakan aplikasi, pengguna setuju untuk mematuhi seluruh syarat dan ketentuan yang berlaku.',
            ],
            [
                'title' => 'Kebijakan Privasi',
                'number' => 2,
                'content' => '
                    <h3 class="text-lg font-medium text-black">Pengumpulan Data</h3>
                    <p>Kami mengumpulkan data pribadi pengguna seperti nama, alamat email, dan nomor telepon untuk keperluan pendaftaran dan komunikasi.</p>
                    <h3 class="text-lg font-medium text-black mt-3">Penggunaan Data</h3>
                    <p>Data yang dikumpulkan hanya digunakan untuk kepentingan operasional aplikasi, seperti konfirmasi pemesanan kost, komunikasi dengan pemilik kost, dan keperluan lainnya yang berhubungan dengan layanan.</p>
                    <h3 class="text-lg font-medium text-black mt-3">Perlindungan Data</h3>
                    <p>Kami menjaga privasi dan keamanan data pengguna sesuai dengan hukum yang berlaku. Data tidak akan dibagikan kepada pihak ketiga tanpa izin kecuali diharuskan oleh hukum.</p>',
            ],
            [
                'title' => 'Kebijakan Pencarian Kost',
                'number' => 3,
                'content' => '
                    <h3 class="text-lg font-medium text-black">Keakuratan Informasi</h3>
                    <p>Kami berusaha menampilkan informasi kost yang akurat dan terbaru. Namun, kami tidak bertanggung jawab atas perubahan harga, fasilitas, atau ketersediaan kost yang tidak diinformasikan oleh pemilik kost.</p>
                    <h3 class="text-lg font-medium text-black mt-3">Filter Pencarian</h3>
                    <p>Pengguna dapat menggunakan filter untuk menyesuaikan pencarian sesuai kebutuhan, seperti harga, lokasi, fasilitas, dan jenis kamar.</p>
                    <h3 class="text-lg font-medium text-black mt-3">Penilaian & Ulasan</h3>
                    <p>Pengguna dapat memberikan ulasan dan penilaian terhadap kost yang disewa. Ulasan harus objektif dan berdasarkan pengalaman pribadi.</p>',
            ],
            [
                'title' => 'Kebijakan Pemesanan dan Pembatalan',
                'number' => 4,
                'content' => '
                    <h3 class="text-lg font-medium text-black">Pemesanan Kost</h3>
                    <p>Pemesanan dapat dilakukan langsung melalui aplikasi setelah pengguna memilih kost yang sesuai. Pemesanan dianggap sah setelah pengguna menerima konfirmasi dari pemilik kost.</p>
                    <h3 class="text-lg font-medium text-black mt-3">Pembayaran</h3>
                    <p>Pembayaran sewa kost dapat dilakukan melalui berbagai metode yang tersedia di aplikasi. Setiap transaksi akan disertai dengan bukti pembayaran yang dapat diakses di akun pengguna.</p>
                    <h3 class="text-lg font-medium text-black mt-3">Pembatalan Pemesanan</h3>
                    <p>Pengguna dapat membatalkan pemesanan dengan ketentuan kebijakan pembatalan yang ditetapkan oleh pemilik kost, seperti pengembalian dana atau biaya administrasi.</p>',
            ],
            [
                'title' => 'Hak dan Kewajiban Pengguna',
                'number' => 5,
                'content' => '
                    <h3 class="text-lg font-medium text-black">Hak Pengguna</h3>
                    <p>Pengguna berhak mengakses informasi kost, melakukan pemesanan, memberikan ulasan, dan meminta bantuan terkait masalah teknis.</p>
                    <h3 class="text-lg font-medium text-black mt-3">Kewajiban Pengguna</h3>
                    <p>Pengguna wajib memberikan informasi yang benar dan akurat saat mendaftar dan melakukan pemesanan. Pengguna juga diharapkan untuk mematuhi aturan yang berlaku di kost yang dipesan.</p>',
            ],
            [
                'title' => 'Tanggung Jawab Aplikasi',
                'number' => 6,
                'content' => '
                    <h3 class="text-lg font-medium text-black">Keandalan Layanan</h3>
                    <p>Kami berkomitmen menyediakan layanan yang stabil dan dapat diandalkan. Namun, tidak dapat menjamin bahwa aplikasi akan selalu bebas dari gangguan atau kesalahan.</p>
                    <h3 class="text-lg font-medium text-black mt-3">Penyelesaian Sengketa</h3>
                    <p>Apabila terjadi sengketa antara pengguna dan pemilik kost, kami berfungsi sebagai perantara dan akan membantu dalam penyelesaian melalui mediasi.</p>',
            ],
            [
                'title' => 'Perubahan Kebijakan',
                'number' => 7,
                'content' => '
                    Kebijakan ini dapat diubah sewaktu-waktu. Pengguna akan diberi tahu melalui email atau notifikasi aplikasi mengenai perubahan kebijakan. Pengguna disarankan untuk selalu memeriksa kebijakan terbaru sebelum menggunakan aplikasi.',
            ],
            [
                'title' => 'Kontak',
                'number' => 8,
                'content' => '
                    Jika pengguna memiliki pertanyaan atau keluhan terkait kebijakan ini, dapat menghubungi layanan pelanggan melalui email: <a href="mailto:carikost@gmail.com" class="text-blue-600 underline">carikost@gmail.com</a>',
            ]
        ];
        ?>

        <!-- Render Dynamic Sections -->
        <?php foreach ($sections as $section): ?>
        <section>
            <div class="flex items-center mb-3">
                <div class="w-10 h-10 bg-[#D7DBDD] text-black rounded-full flex items-center justify-center">
                    <span class="font-bold text-lg"><?= $section['number'] ?? '' ?></span>
                </div>
                <h2 class="text-xl font-semibold text-black ml-3"><?= $section['title'] ?></h2>
            </div>
            <div class="p-4 bg-white rounded-md  text-black">
                <?= $section['content'] ?>
            </div>
        </section>
        <?php endforeach; ?>
    </div>

</body>
<?php require './views/Components/Foot.php' ?>