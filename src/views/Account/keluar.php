<?php 

    session_destroy();
    header("Location: /" . PROJECT_NAME . "/pencari/homepage");
    die();

?>