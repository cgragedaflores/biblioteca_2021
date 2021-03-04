<?php
include('bd_connect.php');
if (isset($_POST['submit'])) {
    $isbn = $_POST["b_isbn"];
    $title = $_POST["b_title"];
    $author = $_POST["b_author"];
    $editorial = $_POST["b_editorial"];
    $location = $_POST["b_location"];
    $pDate = $_POST["b_Pdate"];

    //GUARDAR IMAGEN
    $tipo_imagen = $_FILES['front_page']['type'];
    $tamano_imagen = $_FILES['front_page']['size'];
    $ext = pathinfo($nombre_imagen, PATHINFO_EXTENSION);
    $nombre_imagen = $title.".".$ext;
    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/biblioteca/img/front_page/';
    move_uploaded_file($_FILES['front_page']['tmp_name'], $carpeta_destino.$nombre_imagen);
    //Insert user's on BD
    $sql_query = "INSERT INTO _33_book()
    VALUES('0','$isbn','$title','$author','$editorial','$location','$pDate',now(),1,'$nombre_imagen','15')";
    if ($conn -> query($sql_query)) {
        //Success
        echo "datos insertados correctamente";
    } else {
        //Failed
        echo "query error" . mysqli_error($conn);
    }

}else{
    echo 'Problemas al precesar datos';
}
?>