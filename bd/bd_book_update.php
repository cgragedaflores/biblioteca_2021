<?php
include 'bd_connect.php';
if (isset($_POST['b_title'])) {
    $book_ID = $_POST['b_id'];
    echo $book_ID;
    $isbn = $_POST["b_isbn"];
    $title = $_POST["b_title"];
    $author = $_POST["b_author"];
    $editorial = $_POST["b_editorial"];
    $location = $_POST["b_Location"];
    $pDate = $_POST["b_pDate"];
    $precio = $_POST['b_precio'];
    if (!empty($_FILES['portada'])) {
        //guardar imagen
        $tipo_imagen = $_FILES['portada']['type'];
        $tamano_imagen = $_FILES['portada']['size'];
        $nombre_imagen = $title;
        $ext = pathinfo($_FILES['portada']['name'], PATHINFO_EXTENSION);
        $nombre_imagen = $title . "." . $ext;
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/biblioteca/img/front_page/';
        move_uploaded_file($_FILES['portada']['tmp_name'], $carpeta_destino . $nombre_imagen);
        //Insert user's on BDþ
        $sql_query = "UPDATE _33_book SET title = '$title', author = '$author',
        isbn = '$isbn', publication_date = '$pDate', editorial = '$editorial', imageName = '$nombre_imagen', location_id = '$location',
        precio = '$precio' where book_id = '$book_ID' ";
    } else {
        $sql_query = "UPDATE _33_book SET title = '$title', author = '$author',
        isbn = '$isbn', publication_date = '$pDate', editorial = '$editorial', imageName = null, location_id = '$location',
        precio = '$precio' where book_id = '$book_ID' ";
    }
    if ($conn->query($sql_query)) {
        //Success
        echo "datos insertados correctamente";
    } else {
        //Failed
        echo "query error" . mysqli_error($conn);
    }
} else {
    echo 'Problemas al precesar datos';
}
