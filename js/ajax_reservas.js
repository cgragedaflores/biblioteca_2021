$(document).ready(function () {
    console.log('jquery reservas is working');
    let edicion = false;
    fetchReserva();
    deleteItem();
    function fetchReserva() {
        let uid = $('#user').val();
        $.ajax({
            url: getUrl() + 'bd/bd_reserve_select.php',
            type: 'POST',
            data: { uid },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                let items = response;
                let template = '';
                if (items[0].memberType === 'partner') {
                    items.forEach(item => {
                        template += `
                            <tr idReserva ='${item.idReserva}'>
                                <td>${item.emailUsuario}</td>
                                <td>${item.tituloLibro}</td>
                                <td>${item.fechaInicio}</td>
                                <td>${item.fechaFin}</td>
                                <td>${item.fechaReal}</td>
                            </tr>
                        `;
                    });
                } else {
                    items.forEach(item => {
                        template += `
                        <tr idReserva ='${item.idReserva}'>
                            <td><a class="uk-button uk-button-text reserve_item">${item.emailUsuario}</a></td>
                            <td>${item.tituloLibro}</td>
                            <td>${item.fechaInicio}</td>
                            <td>${item.fechaFin}</td>
                            <td>${item.fechaReal}</td>
                            <td>
                                <button class='uk-button uk-button-text delete-reserve'>Eliminar</button>
                            </td>
                        </tr>
                    `;
                    });
                }
                $('#container-reserva').html(template);
            },
            fail: function (response) {
                console.log(response);
            }
        });
    }
    function deleteItem() {
        $(document).on('click', '.delete-reserve', function () {
            if (confirm('Desea Eliminar este item')) {
                let item = $(this)[0].parentElement.parentElement;
                let id = $(item).attr('idReserva');
                $.ajax({
                    url: getUrl() + 'bd/bd_reserve_delete.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        fetchReserva();
                    },
                    fail: function (response) {
                        console.log(response);
                    }
                });
            }
        })
    }
    $('#add-reseve-admin').submit((event) => {
        event.preventDefault();
        let data = new FormData();
        let other_data = $('#add-reseve-admin').serializeArray();
        $.each(other_data, function (key, input) {
            data.append(input.name, input.value);
        });
        let url = edicion === false ? getUrl() + 'bd/bd_reserve_insert.php' : getUrl() + 'bd/bd_reserve_update.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                fetchReserva();
                $('#add-reseve-admin').trigger('reset');
            }
        });
    })
    $(document).on('click', '.reserve_item', function () {
        let item = $(this)[0].parentElement.parentElement;
        let id = $(item).attr('idReserva');
        $.ajax({
            url: getUrl() + 'bd/bd_reserve_edit.php',
            type: 'POST',
            datatype: 'json',
            data: { id },
            success: function (response) {
                const reserve = JSON.parse(response);
                $('#r_id').val(reserve.idReserva);
                $('#r_uid').val(reserve.idUsuario);
                $('#r_bid').val(reserve.idLibro)
                $('#r_rdevolucion').val(reserve.fechaReal)
                $('#r_devolucion').val(reserve.fechaInicio);
                $('#r_devuelto').val(reserve.fechaFin);
                edicion = true;
                fetchReserva();
            },
            fail: function (response) {
                console.log(response);
            }
        });
    });
    //UPDATE RESERVA
    $('#search-reserve').keyup(function () {
        let url = getUrl() + 'bd/bd_reserve_select.php';
        if ($('#search-reserve').val()) {
            let search = $('#search-reserve').val();
            $.ajax({
                url: url,
                data: { search },
                type: 'POST',
                datatype: 'json',
                success: function (response) {
                    let template = '';
                    response.forEach(item => {
                        template += `
                        <tr idReserva ='${item.idReserva}'>
                            <td><a class="uk-button uk-button-text reserve_item">${item.emailUsuario}</a></td>
                            <td>${item.tituloLibro}</td>
                            <td>${item.fechaInicio}</td>
                            <td>${item.fechaFin}</td>
                            <td>${item.fechaReal}</td>
                            <td>
                                <button class='uk-button uk-button-text delete-reserve'>Eliminar</button>
                            </td>
                        </tr>
                    `;
                    });
                    $('#container-reserva').html(template);
                }
            })
        }
    });
    $(document).on('click', '.reserve_btn', function () {
        let item = $(this)[0].parentElement.parentElement;
        let id = $(item).attr('idLibro');
        $(document).on('click', '.addReserve', function () {
            let data = new FormData();
            let uid = $('#user').val();
            data.append('r_uid', uid);
            data.append('r_bid', id);
            data.append('r_rdevolucion', null);
            let other_data = $('#add-reserve-partner').serializeArray();
            $.each(other_data, function (key, input) {
                data.append(input.name, input.value);
            });
            $.ajax({
                url: getUrl() + 'bd/bd_reserve_insert.php',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    console.log(response);
                },
                fail: function (response) {
                    console.log(response);
                }
            });
        });
    })
    $(document).on('click','.reserve_btn_guest',function(){
        let context = this;
        crearAlert('Registrate primero <a href="'+getUrl()+'form/form_user_insert.php'+'">Aqui</a>',context);
    });
    function crearAlert(messege, context) {
        let alert = UIkit.notification({
            message: messege,
            status: 'success',
            pos: 'top-center',
            timeout: 1000
        });
        $(context).append(alert);
    }
    function getUrl() {
        return "http://localhost/bibliotecalocal/"
    }
    // function getUrl() {
    //     return "https://remotehost.es/student33/dwes/"
    // }
})