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
            success: function (response) {
                $('#container-user').html(response);
            }
        });
    }
    //AJAX DELETE LIBROS;
    $(document).on('click', '.delete-user-btn', function () {
        console.log('click');
        if (confirm('Desea Eliminar este Usuario')) {
            let item = $(this)[0].parentElement.parentElement;
            let id = $(item).attr('idUsuario');
            $.ajax({
                url: getUrl() + 'bd/bd_user_delete.php',
                type: 'POST',
                data: { id },
                success: function (response) {
                    console.log(response);
                    fetchUser();
                },
                fail: function (response) {
                    console.log(response);
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
                $('#add-user-admin').trigger('reset');
                fetchUser();
            },
            fail: function (response) {
                console.log(response);
            }
        })
    });
    //ajax update User
    $(document).on('click', '.user_item', function () {
        let item = $(this)[0].parentElement.parentElement;
        let id = $(item).attr('idUsuario');
        $.ajax({
            url: getUrl() + 'bd/bd_user_edit.php',
            type: 'POST',
            datatype: 'json',
            data: { id },
            success: function (response) {
                console.log(response);
                let user = JSON.parse(response);
                $('#user-page').attr('src', getUrl() + 'img/' + user.profile);
                $('#u_id').val(user.id_usuario);
                $('#u_nombre').val(user.nombre)
                $('#u_email').val(user.email)
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
        return "http://localhost/biblioteca/"
    }
});