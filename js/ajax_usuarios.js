$(document).ready(function () {
    //comprueba si se esta editando
    let edicion = false;
    previewImage();
    fetchUser();
    //encargado de listar los elementos
    function fetchUser() {
        let url = getUrl() + 'bd/bd_user_select.php';
        $.ajax({
            url: url,
            type: 'POST',
            datatype: 'json',
            success: function (response) {
                let template = '';
                let usuarios = JSON.parse(response);
                let imagen = '';
                usuarios.forEach(usuarios => {
                    if (usuarios.imagen === null || usuarios.imagen === '') {
                        usuarios.imagen = getUrl() + 'img/user.png';
                        imagen = usuarios.imagen;
                    } else {
                        imagen = getUrl() + 'img/profile_img/' + usuarios.imagen;
                    }
                    template += `
                            <tr uid ='${usuarios.uid}'>
                                <td><img class="uk-preserve-width uk-border-circle" src="${imagen}" width="70" alt=""></td>
                                <td><a href='#' class='uk-button uk-button-text user_item'>${usuarios.nombre}</td>
                                <td>${usuarios.email}</td>
                                <td>${usuarios.tipoMiembro}</td>
                                <td>${usuarios.fechaRegistro}</td>
                                <td>
                                    <button class='uk-button uk-button-secondary delete_user_btn' uk-icon='icon:trash'></button>
                                </td>
                            </tr>`;
                });
                $('#container-user').html(template);
            }
        });
    }
    //AJAX DELETE LIBROS;
    $(document).on('click', '.delete_user_btn', function () {
        if (confirm('Desea Eliminar este Usuario')) {
            let item = $(this)[0].parentElement.parentElement;
            let id = $(item).attr('uid');
            $.ajax({
                url: getUrl() + 'bd/bd_user_delete.php',
                type: 'POST',
                data: { id },
                success: function (response) {
                    fetchUser();
                }
            });
        }
    })
    // AJAX INSERT Usuarios
    $('#add-user-admin').submit(event => {
        event.preventDefault();
        let data = new FormData();
        let file = $('#user_file')[0].files[0];
        data.append('picture', file);
        let other_data = $('#add-user-admin').serializeArray();
        $.each(other_data, function (key, input) {
            data.append(input.name, input.value);
        });
        let url = edicion === false ? getUrl() + 'bd/bd_user_insert.php' : getUrl() + 'bd/bd_user_update.php';
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                fetchUser();
                $('#add-user-admin').trigger('reset');
            },
            fail: function (response) {
                console.log(response);
            }
        })
    });
    //ajax update User
    $(document).on('click', '.user_item', function () {
        let item = $(this)[0].parentElement.parentElement;
        let id = $(item).attr('uid');
        $.ajax({
            url: getUrl() + 'bd/bd_user_edit.php',
            type: 'POST',
            datatype: 'json',
            data: { id },
            success: function (response) {
                console.log(response);
                let user = response;
                let picture = '';
                if (user.profile === null || user.profile === '') {
                    user.profile = getUrl() + "img/user.png"
                    picture = user.profile;
                } else {
                    picture = getUrl()+"img/profile_img/"+user.profile;
                }
                $('#user-page').attr('src', picture);
                $('#u_id').val(user.id_usuario);
                $('#u_nombre').val(user.nombre);
                $('#u_email').val(user.email);
                $('#u_apellido').val(user.apellido);
                $('#u_nif').val(user.dni);
                $('#u_telefono').val(user.tel);
                edicion = true;
                fetchUser();
            },
            fail: function (response) {
                console.log(response);
            }
        });
    })
    $('#search-user').keyup(function () {
        let url = getUrl() + 'bd/bd_user_select.php';
        if ($('#search-user').val()) {
            let search = $('#search-user').val();
            $.ajax({
                url: url,
                data: { search },
                type: 'POST',
                success: function (response) {
                    let template = '';
                    let usuarios = JSON.parse(response);
                    let imagen = '';
                    usuarios.forEach(usuarios => {
                        if (usuarios.imagen === null || usuarios.imagen === '') {
                            usuarios.imagen = getUrl() + 'img/user.png';
                            imagen = usuarios.imagen;
                        } else {
                            imagen = getUrl() + 'img/profile_Images' + usuarios.imagen;
                        }
                        template += `
                            <tr uid ='${usuarios.uid}'>
                                <td><img class="uk-preserve-width uk-border-circle" src="${imagen}" width="70" alt=""></td>
                                <td><a href='#' class='uk-button uk-button-text user_item'>${usuarios.nombre}</td>
                                <td>${usuarios.email}</td>
                                <td>${usuarios.tipoMiembro}</td>
                                <td>${usuarios.fechaRegistro}</td>
                                <td>
                                    <button class='uk-button uk-button-secondary delete-user-btn' uk-icon='icon:trash'></button>
                                </td>
                            </tr>`;
                    });
                    $('#container-user').html(template);
                }
            })
        }
    });
    //preview image
    function previewImage() {
        const inputFile = document.getElementById('user_file');
        const previewImage = document.getElementById('user-page');
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
    function getUrl() {
        return "http://localhost/bibliotecalocal/"
    }
    // function getUrl() {
    //     return "https://remotehost.es/student33/dwes/";
    // }
});