<?php include 'header.php'?>
<main class='uk-width-1-1@s uk-child-width-1-1@s uk-margin-remove uk-padding-small' uk-grid>
    <div class="uk-child-width-1-1@s" uk-grid>
        <div>
            <div uk-grid>
                <div class="uk-width-auto@m">
                    <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
                        <li><a href="#" uk-icon='icon: file; ratio:1.5;'></a></li>
                        <li><a href="#" uk-icon="icon: cart; ratio:1.5;"></a></li>
                        <li><a href="#" uk-icon="icon: user; ratio:1.5;"></a></li>
                        <li><a href="#" uk-icon="icon: world; ratio:1.5;"></a></li>
                        <li><a href="#" uk-icon="icon: file-text; ratio:1.5;"></a></li>

                    </ul>
                </div>
                <div class="uk-width-expand@m">
                    <ul id="component-tab-left" class="uk-switcher">
                        <li>
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
                        </li>
                        <li>
                            <table class="uk-table">
                                <caption>Elementos Carrito</caption>
                                <thead>
                                    <tr>
                                        <th>Portada</th>
                                        <th>Titulo</th>
                                        <th>Autor</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody id='container_carrito'>
                                </tbody>
                            </table>
                            <span>Total : </span>
                        </li>
                        <li class="uk-active">
                            <div class="uk-flex uk-margin uk-text-center">
                                <div
                                    class="uk-margin-auto uk-margin-auto-vertical uk-width-1-2@s uk-card uk-card-default uk-card-body">
                                    <form class="uk-padding uk-width-1-1@s"
                                        action="http://localhost/biblioteca/bd/bd_login.php" method="POST">
                                        <fieldset class="uk-fieldset">
                                            <legend class="uk-legend">Login</legend>
                                            <div class="uk-margin uk-width-1-1@s">
                                                <div class="uk-inline">
                                                    <span class="uk-form-icon" uk-icon="icon: user;"></span>
                                                    <input class="uk-input" type="email" placeholder="email"
                                                        name="u_email">
                                                </div>
                                            </div>
                                            <div class="uk-margin uk-width-1-1@s">
                                                <div class="uk-inline">
                                                    <span class="uk-form-icon" uk-icon="icon: lock;"></span>
                                                    <input class="uk-input" type="password" placeholder="password"
                                                        name="u_password">
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <button class="uk-button uk-button-text" name="login">Login</button>
                                            </div>
                                        </fieldset>
                                        <span>Aun no estas Registrado <a
                                                href="http://localhost/biblioteca/form/form_user_insert.php">Registrate
                                                aqui</a></span>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="uk-flex uk-margin uk-text-center">
                                <div
                                    class="uk-margin-auto uk-margin-auto-vertical uk-width-1-2@s uk-card uk-card-default uk-card-body">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-margin uk-text-center">
                                <div class='uk-width-1-1@s uk-padding-small uk-margin-remove' uk-grid>
                                    <div class="uk-width-1-3@s">
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <div class="uk-card-header">
                                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <img class="uk-border-circle" width="70" height="70"
                                                            src="images/avatar.jpg">
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <h3 class="uk-card-title uk-margin-remove-bottom">Indice</h3>
                                                        <input
                                                            class="uk-input uk-form-blank uk-form-width-medium uk-text-large"
                                                            type="text" id='time' readonly='true'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-card-body">
                                                <p>Parcialmente Nublado</p>
                                            </div>
                                            <div class="uk-card-footer">
                                                <a href="https://developer.accuweather.com"
                                                    class="uk-button uk-button-text">Powered by accuweather</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-expand@s">
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <article class="uk-article">

                                                <h1 class="uk-article-title"><a class="uk-link-reset"
                                                        href="">Heading</a></h1>

                                                <p class="uk-article-meta">Written by <a href="#">Super User</a> on 12
                                                    April 2012. Posted in <a href="#">Blog</a></p>

                                                <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip.</p>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum.</p>

                                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                                    <div>
                                                        <a class="uk-button uk-button-text" href="#">Read more</a>
                                                    </div>
                                                    <div>
                                                        <a class="uk-button uk-button-text" href="#">5 Comments</a>
                                                    </div>
                                                </div>

                                            </article>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</main>
<?php include 'footer.php'?>