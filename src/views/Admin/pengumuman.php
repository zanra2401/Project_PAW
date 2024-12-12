<?php require './views/Components/Head.php' ?>
<body class="h-screen flex ">
    <link rel="stylesheet" href="<?= NODE_MODULES ?>/quill/dist/quill.snow.css">
    <script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>
    <?php require "./views/Components/sidebarAdmin.php" ?>
    <style>
        #editor {
            height: 85%
        }
    </style>
    <main class="p-5 w-full min-h-screen box-border bg-gray-50 flex flex-col">
            <span class="mb-3 text-gray-600"> <i class="fas fa-microphone"></i> Pengumuman <i class="fas fa-chevron-right"></i> </span>
            <div class="flex gap-2 w-full flex-1">
                <div class="w-48 bg-white overflow-hidden  rounded-lg shadow-sm h-fit shadow-violet-300">
                    <div class="p-2 bg-gray-100 w-100 border-b border-gray-300">
                        Tujuan
                    </div>
                    <ul class="p-2 w-full">
                       <li class="flex justify-between">Pemilik Kost <input name="tujuan" type="radio"></li>
                       <li class="flex justify-between">Pencari Kost <input name="tujuan" type="radio"></li>
                       <li class="flex justify-between">Semua <input name="tujuan" class="ml-auto" t type="radio"></li> 
                    </ul>
                </div>
                <div class="flex-1 p-2 bg-white rounded-lg shadow-sm w-fit shadow-violet-300 ">
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
                placeholder: 'Pesan',
                theme: 'snow'
            };
            const quill = new Quill(editorContainer, options);

    </script>
</body>
<?php require './views/Components/Foot.php' ?>