<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    </style>
</head>