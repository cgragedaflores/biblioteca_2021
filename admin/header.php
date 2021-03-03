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
    <title>Biblioteca Nazarick</title>
</head>

<body uk-grid>
    <?php if(isset($_SESSION))session_start();?>
    <header class="uk-width-1-1@s uk-margin-remove">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="#">Biblioteca Nazarick</a>
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="#">Libros</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="http://localhost/biblioteca/form/form_book_admin.php">Buscar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="uk-active">
                        <a href="#">Usuarios</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">Buscar</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Agregar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="uk-active">
                        <a href="#">Reservas</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">Buscar</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Agregar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="uk-active">
                        <a href="#">Pedidos</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="#">Buscar</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Agregar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>