<?php
include 'bd_connect.php';
$nombre = $_POST['u_nombre'];
$apellido = $_POST['u_apellido'];
$dni = $_POST['u_nif'];
$email = $_POST['u_email'];
$telefono = $_POST['u_telefono'];
if (!empty($_FILES['picture'])) {
    $tipo_imagen = $_FILES['picture']['type'];
    $tamano_imagen = $_FILES['picture']['size'];
    $nombre_imagen = $nombre;
    $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    $nombre_imagen = $nombre . "." . $ext;
    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/biblioteca/img/profile_img/';
    move_uploaded_file($_FILES['picture']['tmp_name'], $carpeta_destino . $nombre_imagen);
    $sql_query = "INSERT into _33_partners(dni,first_name,surname,email,passwd,member_type,phone_number,joined_on,partners_status,picture)
   VALUES('$dni','$nombre','$apellido','$email','','partner','$telefono',NOW(),1,'$nombre_imagen')";
} else {
    $sql_query = "INSERT into _33_partners(dni,first_name,surname,email,passwd,member_type,phone_number,joined_on,partners_status)
   VALUES('$dni','$nombre','$apellido','$email','','partner','$telefono',NOW(),1)";
}
if ($conn->query($sql_query)) {
    die('Agregado correctamente');
} else {
    die('Error en query' . $conn->error);
}
