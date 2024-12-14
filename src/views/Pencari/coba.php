<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoom Gambar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Gaya untuk gambar kecil */
        .thumbnail {
            width: 200px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .thumbnail:hover {
            transform: scale(1.1);
        }

        /* Gaya untuk modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
        }

        .modal.active {
            display: flex;
        }
    </style>
</head>
<body>
    <!-- Gambar kecil -->
    <img src="https://via.placeholder.com/200" class="thumbnail" alt="Thumbnail" id="thumbnail">

    <!-- Modal -->
    <div class="modal" id="imageModal">
        <img src="https://via.placeholder.com/200" alt="Zoomed Image">
    </div>

    <script>
        const thumbnail = document.getElementById('thumbnail');
        const modal = document.getElementById('imageModal');

        // Buka modal saat gambar diklik
        thumbnail.addEventListener('click', () => {
            modal.classList.add('active');
        });

        // Tutup modal saat area luar gambar diklik
        modal.addEventListener('click', () => {
            modal.classList.remove('active');
        });
    </script>
</body>
</html>
