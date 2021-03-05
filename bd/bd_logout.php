<?php
    session_start();
    session_destroy();
    header('Location: http://localhost/biblioteca/index.php');
?>