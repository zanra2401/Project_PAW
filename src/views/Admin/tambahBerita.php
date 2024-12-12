<?php require './views/Components/Head.php' ?>
<body class="min-h-screen flex">
<link rel="stylesheet" href="<?= NODE_MODULES ?>/quill/dist/quill.snow.css">
    <script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>
    <?php require "./views/Components/sidebarAdmin.php" ?>
    <style>
        #editor {
            height: 85%
        }
    </style>
    <main class="p-5 w-full min-h-screen box-border bg-gray-50 flex flex-col">
            <div class="flex gap-2 w-full flex-1">
                <div class="w-48 bg-white overflow-hidden  rounded-lg shadow-sm h-fit shadow-violet-300">
                    <div class="p-2 bg-gray-100 w-100 border-b border-gray-300">
                        kategori
                    </div>
                    <ul class="p-2 w-full">
                       <li class="flex justify-between">kehilangan <input name="tujuan" type="radio"></li>
                       <li class="flex justify-between">Dicari <input name="tujuan" type="radio"></li>
                       <li class="flex justify-between">Lainnya <input name="tujuan" class="ml-auto" t type="radio"></li> 
                    </ul>
                </div>
                <div class="flex-1 p-2 bg-white rounded-lg shadow-sm w-fit shadow-violet-300 ">
                    <input type="text" placeholder="Judul Berita" class="border mx-2 w-full p-2 m-2">
                    <div id="editor" clas="border-box">
    
                    </div>
                    <button class="p-1  bg-warna-second mt-2 text-white px-2 rounded-lg w-full">
                        POST
                        <i class="fas fa-paper-plane"></i>
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

    </script>
</body>
<?php require './views/Components/Foot.php' ?>