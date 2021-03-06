<?php
include 'bd_connect.php';
if (isset($_POST['u_id'])) {
    $user_id = $conn -> real_escape_string($_POST['u_id']);
    $nombre = $conn -> real_escape_string($_POST['u_nombre']);
    $apellido = $conn -> real_escape_string($_POST['u_apellido']);
    $dni = $conn -> real_escape_string( $_POST['u_nif']);
    $email = $conn -> real_escape_string($_POST['u_email']);
    $telefono = $conn -> real_escape_string($_POST['u_telefono']);
    $query = "UPDATE _33_partners SET first_name = '$nombre', surname='$apellido', dni = '$dni',
     email = '$email', phone_number = '$telefono' WHERE user_id = '$user_id' ";
    if($conn -> query($query))die('Datos Acutalizados Correctamente');
    else die('Error En query'.$conn -> error);
}else{
    die('Problemas con los datos enviados');
}
?>