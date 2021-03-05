<?php
    include 'bd_connect.php';
    if (isset($_POST['id'])) {
        $book_id = $_POST['id'];
        $query = "DELETE FROM _33_book where book_id = '$book_id' ";
        if($conn -> query($query)){
            die('Consulta Ejecutada Correctamente');
        }else{
            die('Error consulta '.$conn -> error);
        }
    }else{
        echo 'Problemas al recebir los datos';
    }
?>