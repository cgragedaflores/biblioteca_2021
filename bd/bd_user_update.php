<?php
header('Content-Type: application/json;');
include 'bd_connect.php';
if (isset($_POST['u_id'])) {
    $user_id = $conn->real_escape_string($_POST['u_id']);
    $nombre = $conn->real_escape_string($_POST['u_nombre']);
    $apellido = $conn->real_escape_string($_POST['u_apellido']);
    $dni = $conn->real_escape_string($_POST['u_nif']);
    $email = $conn->real_escape_string($_POST['u_email']);
    $telefono = $conn->real_escape_string($_POST['u_telefono']);
    if (!empty($_FILES['picture'])) {
        $tipo_imagen = $_FILES['picture']['type'];
        $tamano_imagen = $_FILES['picture']['size'];
        $nombre_imagen = $nombre;
        $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        $nombre_imagen = $nombre . "." . $ext;
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/dwes/img';
        move_uploaded_file($_FILES['picture']['tmp_name'], $carpeta_destino.'/profile_img/',$nombre_imagen);
        $query = "UPDATE _33_partners SET first_name = '$nombre', surname='$apellido', dni = '$dni',
     email = '$email', phone_number = '$telefono', picture = '$nombre_imagen' WHERE user_id = '$user_id' ";
    } else {
        $query = "UPDATE _33_partners SET first_name = '$nombre', surname='$apellido', dni = '$dni',
     email = '$email', phone_number = '$telefono' WHERE user_id = '$user_id' ";
    }
    if ($result = $conn->query($query)) {
        $data = array('success' => 'update complete', 'data' => $_POST);
    } else {
        $data = array('fail' => $conn->error, 'data' => $_POST);
    }

    echo json_encode($data);    
}
