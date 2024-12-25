<?php 
    require './views/Components/Headnotif.php';
    $foto_profile = $data['data_user'][0]['profile_user'];
?>

<body class="flex" style="overflow: hidden; font-family: 'Roboto', Arial, sans-serif; background-color: #f4f5f7; color: #333;">
    <style>
        /* Container Styling */
        .container {
            margin: auto;
            padding: 24px;
            max-width: 800px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100vw;
            overflow: auto;
            height: 100vh;
        }

        /* Title Styling */
        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #1a202c;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        h1 i {
            font-size: 24px;
            color: #4a90e2;
        }

        /* Card Styling */
        .card {
            background-color: #ffffff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0px 6px 16px rgba(0, 0, 0, 0.15);
        }

        .card h2 {
            font-size: 20px;
            font-weight: bold;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 8px;
        }

        .card h2 i {
            font-size: 18px;
            color: #4a90e2;
        }

        .card .content {
            font-size: 14px;
            color: #4a5568;
            line-height: 1.6;
        }

        .card .date {
            font-size: 12px;
            color: #718096;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card .date i {
            color: #a0aec0;
        }

        /* Scrollbar Styling */
        .container::-webkit-scrollbar {
            width: 10px;
        }

        .container::-webkit-scrollbar-track {
            border-radius: 5px;
        }

        .container::-webkit-scrollbar-thumb {
            border-radius: 5px;
        }

        .container::-webkit-scrollbar-thumb:hover {
            background: #357ab7;
        }

        /* Quill Editor Styling */
        .quill-editor {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px;
            background-color: #f7fafc;
            font-size: 14px;
            color: #4a5568;
            line-height: 1.6;
        }
    </style>

    <!-- Sidebar -->
    <?php require "./views/Components/sidebarPemilik.php" ?>

    <main class="container">
        <h1><i class="fas fa-bullhorn"></i> Pengumuman</h1>
        <?php foreach ($data['notif'] as $item): ?>
            <div class="card">
                <h2><i class="fas fa-clipboard"></i> <?= htmlspecialchars($item['judul_pengumuman']) ?></h2>
                <div class="quill-editor content" id="editor-<?= $item['id_pengumuman'] ?>">
                    <?= $item['isi_pengumuman'] ?>
                </div>
                <p class="date">
                    <i class="fas fa-calendar-alt"></i>
                    <span><strong>Tanggal:</strong></span> <?= $item['tanggal_pengumuman'] ?>
                </p>
            </div>
        <?php endforeach; ?>
    </main>

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Quill.js -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        document.addEventListener('onload', () => {
            document.querySelectorAll('.quill-editor').forEach((editor) => {
                const quill = new Quill(editor, {
                    theme: 'snow',
                    readOnly: true,
                    modules: {
                        toolbar: false
                    }
                });

                // Set the content
                quill.root.innerHTML = editor.innerHTML;
            });
        });
    </script>
</body>
<?php require './views/Components/Foot.php' ?>
