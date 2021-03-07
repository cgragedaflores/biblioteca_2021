<?php
include 'bd_connect.php';
if (isset($_POST['b_title'])) {
    $isbn = $_POST["b_isbn"];
    $title = $_POST["b_title"];
    $author = $_POST["b_author"];
    $editorial = $_POST["b_editorial"];
    $location = $_POST["b_Location"];
    $pDate = $_POST["b_pDate"];
    $precio = $_POST['b_precio'];
    //GUARDAR IMAGEN
    if (!empty($_FILES['portada'])) {
        $tipo_imagen = $_FILES['portada']['type'];
        $tamano_imagen = $_FILES['portada']['size'];
        $nombre_imagen = $title;
        $ext = pathinfo($_FILES['portada']['name'], PATHINFO_EXTENSION);
        $nombre_imagen = $title . "." . $ext;
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/biblioteca/img/front_page/';
        move_uploaded_file($_FILES['portada']['tmp_name'], $carpeta_destino . $nombre_imagen);
        $sql_query = "INSERT INTO _33_book()
        VALUES('0','$isbn','$title','$author','$editorial','$location','$pDate',now(),1,'$nombre_imagen','$precio')";
    } else {
        $sql_query = "INSERT INTO _33_book()
        VALUES('0','$isbn','$title','$author','$editorial','$location','$pDate',now(),1,'','$precio')";
    }
    //Insert user's on BDþ
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
