<?php
include 'bd_connect.php';
if (isset($_POST['id']) && isset($_POST['user_id'])) {
    $book_id = $_POST['id'];
    $user_id = $_POST['user_id'];

    //comprobamos que el libro existe
    $querySelect = "SELECT * FROM _33_shop_car WHERE book_id = $book_id and user_id = '$user_id' ";
    $result = $conn->query($querySelect);
    if ($result->num_rows > 0) {
        //si el libro existe actualizamos la cantidad
        $queryUpdate = "UPDATE _33_shop_car set cantidad = cantidad+1 WHERE book_id = $book_id and user_id = '$user_id' ";
        if ($conn->query($queryUpdate)) {
            echo 'Cantidad Actualizada Correctamente';
        } else {
            echo 'Error en consulta' . $conn->error;
        }
    } else {
        //caso contrario insertamos el nuevo libro
        $query = "INSERT INTO _33_shop_car values('$book_id','$user_id','partner','1')";
        if ($conn->query($query)) {
            echo 'consultada ejecutada correctamente';
        } else {
            echo 'Error en la consulta ' . $conn->error;
        }
    }
} else {
    $book_id = $_POST['id'];
    //comprobamos que el libro existe
    $querySelect = "SELECT * FROM _33_shop_car WHERE book_id = $book_id and member_type = 'guest' ";
    $result = $conn->query($querySelect);
    if ($result->num_rows > 0) {
        //si el libro existe actualizamos la cantidad
        $queryUpdate = "UPDATE _33_shop_car set cantidad = cantidad+1 where book_id = '$book_id' and member_type = 'guest' ";
        if ($conn->query($queryUpdate)) {
            echo 'Cantidad Actualizada Correctamente';
        } else {
            echo 'Error en consulta' . $conn->error;
        }
    } else {
        //caso contrario insertamos el nuevo libro
        $query = "INSERT INTO _33_shop_car values('$book_id',null,'gest','1')";
        if ($conn->query($query)) {
            echo 'consultada ejecutada correctamente';
        } else {
            echo 'Error en la consulta ' . $conn->error;
        }
    }
}
