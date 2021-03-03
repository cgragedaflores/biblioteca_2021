<?php  include 'header.php';
?>

<main class='uk-width-1-1@s uk-padding-small uk-margin-remove' uk-grid>
    <div class="uk-width-1-3@s">
        <div class="uk-card uk-card-default uk-card-body uk-margin">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="70" height="70" src="images/avatar.jpg">
                    </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">30.5 C</h3>
                        <input class="uk-input uk-form-blank uk-form-width-medium uk-text-large" type="text" id='time'
                            readonly='true'>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <p>Parcialmente Nublado</p>
            </div>
            <div class="uk-card-footer">
                <a href="https://developer.accuweather.com" class="uk-button uk-button-text">Powered by accuweather</a>
            </div>
        </div>
        <div class="uk-card uk-card-default uk-card-body uk-margin">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="70" height="70" src="images/avatar.jpg">
                    </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">30.5 C</h3>
                        <input class="uk-input uk-form-blank uk-form-width-medium uk-text-large" type="text" id='time'
                            readonly='true'>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <p>Parcialmente Nublado</p>
            </div>
            <div class="uk-card-footer">
                <form action="">
                    <input type="hidden">
                    <button class="uk-button uk-button-text" type="button" name="editar">Editar Perfil</button>
                    <button class="uk-button uk-button-text" type="button" name="cerrar">Cerrar Cession</button>
                </form>
            </div>
        </div>
    </div>
    <div class="uk-width-expand@s">
        <div class="uk-card uk-card-default uk-card-body uk-margin">Include Libros</div>
        <div class="uk-card uk-card-default uk-card-body uk-margin">Include Reservas</div>
        <div class="uk-card uk-card-default uk-card-body uk-margin">Include Usuario</div>
        <div class="uk-card uk-card-default uk-card-body uk-margin">Include Pedidos</div>
    </div>
</main>
<?php
    include '../footer.php'
?>