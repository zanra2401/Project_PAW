<!DOCTYPE html>
<html lang="en">
<?php require_once './helper/helper.php' ?>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?= ASSETS ?>image/logo.png" sizes="32x32" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS ?>tailwind.css">
    <link rel="stylesheet" href="<?= CSS ?>tooltip.css">
    <script src="<?= JS ?>/libs/jquery.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css">
    <script src="<?= JS ?>/libs/pagination.js"></script>  
    <link rel="stylesheet" href="<?= NODE_MODULES ?>@fortawesome/fontawesome-free/css/all.css">
    <title><?= $data["title"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.5.3/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.3/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="<?= NODE_MODULES ?>/quill/dist/quill.snow.css">
<script src="<?= NODE_MODULES ?>/quill/dist/quill.js"></script>
    <style>
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
        
        .alert {
            animation: message 0.5s ease 1;
            right: 10px;
        }

        @keyframes message {
            0% {
                right: -100%;
            }

            50% {
                right: -50%;
            }

            100% {
                right: 10px;
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