<?php
    include 'bd_connect.php';
    if(isset($_POST['id'])){
        $book_id = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $query = "UPDATE _33_shop_car SET cantidad = '$cantidad' where book_id = '$book_id' ";
        if($conn -> query($query))echo 'Cantida Actualizada correctamente';
        else echo 'Query Error '.$conn -> error;
    }else{
        echo 'Los datos no se recibieron correctamente';
    }
?>