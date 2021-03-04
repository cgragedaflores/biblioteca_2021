$(document).ready(function () {
    console.log('jquery is working');
    fetchItems();
    function fetchItems() {
        $.ajax({
            url: getUrl()+'bd/bd_carrito_select.php',
            type: 'GET',
            success: function (response) {
                $('#container_carrito').html(response);
            }
        });
    }
    $(document).on('click','.add-book-car',function (element) {
        //console.log($(this).data('id'));
        let data = $(this).data('id');
        $.ajax({
            url: getUrl()+'bd/bd_carrito_insert.php',
            type: 'POST',
            data: {data},
            success: function (response) {
                console.log(response);
            }
        });
    })
    function getUrl() {
        return "http://localhost/biblioteca/"
    }
});
