<?php

    define("CSS", "/project_paw/public/css/");
    define("JS", "/project_paw/public/js/");
    define("LIBS", "/project_paw/public/libs/");
    define("VENDOR", __DIR__ . "/../../vendor/");
    define("STORAGE", __DIR__ . "/../../public/storage/");
    define("NODE_MODULES", "/project_paw/node_modules/");
    define("PUBLIC_FOLDER", "/project_paw/public/");
    define("ASSETS", "/project_paw/public/assets/");
    define("PROJECT_NAME", "project_paw");
    define("KEY", "kelompok4");
    define("IV", openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')));
    define("IV_LENGTH", openssl_cipher_iv_length('aes-256-cbc'));