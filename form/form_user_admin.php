<?php
include '../admin/header.php';
session_start();
if ($_SESSION['usuario']['member_type'] === 'admin') {?>
<main class='uk-width-1-1@s uk-padding-small uk-margin-remove' uk-grid>
    <div class="uk-width-1-3@s">
        <form class="uk-grid-small" uk-grid  method="POST" id='add-user-admin' enctype="multipart/form-data">
            <fieldset class="uk-fieldset" uk-grid>
                <input type="hidden" value="" id='u_id' name='u_id'>;
                <legend class="uk-legend uk-text-center">Usuarios</legend>
                <div class="uk-margin uk-align-center" id='preview' name='preview'>
                    <img class='uk-preserve-width uk-border-circle' src="" alt="" uk-image id='user-page' name='user-page' width="120">
                </div>
                <div class="uk-width-1-1@s">
                    <input class="uk-input" type="text" name="u_nombre" placeholder="Nombre" id="u_nombre" value="">
                </div>
                <div class="uk-width-1-1 uk-margin-small">
                    <input class="uk-input" type="email" name="u_email" placeholder="email" id="u_email" value="">
                </div>
                <div class="uk-width-1-2@s uk-margin-small">
                    <input class="uk-input" type="text" name="u_apellido" placeholder="Apellido" id="u_apellido" value="">
                </div>
                <div class="uk-width-1-2@s uk-margin-small">
                    <input class="uk-input" type="text" name="u_nif" placeholder="NIF" id="u_nif" value="">
                </div>
                <div class="uk-width-1-1@s uk-margin-small">
                    <input class="uk-input" type="tel" name="u_telefono" placeholder="Telfono" id="u_telefono" value="">
                </div>
                <div class="js-upload uk-margin-small uk-align-left" uk-form-custom>
                    <input type="file" multiple id='user_file' name="user_file">
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Subir Foto</button>
                </div>
            </fieldset>
            <button class="uk-button uk-button-text uk-align-center user_item" name=''>Agregar Usuario</button>
        </form>
    </div>
    <div class="uk-width-expand@s">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <div class="uk-navbar-item">
                    <form class="uk-search uk-search-navbar">
                        <span uk-search-icon></span>
                        <input class="uk-search-input" type="search" placeholder="Search" name='search-user' id="search-user">
                    </form>
                </div>
            </div>
        </nav>
        <div class="uk-card uk-card-default uk-card-body uk-margin">
            <table class="uk-table">
                <caption>Resultados Busqueda</caption>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>email<th
                        <th>Tipo Miembro</th>
                        <th>Fecha Registro</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody id='container-user'>
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- <script src="https://remotehost.es/student33/dwes/js/ajax_usuarios.js"></script> -->
<script src="http://localhost/bibliotecalocal/js/ajax_usuarios.js"></script>
<?php
}else{
    header('Location: ../index.php');
}
include '../footer.php';
?>