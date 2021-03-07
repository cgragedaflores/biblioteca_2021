<?php
include '../admin/header.php';
session_start();
if ($_SESSION['usuario']['member_type'] === 'admin') {?>
<main class='uk-width-1-1@s uk-padding-small uk-margin-remove' uk-grid>
    <div class="uk-width-1-3@s">
        <form class="uk-grid-small" uk-grid method="POST" id='add-reseve-admin' enctype="multipart/form-data">
            <fieldset class="uk-fieldset" uk-grid>
                <input type="hidden" value="" id='r_id' name='r_id'>
                <legend class="uk-legend uk-text-center">Reservas</legend>
                <div class="uk-margin-small uk-width-1-4@s">
                    <label for="r_uid" class="uk-label">Usuario ID</label>
                    <input type="text" value="" name="r_uid" id="r_uid" class="uk-input">
                </div>
                <div class="uk-margin-small uk-width-1-4@s">
                    <label for="r_bid" class="uk-label">Libro ID</label>
                    <input type="text" value="" name="r_bid" id="r_bid" class="uk-input">
                </div>
                <div class="uk-margin-small uk-width-1-2@s">
                    <label for="r_rdevolucion" class="uk-label">Fecha Real Devolucion</label>
                    <input type="date" value="" name="r_rdevolucion" id="r_rdevolucion" class="uk-input">
                </div>
                <div class="uk-margin-small uk-width-1-2@s">
                    <label for="r_devolucion" class="uk-label">Fecha Inicio Reserva</label>
                    <input type="date" value="" name="r_devolucion" id="r_devolucion" class="uk-input">
                </div>
                <div class="uk-margin-small uk-width-1-2@s">
                    <label for="r_devuelto" class="uk-label">Fecha Devolucion</label>
                    <input type="date" value="" name="r_devuelto" id="r_devuelto" class="uk-input">
                </div>
            </fieldset>
            <button class="uk-button uk-button-text uk-align-center" name='addReserva' id="addReserva">Agregar Reserva</button>
        </form>
    </div>
    <div class="uk-width-expand@s">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <div class="uk-navbar-item">
                    <form class="uk-search uk-search-navbar">
                        <span uk-search-icon></span>
                        <input class="uk-search-input" type="search" placeholder="Search" name='search-reserve' id="search-reserve">
                    </form>
                </div>
            </div>
        </nav>
        <div class="uk-card uk-card-default uk-card-body uk-margin">
            <table class="uk-table">
                <caption>Resultados Busqueda</caption>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Libro</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Fecha Devolucion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody id='container-reserva'>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script src="http://localhost/biblioteca/js/ajax_reservas.js"></script>
<?php
}else{
    header('Location: ../index.php');
}
include '../footer.php';
?>