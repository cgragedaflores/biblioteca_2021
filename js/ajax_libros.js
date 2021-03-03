$(document).ready(function () {
    function getUrl() {
        return "http://localhost/biblioteca/"
    }
    fetchTasks();
    $('#search').keyup(function () {
        let url = getUrl() + 'bd/bd_book_select.php';
        if ($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: url,
                data: { search },
                type: 'POST',
                success: function (response) {
                    $('#container').html(response);
                }
            })
        }
    });
    function fetchTasks() {
        let url = getUrl() +  'bd/bd_book_select.php';
        $.ajax({
            url: url,
            type: 'POST',
            success: function (response) {
                $('#container').html(response);
            }
        });
    }
});