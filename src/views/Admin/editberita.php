<?php require './views/Components/Head.php' ?>
<body class="min-h-screen flex">
<link rel="stylesheet" href="<?= NODE_MODULES ?>/quill/dist/quill.snow.css">
    <script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>
    <?php require "./views/Components/sidebarAdmin.php" ?>
    <style>
        #editor {
            height: 85%;
        }
    </style>
    <main class="p-5 w-full min-h-screen box-border bg-gray-50 flex flex-col">
            <div class="flex gap-2 w-full flex-1">
                <div class="w-48 bg-white overflow-hidden rounded-lg shadow-sm h-fit shadow-violet-300">
                    <div class="p-2 bg-gray-100 w-100 border-b border-gray-300">
                        kategori
                    </div>
                    <ul class="p-2 w-full">
                       <li class="flex justify-between">kehilangan <input name="tujuan" type="radio" checked></li>
                       <li class="flex justify-between">Dicari <input name="tujuan" type="radio"></li>
                       <li class="flex justify-between">Lainnya <input name="tujuan" type="radio"></li> 
                    </ul>
                </div>
                <div class="flex-1 p-2 bg-white rounded-lg shadow-sm w-fit shadow-violet-300 ">
                    <input type="text" placeholder="Judul Berita" value="Dicari STNK hilang dengan nopol 'S 3624 AV' Hubungi" class="border mx-2 w-full p-2 m-2">
                    <div id="editor" class="border-box">

                    </div>
                    <button class="p-1 bg-warna-second mt-2 text-white px-2 rounded-lg w-full">
                        UPDATE
                        <i class="fas fa-save"></i>
                    </button>
                </div>
            </div>
    </main>

    <script>
        const editorContainer = document.getElementById("editor");
        const options = {
            debug: 'info',
            modules: {
                toolbar: true,
            },
            placeholder: 'Isi Berita',
            theme: 'snow'
        };
        const quill = new Quill(editorContainer, options);

        // Set initial content for editing
        const content = "<p>Berita ini adalah contoh isi berita untuk keperluan edit. Anda dapat mengganti teks ini dengan konten berita yang sesuai.</p>";
        quill.root.innerHTML = content;
    </script>
</body>
<?php require './views/Components/Foot.php' ?>