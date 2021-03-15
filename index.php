<?php include 'header.php';
?>
<main class='uk-width-1-1@s uk-child-width-1-1@s uk-margin-remove uk-padding-small' uk-grid id='main_container'>
    <div class="uk-child-width-1-1@s" uk-grid>
        <div>
            <div uk-grid>
                <div class="uk-width-auto@m">
                    <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
                        <li><a href="#" uk-icon='icon: file; ratio:1.5;'></a></li>
                        <li><a href="#" uk-icon="icon: cart; ratio:1.5;"></a></li>
                        <li><a href="#" uk-icon="icon: user; ratio:1.5;"></a></li>
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
                                <tbody id='container-libros'>

                                </tbody>
                            </table>
                        </li>
                        <li>
                            <table class="uk-table" id='cart_table'>
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
                            <span id='TotalItems' class="uk-text-lead">Total : </span>
                            <img class='uk-preserve-width uk-border-circle uk-align-center' src="./img/carro.svg" alt=""
                                width="400" id='void_cart' uk-img>
                        </li>
                        <li class="uk-active" id='login'>
                            <div class="uk-flex uk-margin uk-text-center">
                                <div
                                    class="uk-margin-auto uk-margin-auto-vertical uk-width-1-2@s uk-card uk-card-default uk-card-body">
                                    <form class="uk-padding uk-width-1-1@s"
                                        action="http://localhost/bibliotecalocal/bd/bd_login.php" method="POST">
                                        <!-- <form class="uk-padding uk-width-1-1@s"
                                        action="https://remotehost.es/student33/dwes/bd/bd_login.php" method="POST"> -->
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
                                        <!-- <span>Aun no estas Registrado <a
                                                href="https://remotehost.es/student33/dwes/form/form_user_insert.php">Registrate
                                                aqui</a></span> -->
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-margin" id='top'>
                                <div class='uk-width-1-1@s uk-padding-small uk-margin-remove' uk-grid>
                                    <div class="uk-width-1-3@s uk-padding-remove">
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <ul class="uk-nav-primary uk-nav-parent-icon" uk-nav>
                                                <li class="uk-active"><a href="#">Documentacion</a></li>
                                                <li class="uk-parent">
                                                    <a href="#"><span class="uk-margin-small-right"
                                                            uk-icon="icon: question"></span>Manual Tecnico</a>
                                                    <ul class="uk-nav-sub">
                                                        <li>
                                                            <a href="#software">
                                                                <span class="uk-margin-small-right"
                                                                    uk-icon="icon: nut"></span>
                                                                Requerimientos de software</a>

                                                        </li>
                                                        <li>
                                                            <a href="#file">
                                                                <span class="uk-margin-small-right"
                                                                    uk-icon="icon: cog"></span>
                                                                Estructura de Archivos</a>

                                                        </li>
                                                        <li>
                                                            <a href="#bd"><span class="uk-margin-small-right"
                                                                    uk-icon="icon: database"></span>Base de datos</a>
                                                        </li>
                                                        <li>
                                                            <a href="#forms">
                                                                <span class="uk-margin-small-right"
                                                                    uk-icon="icon: file-edit"></span>
                                                                Formularios</a>
                                                        </li>
                                                        <li>
                                                            <a href="#usuarios">
                                                                <span class="uk-margin-small-right"
                                                                    uk-icon="icon: user"></span>
                                                                Registro Usuarios</a>
                                                        </li>
                                                        <li>
                                                            <a href="#reservas">
                                                                <span class="uk-margin-small-right"
                                                                    uk-icon="icon: bookmark"></span>
                                                                Reservas</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                        </div>
                                    </div>
                                    <div class="uk-width-expand@s">
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <article class="uk-article">
                                                <h1 class="uk-article-title" id='software'><a class="uk-link-reset"
                                                        href="#">Requerimientos de Sofware</a></h1>
                                                <p class="uk-article-meta">Escrito Por <a href="#">desarollador</a> el
                                                    07
                                                    Marzo 2021</p>
                                                <p class="uk-text-lead">Vamos a Explicar que servicios hemos usado, y
                                                    los conocimientos requeridos
                                                    para poder familiarilzarse con el proyecto.</p>
                                                <ul class="uk-list uk-list-divider">
                                                    <li><img class="uk-align-left uk-margin-remove-adjacent uk-padding-remove"
                                                            src="img/snapshots/codigo-php.svg" width="100"
                                                            alt="Example image">
                                                        <p class="uk-text-lead">PHP v8.0.2</p>
                                                        <p>Se utiliza php para comunicarse con el servidor los archivos,
                                                            que devuelven informacion la devuelve en formato JSON que
                                                            despues son tratados con JQuery, si existe algun tipo de
                                                            erro al momento de Enviar o recibir los datos seran
                                                            mostrados por consola.</p>
                                                        <p>Los conocimientos necesarios para poder modificar los
                                                            archivos principalmente son los basicos, tambien
                                                            saber que en caso de devolver algo, hay que usar el metodo
                                                            json_encode($var) para codificar la respuesta en
                                                            formato JSON, despues normalmente se usar el formato
                                                            orientado a objetos de php, si no sabes como functiona
                                                            puedes mirar la documentacion <a
                                                                href="https://www.php.net/manual/es/language.oop5.php">Aqui</a>
                                                        </p>
                                                    </li>
                                                    <li><img class="uk-align-left uk-margin-remove-adjacent uk-padding-remove"
                                                            src="img/snapshots/javascript.svg" width="100"
                                                            alt="Example image">
                                                        <p class="uk-text-lead">JQuery & JavaScript</p>
                                                        <p>Como se ha explicado anteriormente las respuestas las
                                                            devuelven los archivos php, pero quien hace las peticiones a
                                                            estos archivos son los archivos .js
                                                            entonces para agregar dinamismo a la pagina, para cada
                                                            accion se ha integrado AJAX(asynchronous JavaScript and
                                                            XML), es decir se realizan peticiones asincronas al
                                                            servidor, entonces se requiere estar familiarizado con esta
                                                            forma de realizar peticiones, ya que estos archicos son los
                                                            encargados
                                                            de detectar los eventos, de la pagina y realizar las
                                                            peticiones a los archivos php
                                                            y tratar la respuesta proveniente del servidor.
                                                        </p>
                                                    </li>
                                                    <li><img class="uk-align-left uk-margin-remove-adjacent uk-padding-remove"
                                                            src="img/snapshots/archivo-json.svg" width="100"
                                                            alt="Example image">
                                                        <p class="uk-text-lead">Json</p>
                                                        <p>Es importante saber como codificar las respuestas del
                                                            servidor Base de datos en php , y descodificarla con php
                                                            ya que las peticiones son asyncronas cualquiero respuesta
                                                            por parte del archivo php que no este codificado en JSON
                                                            provocara un fallo. <a href="#">Solucion aqui</a>
                                                        </p>
                                                    </li>
                                                    <li><img class="uk-align-left uk-margin-remove-adjacent"
                                                            src="img/snapshots/base-de-datos.svg" width="100"
                                                            height="100" alt="Example image">
                                                        <p class="uk-text-lead">SQL</p>
                                                        <p>Los archivos PHP son los encargados de comunicarse con el
                                                            servidor de Base de datos, entonces
                                                            es necesario saber lo basico del lenguaje SQL (Structured
                                                            Query Lenguage), o Lenguaje de Consulta Estructurado
                                                            estas operaciones basicas seria
                                                            (SELECT,UPDATE,DELETE,INSERT).
                                                        </p>
                                                    </li>
                                                </ul>
                                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                                    <div>
                                                        <a class="uk-button uk-button-text" href="#top" uk-scroll>Volver al
                                                            Inicio</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <article class="uk-article">
                                                <h1 class="uk-article-title" id="file"><a class="uk-link-reset"
                                                        href="">Estructura
                                                        de Archivos</a></h1>
                                                <p class="uk-article-meta">Escrito Por <a href="#">desarollador</a> el
                                                    07
                                                    Marzo 2021</p>
                                                <p class="uk-text-lead">En este apartado se explicara como se
                                                    distribuyen los archivos
                                                    con los que se trabajan.
                                                </p>
                                                <ul class="uk-list uk-list-divider">
                                                    <li><img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/admin.png" width="225" height="150"
                                                            alt="Example image">
                                                        <p>
                                                            En la carpeta de Admin se guardan todos los archivos que
                                                            estan
                                                            relacionados con el usuario adminstrador (se requiere un
                                                            usuario
                                                            autorizado).
                                                        <p>


                                                    </li>
                                                    <li>
                                                        <p>En la carpetade bd se guardan todos los archivos php que
                                                            estan
                                                            encargadas de comunicarse con el servidor, cada archivo
                                                            comienza
                                                            con
                                                            bd_[tipo_elemento]_[accion].php, dentro de los cuales
                                                            podemos
                                                            encontrar CRUD[Create,Read,Update,Delete]</p>

                                                    </li>
                                                    <li>
                                                        <img class="uk-align-center uk-margin-remove-adjacent uk-padding-remove"
                                                            src="img/snapshots/form_files.png" width="225" height="150"
                                                            alt="Example image">
                                                        <p>En la carpeta de Formularios encontramos los Formularios,
                                                            usando
                                                            una nomenclatura similar a los archivos de bd.<br />
                                                            Tambien podemos encontrar unos formularios con diferente
                                                            nombre
                                                            form_[elemento]_[accion]_admin.php, estos formularios
                                                            estan encargados de insertar, actualizar informacion sobre
                                                            su
                                                            elemento correspondiente</p>
                                                    </li>
                                                    <li>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/img_files.png" width="225" height="150"
                                                            alt="Example image">
                                                        <p>En la carpeta de img encontraremos donde se guardaran las
                                                            imagenes que usa
                                                            el proyecto ademas de las portadas de los libros, imagenes
                                                            de perfil de los usuarios,
                                                            los iconos del servicio del tiempo y las capturas de esta
                                                            documentacion.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/img_files.png" width="225" height="150"
                                                            alt="Example image">
                                                        <p>En la carpeta partner encontraremos el layaout de la vista
                                                            del usuario cuando hace login con su cuenta.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/js_files.png" width="225" height="150"
                                                            alt="Example image">
                                                        <p>En la carpeta JS encontramos parte importante de la pagina ya
                                                            que como se explicar en detalle mas adelante en este
                                                            documento, usamos los archivos para php solo para peticiones
                                                            al servidor
                                                            los archivos encargados, de detectar que peticion solicita
                                                            el usuario son los archivos js escritos en Jquery. Ademas
                                                            que tambien se encuentran los scripts encargados de obtener
                                                            el tiempo actual y la hora.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/img_files.png" width="225" height="150"
                                                            alt="Example image">
                                                        <p>En la carpeta partner encontraremos el layaout de la vista
                                                            del usuario cuando hace login con su cuenta.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/img_files.png" width="225" height="150"
                                                            alt="Example image">
                                                        <p>Finalmente nos encontramos con los archivos principales del
                                                            sitio web, que son los nodos raizes de
                                                            los cuales dependen los demas archivos.
                                                        </p>
                                                    </li>
                                                </ul>
                                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                                    <div>
                                                        <a class="uk-button uk-button-text" href="#">Volver al
                                                            Inicio</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <article class="uk-article" id="bd">
                                                <h1 class="uk-article-title"><a class="uk-link-reset" href="">Base de
                                                        Datos</a></h1>
                                                <p class="uk-article-meta">Escrito Por <a href="#">desarollador</a> el
                                                    07
                                                    Marzo 2021</p>
                                                <p class="uk-text-lead">En este apartado explicamos como esta
                                                    distribuida la base de datos.
                                                </p>
                                                <ul class="uk-list uk-list-divider">
                                                    <li><img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/bd_design.png" width="1000"
                                                            alt="Example image">
                                                        <p>
                                                            En la imagen superior podemos ver la distribucion de la base
                                                            de datos
                                                            donde podemos ver las diferentes tablas creadas, entonces
                                                            creamos una estructura
                                                            en la que :
                                                        <p>
                                                        <dl class="uk-description-list">
                                                            <dt>Para crear un nuevo Libro</dt>
                                                            <dd>Para agregar un nuevo libro a la base de datos
                                                                se necesia primero tener un modulo o estanteria donde
                                                                ponerlo,
                                                                si el modulo o estanteria existe, entonces se puede
                                                                agregar el libro
                                                                a esa estanteria utilizando su identificador como
                                                                foreign Key.
                                                            </dd>
                                                            <dt>Para Crear Usuario</dt>
                                                            <dd>El administrador o bibliotecar Puede agregar usuarios
                                                                desde su cuenta
                                                                pero, tambien se pueden registrar mediante un
                                                                formulario, hay en ambos formularios
                                                                se pide informacion basica, pero en la base de datos
                                                                existe varias columnas mas que el propio
                                                                usuario pude rellenar desde su cuenta personal en la
                                                                seccion Mi Perfil.
                                                            </dd>
                                                            <dt>Para Agregar Una Reserva</dt>
                                                            <dd>Solo los usuarios registrados y el administrador pueden
                                                                agregar una reserva, cada uno de estos desde una pagina
                                                                diferente
                                                                y solicitando informacion diferente.</dd>
                                                        </dl>
                                                    </li>
                                                </ul>
                                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                                    <div>
                                                        <a class="uk-button uk-button-text" href="#top" uk-scroll>Volver al
                                                            Inicio</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <article class="uk-article">
                                                <h1 class="uk-article-title" id="forms"><a class="uk-link-reset"
                                                        href="">Formularios</a></h1>
                                                <p class="uk-article-meta">Escrito Por <a href="#">desarollador</a> el
                                                    07
                                                    Marzo 2021</p>
                                                <p class="uk-text-lead">En este Apartado Mostramos los formularios y
                                                    como estan conectados con los archivos JS
                                                </p>
                                                <ul class="uk-list uk-list-divider">
                                                    <li>
                                                        <p class="uk-text-lead">Como se envian los datos?</p>
                                                        <p>Para empezar los datos son capturados, mediante un evento
                                                            entonces cuando se produce
                                                            este evento, se llama al archivo JS correspondiente, que
                                                            contiene un bloque de codigo, que
                                                            esta a la espera que se produzca un evento determinado de un
                                                            elemento determinado veamos un ejemplo:
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p class="uk-text-lead">Vamos a Agregar un Libro al carrito de
                                                            Compras</p>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/ejemplof1.png" width="1000"
                                                            alt="Example image">
                                                        <p>Entonces lo primero que que se realiza es si no esta en la
                                                            pestaña de Libros
                                                            se dirije hacia ella y una vez escogido el libro se pasa
                                                            seleccionar una accion.</p>
                                                    </li>
                                                    <li>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/ejemplof3.png" width="700"
                                                            alt="Example image">
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/ejemplof2.png" width="500"
                                                            alt="Example image">
                                                        <p>Esta accion la detecta un arcivo JS, que busca el elemento
                                                            mediante su clase y mediante Jquery accedemos
                                                            al atributo correspondiente de cada fila que representa un
                                                            libro, entonces cada fila contiene un atributo especial
                                                            que corresponde al id del libro, que es lo que necesitamos
                                                            para agregar el libro correspondiente a la tabla de carrito
                                                            de compras, una vez obtenido el id del libro procedemos a
                                                            realizar la consulta ejecutando el metodo Jquery ajax
                                                            y enviandole una consulta al servidor</p>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/ejemplof4.png" width="800"
                                                            alt="Example image">
                                                        <p>Finalmente obtenemos el resultado y ejecutamos el metodo
                                                            fetchItem(encargado de listar todos los items que esten en
                                                            el carrito de compras) y el resultado seria este.</p>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/ejemplof5.png" width="800"
                                                            alt="Example image">
                                                    </li>
                                                    <li>
                                                        <p class="uk-text-lead">Una vez explicado este sitema, para
                                                            ejecutar las demas consulta o operaciones relacionadas con
                                                            Libros,Usuarios,Reservas
                                                            son las mismas operaciones.
                                                        </p>
                                                        <dl class="uk-description-list">
                                                            <dt>Se produce un evento</dt>
                                                            <dd>En la pagina tratamos normalmente con 3 tipos de
                                                                eventos, aunque el tercero solo se una
                                                                vez(submit,click,change)
                                                                entonces estos eventos seran escuchados y tratados por
                                                                su correspondiente archivo js.
                                                            </dd>
                                                            <dt>JQuery captura el evento</dt>
                                                            <dd>Cuando JQuery captura el evento dentro tiene un bloque
                                                                de codigo,que busca la informacion
                                                                que necesita.
                                                            </dd>
                                                            <dt>Se realiza una peticion ajax</dt>
                                                            <dd>Una vez JQuery obtiene el dato que necesita, pasa a
                                                                realizar una peticion a un archivo php, que se encuentra
                                                                en nuestro servidor, entonces php , recibe la peticion,
                                                                ejecuta una cosulta al servidor SQL, y devuelve una
                                                                respuesta,
                                                                en caso de consultas que no devuelven ningun objeto
                                                                mysql_result, solo devuelve una String en formato JSON ,
                                                                que contiene
                                                                la dos posibles valores. La consulta se ha podido
                                                                ejecutar correctamente o La consulta ha fallado y el
                                                                error. En caso de
                                                                existir un objeto mysql result lo que devuelve es una
                                                                String en formato JSON con los resultados de la
                                                                operacion.
                                                            </dd>
                                                            <img class="uk-align-center uk-margin-remove-adjacent"
                                                                src="img/snapshots/response_json_Success.png"
                                                                width="500" alt="Succes JSON RESPONSE">
                                                            <img class="uk-align-center uk-margin-remove-adjacent"
                                                                src="img/snapshots/response_JSON.png" width="800"
                                                                alt="FAIL JSON RESPONSE">
                                                        </dl>
                                                    </li>
                                                </ul>
                                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                                    <div>
                                                        <a class="uk-button uk-button-text" href="#top" uk-scroll>Volver al
                                                            Inicio</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <article class="uk-article" id='usuarios'>
                                                <h1 class="uk-article-title"><a class="uk-link-reset" href="">Registro
                                                        Usuarios</a></h1>
                                                <p class="uk-article-meta">Escrito Por <a href="#">desarollador</a> el
                                                    07
                                                    Marzo 2021</p>
                                                <p class="uk-text-lead">Aqui vamos a explicar como se pueden registrar
                                                    nuevos socios para nuestra
                                                    biblioteca.
                                                </p>
                                                <ul class="uk-list uk-list-divider">
                                                    <li>
                                                        <p>Primero tenemos dos formularios diferentes que implementan el
                                                            mismo sistema explicado
                                                            anterior mente en <a href="#forms">en este documento</a>,
                                                            entonces primero tenemos</p>
                                                        <p class="uk-text-lead">Formulario Registro Normal</p>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/form_register1.png" width="500"
                                                            alt="Succes JSON RESPONSE">
                                                        <p class="uk-text-lead">Formulario de Registro admin</p>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/form_register2.png" width="800"
                                                            alt="Succes JSON RESPONSE">
                                                        <p>El administrado ademas de poder agregar desde ese formulario
                                                            un nuevo usuario, tambien puede modificar la informacion del
                                                            usuario seleccionado</p>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/form_admin_user.png" width="800"
                                                            alt="Succes JSON RESPONSE">
                                                    </li>
                                                </ul>
                                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                                    <div>
                                                        <a class="uk-button uk-button-text" href="#top" uk-scroll>Volver al
                                                            Inicio</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <article class="uk-article" id='reservas'>
                                                <h1 class="uk-article-title"><a class="uk-link-reset" href="">Registro
                                                        Reservas</a></h1>
                                                <p class="uk-article-meta">Escrito Por <a href="#">desarollador</a> el
                                                    07
                                                    Marzo 2021</p>
                                                <p class="uk-text-lead">Aqui vamos a explicar como se pueden registrar
                                                    nuevass reservas para nuestra
                                                    biblioteca.
                                                </p>
                                                <ul class="uk-list uk-list-divider">
                                                    <li>
                                                        <p>Primero tenemos dos formularios diferentes que implementan el
                                                            mismo sistema explicado
                                                            anterior mente en <a href="#forms">en este documento</a>,
                                                            entonces primero tenemos</p>
                                                        <p class="uk-text-lead">Formulario Reserva Libro Normal</p>
                                                        <!-- <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/form_register1.png" width="500"
                                                            alt="Succes JSON RESPONSE"> -->
                                                        <p class="uk-text-lead">Formulario de Reserva admin</p>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/form_reserve1.png" width="800"
                                                            alt="Succes JSON RESPONSE">
                                                        <p>El administrado ademas de poder agregar desde ese formulario
                                                            una nueva usuario, tambien puede modificar la informacion de
                                                            la
                                                            reserva seleccionada</p>
                                                        <img class="uk-align-center uk-margin-remove-adjacent"
                                                            src="img/snapshots/form_reserve_admin.png" width="800"
                                                            alt="Succes JSON RESPONSE">
                                                    </li>
                                                </ul>
                                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                                    <div>
                                                        <a class="uk-button uk-button-text" href="#top" uk-scroll>Volver al
                                                            Inicio</a>
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