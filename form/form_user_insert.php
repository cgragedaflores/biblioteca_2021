<?php  include '../header.php'?>
<main class='uk-width-1-1 uk-padding-small' uk-grid>
    <div class="uk-flex uk-margin uk-text-center uk-width-1-1">
        <div class="uk-margin-auto uk-margin-auto-vertical uk-width-1-2@s uk-card uk-card-default uk-card-body">
            <form class="uk-padding uk-width-1-1@s" action="http://localhost/biblioteca/bd/bd_user_insert.php" method="POST">
                <fieldset class="uk-fieldset uk-grid-small" uk-grid>
                    <legend class="uk-legend">Registrarse</legend>
                    <div class="uk-margin uk-width-1-2@s">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: mail;"></span>
                            <input class="uk-input" type="email" placeholder="email" name="u_email">
                        </div>
                    </div>
                    <div class="uk-margin uk-width-1-2@s">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock;"></span>
                            <input class="uk-input" type="password" placeholder="password" name="u_passwd" maxlength="14">
                        </div>
                    </div>
                    <div class="uk-margin uk-width-1-2@s">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user;"></span>
                            <input class="uk-input" type="text" placeholder="Name" name="u_name">
                        </div>
                    </div>
                    <div class="uk-margin uk-width-1-2@s">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user;"></span>
                            <input class="uk-input" type="text" placeholder="nif" name="u_nif">
                        </div>
                    </div>

                </fieldset>
                <div class="uk-margin">
                    <button class="uk-button uk-button-text" name="u_register">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
    include '../footer.php'
?>