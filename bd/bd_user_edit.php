<?php
include 'bd_connect.php';
    $user_id = $_POST['id'];
    $query = "SELECT * FROM _33_partners WHERE user_id = '$user_id' ";
    $result = $conn->query($query);
    if (!$result) {
        die('Error en consulta' . $conn->error);
    }
    $json_array = array();
    while ($fila = $result->fetch_assoc()) {
        $profile = 'user.png';
        if (!$fila['picture'] === '') {
            $profile = 'profile_Images' . $fila['picture'];
        }
        $json_array[] = array(
            'id_usuario' => $fila['user_id'],
            'profile' => $profile,
            'nombre' => $fila['first_name'],
            'apellido' => $fila['surname'],
            'email' => $fila['email'],
            'dni' => $fila['dni'],
            'tel' => $fila['phone_number']
        );
    }
    $jsonString = json_encode($json_array[0]);
    echo $jsonString;
?>
