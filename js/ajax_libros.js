$(document).ready(function () {
    previewImage();
    fetchTasks();
    // AJAX INSERT LIBROS
    $('#add-book').submit(event => {
        event.preventDefault();
        let data = new FormData();
        jQuery.each($('input[type=file]')[0].files, function (i, file) {
            data.append('file-' + i, file);
        });
        let other_data = $('#add-book').serializeArray();
        $.each(other_data, function (key, input) {
            data.append(input.name, input.value);
        });
        $.ajax({
            url: getUrl()+'bd/bd_book_insert.php',
            data: { data },
            processData: false,
            type: 'POST',
            success: function (response) {
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