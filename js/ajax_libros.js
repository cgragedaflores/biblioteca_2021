$(document).ready(function () {
    //comprueba si se esta editando
    console.log('jquery book is working');
    let edicion = false;
    previewImage();
    fetchBook();
    // AJAX INSERT LIBROS
    $('#add-book-admin').submit(event => {
        event.preventDefault();
        let data = new FormData();
        let file = $('#book_file')[0].files[0];
        data.append('portada', file);
        let other_data = $('#add-book-admin').serializeArray();
        $.each(other_data, function (key, input) {
            data.append(input.name, input.value);
        });
        let url = edicion === false ? getUrl() + 'bd/bd_book_insert.php' : getUrl() + 'bd/bd_book_update.php';
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                fetchBook();
                $('#add-book-admin').trigger('reset');
            },
            fail: function (response) {
                console.log(response);
            }
        })
    });

    //AJAX UPDATE BOOK
    $(document).on('click', '.book_item', function () {
        let item = $(this)[0].parentElement.parentElement;
        let id = $(item).attr('idLibro');
        $.ajax({
            url: getUrl() + 'bd/bd_book_edit.php',
            type: 'POST',
            data: { id },
            success: function (response) {
                const book = JSON.parse(response);
                $('#front-page').attr('src', getUrl() + 'img/' + book.portada);
                $('#b_id').val(book.idLibro);
                $('#b_title').val(book.titulo)
                $('#b_isbn').val(book.isbn)
                $('#b_autor').val(book.autor);
                $('#b_editorial').val(book.editorial);
                $('#b_pDate').val(book.fechaP);
                $('#b_Location').val(book.location);
                $('#b_precio').val(book.precio);
                edicion = true;
                fetchBook();
            },
            fail: function (response) {
                console.log(response);
            }
        });
    })
    $('#search-book').keyup(function () {
        let dom = $(this);
        let url = getUrl() + 'bd/bd_book_select.php';
        if ($('#search-book').val()) {
            let search = $('#search-book').val();
            $.ajax({
                url: url,
                data: { search },
                type: 'POST',
                datatype: 'json',
                success: function (response) {
                    let portada = '';
                    let template = '';
                    if (response.fail === true) {
                        crearAlert('No se encontraron resultados', dom);
                    } else {
                        let books = response;
                        books.forEach(book => {
                            if (book.portada === null || book.portada === '') {
                                book.portada = getUrl() + 'img/splatterbook.svg';
                                portada = book.portada;
                            } else {
                                portada = getUrl() + 'img/front_page/' + book.portada;
                            }
                            if (book.tipoMiembro === 'admin') {
                                template += `
                            <tr idLibro ='${book.idLibro}'>
                                <td><img class="uk-preserve-width uk-border-circle" src="${portada}" width="70" alt=""></td>
                                <td><a href='#' class='uk-button uk-button-text book_item'>${book.titulo}</td>
                                <td>${book.autor}</td>
                                <td>${book.precio}</td>
                                <td>
                                    <button class='uk-button uk-button-secondary delete-book' uk-icon='icon:trash'></button>
                                </td>
                            </tr>`;
                            } else if (book.tipoMiembro === 'partner') {
                                template += `
                            <tr idLibro ='${book.idLibro}'>
                                <td><img class="uk-preserve-width uk-border-circle" src="${portada}" width="70" alt=""></td>
                                <td>${book.titulo}</td>
                                <td>${book.autor}</td>
                                <td>${book.precio}</td>
                                <td>
                                    <button class='uk-button uk-button-secondary reserve_btn' uk-icon='icon:file' uk-toggle="target: #modal-example"></button>
                                    <button class='uk-button uk-button-secondary add-book-car' uk-icon='icon:cart'></button>
                                </td>
                            </tr>`;
                            } else if (book.tipoMiembro === 'guest') {
                                template += `
                            <tr idLibro ='${book.idLibro}'>
                                <td><img class="uk-preserve-width uk-border-circle" src="${portada}" width="70" alt=""></td>
                                <td>${book.titulo}</td>
                                <td>${book.autor}</td>
                                <td>${book.precio}</td>
                                <td>
                                    <button class='uk-button uk-button-secondary reserve_btn_guest'></button>
                                    <button class='uk-button uk-button-secondary add-book-car' uk-icon='icon:cart'></button>
                                </td>
                            </tr>`;
                            }
                        });
                    }
                    $('#container-libros').html(template);
                }
            })
        }
    });
    function fetchBook() {
        let dom = $(this);
        let url = getUrl() + 'bd/bd_book_select.php';
        $.ajax({
            url: url,
            type: 'POST',
            datatype: 'json',
            success: function (response) {
                console.log(response);
                let portada = '';
                let template = '';
                if (response.fail === true) {
                    crearAlert('No se encontraron resultados', dom);
                } else {
                    let books = response;
                    books.forEach(book => {
                        if (book.portada === null || book.portada === '') {
                            book.portada = getUrl() + 'img/splatterbook.svg';
                            portada = book.portada;
                        } else {
                            portada = getUrl() + 'img/front_page/' + book.portada;
                        }
                        if (book.tipoMiembro === 'admin') {
                            template += `
                        <tr idLibro ='${book.idLibro}'>
                            <td><img class="uk-preserve-width uk-border-circle" src="${portada}" width="70" alt=""></td>
                            <td><a href='#' class='uk-button uk-button-text book_item'>${book.titulo}</td>
                            <td>${book.autor}</td>
                            <td>${book.precio}</td>
                            <td>
                                <button class='uk-button uk-button-secondary delete-book' uk-icon='icon:trash'></button>
                            </td>
                        </tr>`;
                        } else if (book.tipoMiembro === 'partner') {
                            template += `
                        <tr idLibro ='${book.idLibro}'>
                            <td><img class="uk-preserve-width uk-border-circle" src="${portada}" width="70" alt=""></td>
                            <td>${book.titulo}</td>
                            <td>${book.autor}</td>
                            <td>${book.precio}</td>
                            <td>
                                <button class='uk-button uk-button-secondary reserve_btn' uk-icon='icon:file' uk-toggle="target: #modal-example"></button>
                                <button class='uk-button uk-button-secondary add-book-car' uk-icon='icon:cart'></button>
                            </td>
                        </tr>`;
                        } else if (book.tipoMiembro === 'guest') {
                            template += `
                        <tr idLibro ='${book.idLibro}'>
                            <td><img class="uk-preserve-width uk-border-circle" src="${portada}" width="70" alt=""></td>
                            <td>${book.titulo}</td>
                            <td>${book.autor}</td>
                            <td>${book.precio}</td>
                            <td>
                                <button class='uk-button uk-button-secondary reserve_btn_guest' uk-icon='icon:file'></button>
                                <button class='uk-button uk-button-secondary add-book-car' uk-icon='icon:cart'></button>
                            </td>
                        </tr>`;
                        }
                    });
                }
                $('#container-libros').html(template);
            }
        });
    }
    //AJAX DELETE LIBROS;
    $(document).on('click', '.delete-book', function () {
        if (confirm('Desea Eliminar este item')) {
            let item = $(this)[0].parentElement.parentElement;
            let id = $(item).attr('idLibro');
            $.ajax({
                url: getUrl() + 'bd/bd_book_delete.php',
                type: 'POST',
                data: { id },
                success: function (response) {
                    fetchBook();
                },
                fail: function (response) {
                    console.log(response);
                }
            });
        }
    })
    //preview image
    function previewImage() {
        const inputFile = document.getElementById('book_file');
        const previewImage = document.getElementById('front-page');
        if (inputFile != null) {
            inputFile.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function () {
                        previewImage.setAttribute('src', this.result);
                    });
                    previewImage.setAttribute('width', '150');
                    previewImage.setAttribute('height', '150');
                    reader.readAsDataURL(file);
                }
            });
        }
    }
    // function getUrl() {
    //     return "http://localhost/biblioteca/"
    // }
    function getUrl() {
        return "https://remotehost.es/student33/dwes/"
    }
    function crearAlert(messege, context) {
        let alert = UIkit.notification({
            message: messege,
            status: 'success',
            pos: 'top-center',
            timeout: 1000
        });
        $(context).append(alert);
    }
});