<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS ?>tailwind.css">
    <link rel="stylesheet" href="<?= CSS ?>tooltip.css">
    <link rel="stylesheet" href="<?= NODE_MODULES ?>@fortawesome/fontawesome-free/css/all.css">
    <title><?= $data["title"] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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

        
    </style>
</head>