<?php
include 'bd_connect.php';
if (isset($_POST['b_title'])) {
    $isbn = $_POST["b_isbn"];
    $title = $_POST["b_title"];
    $author = $_POST["b_author"];
    $editorial = $_POST["b_editorial"];
    $location = $_POST["b_Location"];
    $pDate = $_POST["b_pDate"];

    //GUARDAR IMAGEN
    $tipo_imagen = $_FILES['portada']['type'];
    $tamano_imagen = $_FILES['portada']['size'];
    $nombre_imagen = $title;
    $ext = pathinfo($nombre_imagen, PATHINFO_EXTENSION);
    $nombre_imagen = $title . "." . $ext;
    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/biblioteca/img/front_page/';
    rename($_FILES['portada']['tmp_name'], $carpeta_destino . $nombre_imagen);
    //Insert user's on BDþ
    $sql_query = "INSERT INTO _33_book()
    VALUES('0','$isbn','$title','$author','$editorial','$location','$pDate',now(),1,'$nombre_imagen','15')";
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
