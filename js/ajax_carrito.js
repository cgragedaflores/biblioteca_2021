$(document).ready(function () {
    console.log('jquery is working');
    fetchItems();
    addItem();
    deleteItem();
    updateItem();
    //encargado de listar los elementos
    function fetchItems() {
        $.ajax({
            url: getUrl() + 'bd/bd_carrito_select.php',
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                let totalItems = 0;
                let items = response;
                let template = '';
                items.forEach(item => {
                    template += `
                        <tr idItem ='${item.idLibro}'>
                            <td>
                                <img class="uk-preserve-width uk-border-circle" src="`+ getUrl() + `img/${item.portada}" width="70" alt="">
                            </td>
                            <td>${item.titulo}</td>
                            <td>${item.autor}</td>
                            <td>${item.precio}</td>
                            <td><input class='uk-input actualizar-cantidad' type='number' value='${item.cantidad}' min='1' max='99'></td>
                            <td>${item.subtotal}</td>
                            <td><button class='uk-button uk-button-text delete-book-cart'>Eliminar</td>
                        </tr>
                    `;
                    totalItems = totalItems + parseInt(item.subtotal);

                });
                $('#container_carrito').html(template);
                $('#TotalItems').text('Total Compra \t' + totalItems + '€');
            }
        });
    }
    //encargado de insertar nuevos libros
    function addItem() {
        $(document).on('click', '.add-book-car', function (element) {
            //console.log($(this).data('id'));
            let data = $(this).data('id');
            $.ajax({
                url: getUrl() + 'bd/bd_carrito_insert.php',
                type: 'POST',
                data: { data },
                success: function (response) {
                    fetchItems();
                }
            });
            let alert = UIkit.notification({
                message: 'Libro en el Carrito!!!!',
                status: 'success',
                pos: 'top-center',
                timeout: 5000
            });
            $(this).append((alert));
        })
    }
    function deleteItem() {
        $(document).on('click', '.delete-book-cart', function () {
            if (confirm('Desea Eliminar este item')) {
                let item = $(this)[0].parentElement.parentElement;
                let id = $(item).attr('idItem');
                $.ajax({
                    url: getUrl() + 'bd/bd_carrito_delete.php',
                    type: 'POST',
                    data: { id },
                    success: function (response) {
                        console.log(response);
                        fetchItems();
                    },
                    fail: function (response) {
                        console.log(response);
                    }
                });
            }
        })
    }
    function updateItem() {
        $(document).on('change', '.actualizar-cantidad', function () {
            let item = $(this)[0].parentElement.parentElement;
            let id = $(item).attr('idItem');
            let cantidad = $(this).val();
            if (cantidad > 99) {
                alert('Cantidad Maxima Superada');
            } else {
                $.ajax({
                    url: getUrl() + 'bd/bd_carrito_update.php',
                    type: 'POST',
                    data: {
                        id: id,
                        cantidad: cantidad
                    },
                    success: function (response) {
                        console.log(response);
                        fetchItems();
                    }
                });
            }
        })
    }
    function getUrl() {
        return "http://localhost/biblioteca/"
    }

});
