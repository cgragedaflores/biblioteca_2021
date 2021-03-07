<?php
include 'bd_connect.php';
if (isset($_POST['id'])) {
    $reserve_id = $_POST['id'];
    //si el libro existe actualizamos la cantidad
    $queryUpdate = "DELETE FROM  _33_reservations WHERE reservation_id = '$reserve_id' ";
    $resultado = $conn->query($queryUpdate);
    if ($resultado) {
        echo 'Libro Eliminado Correctamente';
    } else {
        echo 'Error de consulta ' . $conn->error;
    }

} else {
    echo 'error al recibir los datos';
}
?>