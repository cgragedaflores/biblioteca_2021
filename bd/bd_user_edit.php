<?php
header('Content-Type: application/json;');
include 'bd_connect.php';
$json_array = array();
if (isset($_POST['id'])) {
    $user_id = $_POST['id'];
    $query = "SELECT * FROM _33_partners WHERE user_id = '$user_id' ";
    $result = $conn->query($query);
    if (!$result) {
        die('Error en consulta' . $conn->error);
    }
    while ($fila = $result->fetch_assoc()) {
        $json_array[] = array(
            'id_usuario' => $fila['user_id'],
            'profile' => $fila['picture'],
            'nombre' => $fila['first_name'],
            'apellido' => $fila['surname'],
            'email' => $fila['email'],
            'dni' => $fila['dni'],
            'tel' => $fila['phone_number'],
        );
    }
}
echo json_encode($json_array[0]);
?>
