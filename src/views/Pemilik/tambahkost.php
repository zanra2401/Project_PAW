<?php require './views/Components/Head.php' ?>

<body class="font-roboto bg-grey-200 text-black">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-8">
        <div class="container mx-auto flex justify-center">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Kost</h1>
        </div>
    </nav>
    <div class="container mx-auto my-10 bg-white p-10 rounded-lg shadow-lg max-w-2xl">
        <p class="text-center text-lg font-semibold" style="color: #68422d;">FORM TAMBAH KOST</p> <br>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle form submission
        } else {
        ?>
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-10">
            <!-- Grid for form fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama_kost" class="block text-sm font-bold text-gray-700">Nama Kost</label>
                    <input type="text" id="nama_kost" name="nama_kost" placeholder="Masukkan Nama Kost"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="kode_pos" class="block text-sm font-bold text-gray-700">Kode Pos</label>
                    <input type="text" id="kode_pos" name="kode_pos" placeholder="Masukkan Kode Pos"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-bold text-gray-700">Alamat</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="nomor_hp" class="block text-sm font-bold text-gray-700">Nomor HP</label>
                    <input type="text" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor HP"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg" required>
                </div>

                <!-- New ID Kost field -->
                <div>
                    <label for="id_kost" class="block text-sm font-bold text-gray-700">ID Kost</label>
                    <input type="text" id="id_kost" name="id_kost" placeholder="Masukkan ID Kost"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="harga" class="block text-sm font-bold text-gray-700">Harga</label>
                    <input type="number" id="harga" name="harga" placeholder="Masukkan Harga (Rp)"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg" required>
                </div>
            </div>

            <p class="text-center text-lg font-semibold text-gray-800 border-b-2 border-gray-300 pb-2">
                INFORMASI
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="fasilitas" class="block text-sm font-bold text-gray-700">Fasilitas</label>
                    <textarea id="fasilitas" name="fasilitas" rows="2" placeholder="Masukkan Fasilitas"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg resize-none"></textarea>
                </div>
                <div>
                    <label for="keterangan" class="block text-sm font-bold text-gray-700">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="2" placeholder="Masukkan Keterangan"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg resize-none"></textarea>
                </div>
                <div>
                    <label for="peraturan" class="block text-sm font-bold text-gray-700">Peraturan</label>
                    <textarea id="peraturan" name="peraturan" rows="2" placeholder="Masukkan Peraturan"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg resize-none"></textarea>
                </div>
                <div>
                    <label for="foto" class="block text-sm font-bold text-gray-700">Unggah Foto</label>
                    <input type="file" id="foto" name="foto" accept="image/*"
                        class="w-full mt-1 p-2 border-2 border-gray-300 rounded-lg">
                    <small class="text-sm text-gray-500">Maks 20 MB</small>
                </div>
            </div>

            <!-- Button in the center -->
            <div class="flex justify-center mt-5">
                <button type="submit" class="px-6 py-2 font-bold rounded-lg transition duration-300"
                    style="background-color: #68422d; color: white;">
                    Simpan
                </button>
            </div>
        </form>
        <?php } ?>
    </div>
</body>
<?php require "./views/Components/Foot.php" ?>