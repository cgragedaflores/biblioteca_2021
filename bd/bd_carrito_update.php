<?php
    include 'bd_connect.php';
    session_start();
    if(isset($_POST['id'])){
        $book_id = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        if($_SESSION['usuario']['member_type'] === 'partner'){
            echo $_SESSION['usuario']['member_type'];
            $query = "UPDATE _33_shop_car SET cantidad = '$cantidad' where book_id = '$book_id' and member_type = 'partner' ";
        }else{
            echo $_SESSION['usuario']['member_type'];
            $query = "UPDATE _33_shop_car SET cantidad = '$cantidad' where book_id = '$book_id' and member_type = 'gest' ";
        }        
        if($conn -> query($query))echo 'Cantida Actualizada correctamente';
        else echo 'Query Error '.$conn -> error;
    }else{
        echo 'Los datos no se recibieron correctamente';
    }
?>