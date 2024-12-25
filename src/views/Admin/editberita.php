<?php require './views/Components/Head.php'; ?>
<script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>

<body class="min-h-screen flex">
    <style>
        /* Styling untuk input file */
        .input-file-wrapper {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .input-file {
            display: none; /* Menyembunyikan input file asli */
        }

        #judul {
            height: fit-content;
        }

        #deskripsi {
            height: fit-content;
        }
    </style>

<?php require "./views/Components/sidebarAdmin.php"; ?>
<main class="p-5 w-full h-screen overflow-auto box-border bg-gray-50 flex flex-col">
    <span class="text-gray-600"><i class="fas fa-newspaper"></i> Berita <i class="fas fa-chevron-right"></i> <i class="fas fa-file"></i> Edit Berita</span>
    <h2 class="text-xl font-bold mb-4 mt-4">Edit Berita</h2>

    <form id="formBerita" action="/<?= PROJECT_NAME ?>/Admin/updateBerita" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
            <img id="previewImage" src="<?= "/" . PROJECT_NAME . "/" . $data['berita']['cover_berita']?>" class="w-36 rounded-lg" alt="Cover Berita">
        </div>

        <!-- Ubah Cover -->
        <div class="input-file-wrapper mb-4">
            <input type="file" id="cover_berita" name="cover_berita" accept="image/*" onchange="previewImageFunction()" class="input-file">
            <label for="cover_berita" class="inline-block bg-red-500 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-red-600">
                Ubah Cover
            </label>
        </div>

        <!-- Input ID Berita -->
        <input type="hidden" name="idBerita" value="<?= htmlspecialchars($data['berita']['id_berita']); ?>">

        <!-- Input Judul Berita -->
        <label for="judul" class="block text-gray-700 mb-3 font-Roboto-bold">Judul Berita</label>
        
        <div id="judul" class="h-fit"></div>
        <input type="text" name="judul" id="inputJudul" hidden>


        <!-- Input Deskripsi Berita -->
        <label for="deskripsi" class="block text-gray-700 mb-3 font-Roboto-bold">Deskripsi Berita</label>
        <div id="deskripsi" class="h-fit border-box"></div>
        <input type="text" name="deskripsi" id="inputDeskripsi" hidden>

        <!-- Tombol Submit -->
        <button type="submit" class="px-4 py-2 mt-4 text-white bg-red-500 rounded-lg hover:bg-red-600 ">
            Update Berita
        </button>
    </form>
</main>

<script>
    const deskripsi = document.getElementById("deskripsi");
    const judul = document.getElementById("judul");
    // const imageInput = document.getElementById("imageInput");
    // const imagePreview = document.getElementById("imagePreview");
    // const dropArea = document.getElementById("dropArea");
    const formBerita = document.getElementById("formBerita");
    const data = {};

    const titleOptions = {
        debug: 'info',
        modules: {
            toolbar: false, // Tidak perlu toolbar untuk judul
        },
        placeholder: 'Judul Berita',
        theme: 'snow'
    };
    
    const titleQuill = new Quill(judul, titleOptions);
    titleQuill.root.innerHTML = `<?= $data['berita']['judul_berita'] ?>`;


    const contentOptions = {
        debug: 'info',
        modules: {
            toolbar: true, // Toolbar aktif untuk isi berita
        },
        placeholder: 'Isi Berita',
        theme: 'snow'
    };

   
    
    const quill = new Quill(deskripsi, contentOptions);
    quill.root.innerHTML = `<?= $data['berita']['deskripsi_berita'] ?>`;

    // Fungsi untuk menampilkan preview gambar sebelum di-upload

    function previewImageFunction() {
        const file = document.getElementById('cover_berita').files[0]; // Ambil file yang dipilih
        const reader = new FileReader(); // Membaca file

        reader.onload = function(e) {
            const preview = document.getElementById('previewImage'); // Gambar preview
            preview.src = e.target.result; // Set sumber gambar dengan hasil pembacaan file
        };

        if (file) {
            reader.readAsDataURL(file); // Mulai pembacaan file sebagai data URL
        }
    }
    
    formBerita.addEventListener("submit", function (e) {
        inputDeskripsi.value = quill.root.innerHTML;
        inputJudul.value = titleQuill.getText();
    });
</script>

</body>
<?php require './views/Components/Foot.php'; ?>
