$(document).ready(function () {
    fetchItems();
    function fetchItems() {
        $.ajax({
            url: 'bd/bd_carrito_select.php',
            type: 'GET',
            success: function (response) {
                $('#container_carrito').html(response);
            }
        });
    }
    function updateItems(){
    }
});