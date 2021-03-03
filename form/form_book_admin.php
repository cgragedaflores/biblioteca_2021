<?php
include '../admin/header.php';
session_start();
if ($_SESSION['usuario']['member_type'] === 'admin') {
?>
<main class='uk-width-1-1@s uk-padding-small uk-margin-remove' uk-grid>
    <div class="uk-width-1-3@s">
        <form class="uk-grid-small" uk-grid action="../bd/bd_book_insert.php" method="POST">
            <div class="uk-width-1-1">
                <input class="uk-input" type="text" name="b_title" placeholder="Titulo">
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input" type="text" name="b_isbn" placeholder="ISBN">
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="text" placeholder="" name="b_author" placeholder="Autor">
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="text" placeholder="" name="b_editorial" placeholder="Editorial">
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="date" placeholder="" name="b_pDate">
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="number" placeholder="" name="b_Location" placeholder="Estanteria">
            </div>
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