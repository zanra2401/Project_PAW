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
    
    <style>
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

        @media (max-width: 543px) {
            .credit {
                flex-direction: column;

                gap: 15px;
            }
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

        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .container {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 1.5rem;
            user-select: none;
        }

        .container span {
            font-size: 16px;
            font-weight: 500;
        }

        .checkmark {
            display: flex;
            justify-content: center;
            align-items: center;
            --clr: #83493d;
            position: relative;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 300ms;
        }

        .container input:checked ~ .checkmark {
            background-color: var(--clr);
            border-radius: .5rem;
            animation: pulse 500ms ease-in-out;
        }

        .checkmark:after {
            content: "";
            display: none;
        }

        .container input:checked ~ .checkmark:after {
            display: block;
            text-align: center;
        }

        .container .checkmark:after {
            left: 0.45em;
            top: 0.25em;
            width: 0.25em;
            height: 0.5em;
            border: solid #E0E0E2;
            border-width: 0 0.15em 0.15em 0;
            transform: rotate(45deg);
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 #0B6E4F90;
                rotate: 20deg;
            }

            50% {
                rotate: -20deg;
            }

            75% {
                box-shadow: 0 0 0 10px #0B6E4F60;
            }

            100% {
                box-shadow: 0 0 0 13px #0B6E4F30;
                rotate: 0;
            }
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


