<?php
include '../admin/header.php';
session_start();
if ($_SESSION['usuario']['member_type'] === 'admin') {
    ?>
<main class='uk-width-1-1@s uk-padding-small uk-margin-remove' uk-grid>
    <div class="uk-width-1-3@s">
        <form class="uk-grid-small" uk-grid  method="POST" id='add-book-admin' enctype="multipart/form-data">
            <fieldset class="uk-fieldset" uk-grid>
                <legend class="uk-legend uk-text-center">Agregar Libro</legend>
                <div class="uk-margin uk-align-center" id='preview' name='preview'>
                    <img src="" alt="" uk-image id='front-page' name='front-page'>
                </div>
                <div class="uk-width-1-1 ">
                    <input class="uk-input" type="text" name="b_title" placeholder="Titulo" id="b_title">
                </div>
                <div class="uk-width-1-1 uk-margin-small">
                    <input class="uk-input" type="text" name="b_isbn" placeholder="ISBN" id="b_isbn">
                </div>
                <div class="uk-width-1-2@s uk-margin-small">
                    <input class="uk-input" type="text" name="b_author" placeholder="Autor" id="b_autor">
                </div>
                <div class="uk-width-1-2@s uk-margin-small">
                    <input class="uk-input" type="text" name="b_editorial" placeholder="Editorial" id="b_editorial">
                </div>
                <div class="uk-width-1-2@s uk-margin-small">
                    <input class="uk-input" type="date" placeholder="" name="b_pDate" id="b_pDate">
                </div>
                <div class="uk-width-1-2@s uk-margin-small">
                    <input class="uk-input" type="number" placeholder="Estanteria" name="b_Location" id="b_Location">
                </div>
                <div class="js-upload uk-margin-small uk-align-left" uk-form-custom>
                    <input type="file" multiple id='book_file' name="book_file">
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Subir Portada</button>
                </div>
            </fieldset>
            <button class="uk-button uk-button-text uk-align-center" name='addBook'>Agregar Libro</button>
        </form>
    </div>
    <div class="uk-width-expand@s">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <div class="uk-navbar-item">
                    <form class="uk-search uk-search-navbar">
                        <span uk-search-icon></span>
                        <input class="uk-search-input" type="search" placeholder="Search" name='search' id="search">
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
                <tbody id='container'>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
}
include '../footer.php';
?>