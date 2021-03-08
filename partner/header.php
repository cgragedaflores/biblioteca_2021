<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.17/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.17/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.17/dist/js/uikit-icons.min.js"></script>
    <!-- JQUERY CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Biblioteca Nazarick Partner</title>
</head>
<?php
    session_start();
?>

<body uk-grid>
    <header class="uk-width-1-1@s">
        <nav class="uk-navbar-container uk-margin" uk-navbar>
            <div class="nav-overlay uk-navbar-left">
                <!-- <a class="uk-navbar-item uk-logo" href="http://localhost/biblioteca/partner/index.php">Biblioteca Nazarick</a> -->
                <!-- <a class="uk-navbar-item uk-logo" href="https://remotehost.es/student33/dwes/partner/index.php">Biblioteca Nazarick</a> -->
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <input class="uk-input uk-form-blank uk-form-width-medium uk-text-large" type="text" id='time'
                            readonly='true'>
                    </li>
                    <li>
                        <img src="" alt="" id='icon'>
                    </li>
                    <li>
                        <input class="uk-input uk-form-blank uk-form-width-medium uk-text-large" type="text" id='temp'
                            readonly='true'>
                    </li>
                </ul>
            </div>
        </nav>
    </header>