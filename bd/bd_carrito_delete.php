<?php
include 'bd_connect.php';
if (isset($_POST['id'])) {
    $book_id = $_POST['id'];
    //si el libro existe actualizamos la cantidad
    $queryUpdate = "DELETE FROM  _33_shop_car WHERE book_id = '$book_id' ";
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