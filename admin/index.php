<?php  include 'header.php';
    session_start();
?>
<main class='uk-width-1-1@s uk-padding-small uk-margin-remove' uk-grid>
    <div class="uk-width-1-3@s">
        <!-- CARTA TIEMPO -->
        <div class="uk-card uk-card-default uk-card-body uk-margin">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="70" height="70" id='icon-admin'>
                    </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom" id='temp-admin'></h3>
                        <input class="uk-input uk-form-blank uk-form-width-medium uk-text-large" type="text" id='time'
                            readonly='true'>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">Mahon</h3>
                <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top" id='temp-text'>
                </h3>
            </div>
            <div class="uk-card-footer">
                <a href="https://developer.accuweather.com" class="uk-button uk-button-text">Powered by accuweather</a>
            </div>
        </div>
    </div>
           <!-- CARTA USUARIO -->
    <div class="uk-width-expand@s">
        <?php
            $profileImage = "http://localhost/biblioteca/img/profile_Images".$_SESSION['usuario']['picture'];
            if(isset($profileImage)){
                $profileImage = "http://localhost/biblioteca/img/user.png";
            }
            //trata fecha
            $date = date_create($_SESSION['usuario']['joined_on']);
        ?>
        <div class="uk-card uk-card-default uk-card-body uk-margin">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="70" height="70" src="<?php echo $profileImage?>">
                    </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">
                            <?php echo $_SESSION['usuario']['email']?></h3>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">Miembro desde :
                    <?php echo date_format($date,'l jS F Y')?></h3>
                <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">Nombre:
                    <?php echo $_SESSION['usuario']['name']?></h3>
                <h3 class="uk-text-meta uk-text-uppercase uk-margin-remove-bottom uk-margin-remove-top">Tipo de Miembro:
                    <?php echo $_SESSION['usuario']['member_type']?></h3>
            </div>
            <div class="uk-card-footer">
                <form action="">
                    <button class="uk-button uk-button-text" type="button" name="editar">Editar Perfil</button>
                </form>
                <a class="uk-button uk-button-text" href="http://localhost/biblioteca/bd/bd_logout.php">Cerrar
                    sesion</a>
            </div>
        </div>

    </div>
</main>
<?php
    include '../footer.php'
?>