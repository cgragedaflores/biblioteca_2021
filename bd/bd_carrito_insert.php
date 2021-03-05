<?php
include 'bd_connect.php';
if (isset($_POST['id'])) {
    $book_id = $_POST['id'];
    //comprobamos que el libro existe
    $querySelect = "SELECT * FROM _33_shop_car WHERE book_id = $book_id ";
    $result = $conn->query($querySelect);
    if ($result->num_rows > 0) {
        echo 'el libro existe';
        //si el libro existe actualizamos la cantidad
        $queryUpdate = "UPDATE _33_shop_car set cantidad = cantidad+1 where book_id = '$book_id' ";
        if($conn -> query($queryUpdate)){
            echo 'Cantidad Actualizada Correctamente';
        }else{
            echo 'Error en consulta'.$conn -> error;
        }
    } else {
        echo 'el libro no existe';
        //caso contrario insertamos el nuevo libro
        $query = "INSERT INTO _33_shop_car values('$book_id',null,'gest','1')";
        if ($conn->query($query)) {
            echo 'consultada ejecutada correctamente';
        } else {
            echo 'Error en la consulta ' . $conn->error;
        }
    }
} else {
    echo 'error nose ha recibido ningun dato';
}
