$(document).ready(function () {
    previewImage();
    fetchTasks();
    // AJAX INSERT LIBROS
    $('#add-book-admin').submit(event => {
        event.preventDefault();
        let data = new FormData();
        let file = $('#book_file')[0].files[0];
        console.log(file);
        data.append('portada', file);
        let other_data = $('#add-book-admin').serializeArray();
        $.each(other_data, function (key, input) {
            data.append(input.name, input.value);
        });
        for (let key of data.entries()) {
            console.log(key[0] + ' ' + key[1]);

        };
        $.ajax({
            url: getUrl() + 'bd/bd_book_insert.php',
            data: data,
            type: 'POST',
            processData: false,
            contentType: false,
            cache:false,
            success: function (response) {
                console.log(response);
            },
            fail: function(response) {
                console.log(response);
            }
        })

    });
    // AJAX SELECT LIBROS
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
        let url = getUrl() + 'bd/bd_book_select.php';
        $.ajax({
            url: url,
            type: 'POST',
            success: function (response) {
                $('#container').html(response);
            }
        });
    }
    //Reservar
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
    function getUrl() {
        return "http://localhost/biblioteca/"
    }
});