<?php require './views/Components/Head.php' ?>
<body class="min-h-screen flex">
<link rel="stylesheet" href="<?= NODE_MODULES ?>/quill/dist/quill.snow.css">
<script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>
<?php require "./views/Components/sidebarAdmin.php" ?>
<style>
    #editor {
        height: 85%;
    }
    #titleEditor {
        height: auto;
        margin: 10px 0;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px; 
    }
    #imagePreview {
        max-width: 100%;
        max-height: 300px;
        margin-top: 10px;
        display: none;
    }
    #dropArea {
        border: 2px dashed #ccc;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        margin: 10px 0;
        color: #aaa;
    }
    #dropArea.dragover {
        border-color: #888;
        color: #555;
    }
</style>
<main class="p-5 w-full box-border flex flex-col">
<span class="mb-3 text-gray-600 p-5"><i class="fas fa-newspaper"></i> Berita <i class="fas fa-chevron-right"></i> <i class="fa fa-add"></i> Tambah Berita </span>
    <div class="flex gap-2 w-full flex-1">
        <div class="flex-1 p-2 bg-white rounded-lg w-fit shadow-violet-300">
            <form action="/<?= PROJECT_NAME ?>/Admin/insertBerita" method="post" id="formBerita" >
                <div id="dropArea">Drag & Drop gambar di sini atau klik untuk mengunggah</div>
                <input type="file" accept="image/*" class="mx-2 w-auto p-2 m-2" id="imageInput" name="cover_berita" style="display: none;">
                <img id="imagePreview" alt="Preview Gambar">
                <input type="text" id="judulBerita" name="judulBerita" hidden>
                <input type="text" id="deskripsiBerita" name="deskripsiBerita" hidden>
                <!-- Editor untuk Judul -->
                <div id="titleEditor" name="judul_berita"></div>
                
                <!-- Editor untuk Isi Berita -->
                <div id="editor" class="border-box" name="deskripsi_berita"></div>
                
                <button type="submit" onclick="" class="p-1 bg-warna-second mt-2 text-white px-2 rounded-lg w-full">
                    POST
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</main>

<script>
    const editorContainer = document.getElementById("editor");
    const titleEditorContainer = document.getElementById("titleEditor");
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");
    const dropArea = document.getElementById("dropArea");
    const formBerita = document.getElementById("formBerita");
    const data = {};
    // Inisialisasi Quill untuk Judul Berita
    const titleOptions = {
        debug: 'info',
        modules: {
            toolbar: false, // Tidak perlu toolbar untuk judul
        },
        placeholder: 'Judul Berita',
        theme: 'snow'
    };
    const titleQuill = new Quill(titleEditorContainer, titleOptions);

    // Menghilangkan scrollbar pada Quill root untuk judul
    titleQuill.root.style.overflow = 'hidden';

    // Inisialisasi Quill untuk Isi Berita
    const contentOptions = {
        debug: 'info',
        modules: {
            toolbar: true, // Toolbar aktif untuk isi berita
        },
        placeholder: 'Isi Berita',
        theme: 'snow'
    };
    const quill = new Quill(editorContainer, contentOptions);

    // Fungsi Drag & Drop
    dropArea.addEventListener("click", () => {
        imageInput.click();
    });

    dropArea.addEventListener("dragover", (event) => {
        event.preventDefault();
        dropArea.classList.add("dragover");
    });

    dropArea.addEventListener("dragleave", () => {
        dropArea.classList.remove("dragover");
    });

    dropArea.addEventListener("drop", (event) => {
        event.preventDefault();
        dropArea.classList.remove("dragover");
        const file = event.dataTransfer.files[0];
        if (file) {
            handleFile(file);
        }
    });

    imageInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
            handleFile(file);
        }
    });

    function handleFile(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        };
        reader.readAsDataURL(file);
    }

    function tambahBerita()
    {
        deskripsiBerita.value = titleQuill.root.innerHTML;
        judulBerita.value = quill.root.innerHTML;
        console.log(judulBerita.value);
    }

    
    formBerita.addEventListener("submit", function (e){
        deskripsiBerita.value = quill.root.innerHTML;
        judulBerita.value = titleQuill.root.innerHTML;
        console.log(judulBerita.value);
    })

</script>
</body>
<?php require './views/Components/Foot.php' ?>
