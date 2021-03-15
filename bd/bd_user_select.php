<?php
include 'bd_connect.php';
header('Access-Control-Allow-Origin: *');
if (isset($_POST['search'])) {
    $word = $_POST['search'];
    $query = "SELECT * FROM _33_partners WHERE email LIKE '%$word%' OR first_name LIKE '%$word%' ";
} else {
    $query = "SELECT * FROM _33_partners ORDER BY joined_on DESC limit  5 ";
}
if ($result = $conn->query($query)) {
    $json_array = array();
    if ($result->num_rows > 0) {
        session_start();
        while ($fila = $result->fetch_assoc()) {
            $date = date_create($fila['joined_on']);
            $json_array[] = array(
                'uid' => $fila['user_id'],
                'imagen' => $fila['picture'],
                'nombre' => $fila['first_name'],
                'apellido' => $fila['surname'],
                'email' => $fila['email'],
                'nif' => $fila['dni'],
                'fechaRegistro' => date_format($date, 'l jS F Y'),
                'tipoMiembro' => $fila['member_type'],
            );
        }
        $jsonString = json_encode($json_array);
        echo $jsonString;
    } else {
        die('No se Encotraron Elementos');
    }
} else {
    die('Error de Consulta' . $conn->error);
}
