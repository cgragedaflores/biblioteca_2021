<?php
include 'bd_connect.php';
$id = $_POST['id'];
$query = "SELECT * FROM _33_reservations where reservation_id = '$id' ";
$result = $conn -> query($query);
$json_array = array();
if ($result->num_rows > 0) {
    while ($fila = $result->fetch_assoc()) {
        $json_array[] = array(
            'idReserva' => $fila['reservation_id'],
            'idLibro' => $fila['book_id'],
            'idUsuario' => $fila['partner_id'],
            'fechaInicio' => $fila['inital_date'],
            'fechaFin' => $fila['return_date'],
            'fechaReal' => $fila['real_return_date'],
        );
    }
    $jsonString = json_encode($json_array[0]);
    echo $jsonString;
} else {
    echo 'carrito vacio';
}
?>