<?php
include 'bd_connect.php';
if(isset($_POST['r_uid'])){
    $uid = $_POST['r_uid'];
    $bid = $_POST['b_bid'];
    $startDate = $_POST['r_devolucion'];
    $finalDate = $_POST['r_devuelto'];
    $realDate = $_POST['r_rdevolucion'];
    $query = "INSERT INTO _33_reservations value('$uid','$bid','$startDate','$finalDate','$realDate',now())";
    if($conn -> query($query))die('Consulta Ejecutada correctamente');
    else die('Erro en consulta '.$conn -> error);
}else die('No se recibieron los datos');
?>