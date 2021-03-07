$(document).ready(function () {
    console.log('jquery reservas is working');
    let edicion = false;
    fetchReserva();
    deleteItem();
    function fetchReserva() {
        $.ajax({
            url: getUrl() + 'bd/bd_reserve_select.php',
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                let items = response;
                let template = '';
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
        console.log(url);
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
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
                console.log(reserve);
                $('#r_uid').val(reserve.idUsuario);
                $('#r_bid').val(reserve.idLibro)
                $('#r_rdevolucion').val(reserve.fechaReal)
                $('#r_devolucion').val(reserve.fechaInicio);
                $('#r_devuelto').val(reserve.fechaFin);
                edicion = true;
            },
            fail: function (response) {
                console.log(response);
            }
        });
    });
    function getUrl() {
        return "http://localhost/biblioteca/"
    }
})