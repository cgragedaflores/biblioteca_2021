$(document).ready(function () {
    //comprueba si se esta editando
    let edicion = false;
    previewImage();
    fetchBook();
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
        let url = edicion === false ?getUrl()+'bd/bd_book_insert.php':getUrl()+'bd/bd_book_update.php';
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                fetchBook();
                $('#add-book-admin').trigger('reset');
            },
            fail: function (response) {
                console.log(response);
            }
        })
    });
    //AJAX DELETE LIBROS;
    $(document).on('click', '.delete-book-btn', function () {
        if (confirm('Desea Eliminar este item')) {
            let item = $(this)[0].parentElement.parentElement;
            let id = $(item).attr('idLibro');
            $.ajax({
                url: getUrl() + 'bd/bd_book_delete.php',
                type: 'POST',
                data: { id },
                success: function (response) {
                    console.log(response);
                    fetchBook();
                },
                fail: function (response) {
                    console.log(response);
                }
            });
        }
    })
    //AJAX UPDATE BOOK
    $(document).on('click', '.book_item', function () {
        let item = $(this)[0].parentElement.parentElement;
        let id = $(item).attr('idLibro');
        $.ajax({
            url: getUrl() + 'bd/bd_book_edit.php',
            type: 'POST',
            data: { id },
            success: function (response) {
                console.log(response);
                const book = JSON.parse(response);
                $('#front-page').attr('src',book.portada);
                $('#b_id').val(book.idLibro);
                $('#b_title').val(book.titulo)
                $('#b_isbn').val(book.isbn)
                $('#b_autor').val(book.autor);
                $('#b_editorial').val(book.editorial);
                $('#b_pDate').val(book.fechaP);
                $('#b_Location').val(book.location);
                $('#b_precio').val(book.precio);
                edicion = true;
                fetchBook();
            },
            fail: function (response) {
                console.log(response);
            }
        });
    })
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
    function fetchBook() {
        let url = getUrl() + 'bd/bd_book_select.php';
        $.ajax({
            url: url,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#container').html(response);
            }
        });
    }
    //preview image
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