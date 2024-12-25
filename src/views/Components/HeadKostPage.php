<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?= ASSETS ?>image/logo.png" sizes="32x32" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS ?>tailwind.css">
    <link rel="stylesheet" href="<?= CSS ?>tooltip.css">
    <link rel="stylesheet" href="<?= NODE_MODULES ?>@fortawesome/fontawesome-free/css/all.css">
    <title><?= $data["title"] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        .chat {
            border-color: #83493d; 
            color:#83493d; 
            font-weight: 600; 
            height:50px;
            transition: 0.3s;
        }

        .chat:hover {
            opacity: 70%;
        }

        .lihat-kamar {
            border-color: #83493d; 
            color:#fff; 
            font-weight: 600; 
            height:50px; 
            background-color:#83493d;
            transition: 0.3s;
        }

        .lihat-kamar:hover {
            opacity: 70%;

        }

        .main-menu-foot {
            font-size: 20px;
            font-weight: 600;
        }

        .menu-foot {
            display:flex; 
            justify-content: center; 
            gap: 150px;
            color: #fff;
            margin-bottom: 20px;
        }

        @media (max-width: 1048px){
            .menu-foot {
                flex-direction: column;
                gap: 10px !important;
            }

            .imag {
                margin-bottom: 20px;
            }

        }

        @media (max-width: 1115px){
            .piihan-menu {
                display: none !important;
            }

            .search-bar {
                width: 100% !important;
            }

            .temukan-kost {
                display: none;
            }

            .tombol-search {
                width: 40px;
                height: 50px;
                padding-left: 0;
            }

            .logo-search {
                width: 20px;
                
            }

            .field-inputan-search {
                width: 90% !important;
                margin-left: 15px;
            }

            .logo-menu {
                margin-left: -10px;
            }
        }

        .carousel {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .carousel-track-container {
            overflow: hidden;
            position: relative;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.4s ease-in-out;
            transform: translateX(0);
        }

        .carousel-slide {
            min-width: 100%;
            transition: opacity 0.4s ease-in-out;
        }

        .carousel-slide img {
            width: 100%;
            display: block;
            border-radius: 10px;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            z-index: 10;
        }

        .left-button {
            left: 10px;
        }

        .right-button {
            right: 10px;
        }

        .carousel-button:focus {
            outline: none;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #e5e7e9;
            color: #fff;
            border: none;
            font-weight: 700;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            z-index: 10;
            opacity: 0; 
            transition: opacity 0.3s ease-in-out;
            pointer-events: none; 
            
        }

        .carousel-icon-svg {
            width: 30%;
            margin-left: 10px;
            color: #28282B;
        }

        .carousel:hover .carousel-button {
            opacity: 1; /* Tampilkan tombol saat di-hover */
            pointer-events: auto; /* Aktifkan klik */
        }

        .left-button {
            left: 10px;
        }

        .right-button {
            right: 10px;
        }

        .carousel-button:focus {
            outline: none;
        }

        .hidden {
            display: none; /* Sembunyikan tombol secara penuh */
        }

        @keyframes slideIn {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(0);
            }
        }

        /* Animasi keluar ke kanan */
        @keyframes slideOut {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .box-enter {
            animation: slideIn 0.5s ease-in-out forwards;
        }

        .box-exit {
            animation: slideOut 0.5s ease-in-out forwards;
        }
    </style>
</head>