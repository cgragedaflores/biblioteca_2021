<?php include 'header.php'?>
<?php
$profileImage = "http://localhost/biblioteca/img/profile_Images" . $_SESSION['usuario']['picture'];
// $profileImage = "https://remotehost.es/student33/dwes/img/profile_img/".$_SESSION['usuario']['picture'];
if (isset($profileImage)) {
    $profileImage = "http://localhost/biblioteca/img/user.png";
    // $profileImage = "https://remotehost.es/student33/dwes/img/user.png";
}
//trata fecha
$date = date_create($_SESSION['usuario']['joined_on']);
?>
<main class='uk-width-1-1 uk-padding-small uk-margin-medium-left' uk-grid>
    <div class="uk-width-auto@m uk-margin-small">
        <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
            <li><a href="#" uk-icon='icon: home; ratio:1.5;'></a></li>
            <li><a href="#" uk-icon="icon: bookmark; ratio:1.5;"></a></li>
            <li><a href="#" uk-icon="icon: cart; ratio:1.5;"></a></li>
            <li><a href="#" uk-icon="icon: credit-card; ratio:1.5;"></a></li>

        </ul>
    </div>
    <div class="uk-width-expand@m">
        <ul id="component-tab-left" class="uk-switcher">
            <li>
                <div class="uk-container uk-width-1-1@s uk-margin-small uk-paddin-small" uk-grid>
                    <div class="uk-width-1-3@s">

                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                            <div class="uk-card-header">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <img class="uk-border-circle" width="70" height="70"
                                            src="<?php echo $profileImage ?>">
                                    </div>
                                    <div class="uk-width-expand">
                                        <h3
                                            class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">
                                            <?php echo $_SESSION['usuario']['email'] ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">
                                    Miembro desde :
                                    <?php echo date_format($date, 'l jS F Y') ?></h3>
                                <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">
                                    Nombre:
                                    <?php echo $_SESSION['usuario']['name'] ?></h3>
                                <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">
                                    Tipo de Miembro:
                                    <?php echo $_SESSION['usuario']['member_type'] ?></h3>
                            </div>
                            <div class="uk-card-footer">
                                <form action="">
                                    <button class="uk-button uk-button-text" type="button" name="editar">Editar
                                        Perfil</button>
                                </form>
                                <a class="uk-button uk-button-text"
                                    href="http://localhost/biblioteca/bd/bd_logout.php">Cerrar sesion</a>
                                <!-- <a class="uk-button uk-button-text" href="https://remotehost.es/student33/dwes/bd/bd_logout.php">Cerrar sesion</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-expand@s">
                        <nav class="uk-navbar-container" uk-navbar>
                            <div class="uk-navbar-left">
                                <div class="uk-navbar-item">
                                    <form class="uk-search uk-search-navbar">
                                        <span uk-search-icon></span>
                                        <input class="uk-search-input" type="search" placeholder="Search"
                                            name='search-book' id="search-book">
                                    </form>
                                </div>
                            </div>
                        </nav>
                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                            <table class="uk-table">
                                <caption>Resultados Busqueda</caption>
                                <thead>
                                    <tr>
                                        <th>Portada</th>
                                        <th>Titulo</th>
                                        <th>Autor</th>
                                        <th>Precio</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody id='container-libros'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
            <li>Reservas</li>
            <li>Carrito</li>
            <li>Pedidos</li>
        </ul>
</main>
<?php
include '../footer.php'
?>