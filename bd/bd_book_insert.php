<?php
include('bd_connect_LocalHost.php');
if (isset($_POST['submit'])) {
    $isbn = $_POST["b_isbn"];
    $title = $_POST["b_title"];
    $author = $_POST["b_author"];
    $editorial = $_POST["b_editorial"];
    $location = $_POST["b_location"];
    $pDate = $_POST["b_Pdate"];

    //GUARDAR IMAGEN
    $portada = $_FILES['b_img']['name'];
    $rutaLocal  = $_FILES['b_img']['tmp_name'];
    $destino = "http://localhost/33biblioteca_Local/img/portadas/".$portada;
    move_uploaded_file($rutaLocal,$destino);
    //Insert user's on BD
    $sql_query = "INSERT INTO _33_book()
    VALUES('0','$isbn','$title','$author','$editorial','$location','$pDate',now(),1,'$destino')";
    if ($con -> query($sql_query)) {
        //Success
        echo "datos insertados correctamente";
    } else {
        //Failed
        echo "query error" . mysqli_error($con);
    }

}
?>