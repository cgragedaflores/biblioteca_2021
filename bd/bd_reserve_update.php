<?php
header('Content-Type: application/json;');
include 'bd_connect.php';
if(isset($_POST['r_uid'])){
    $r_id = $_POST['r_id'];
    $uid = $_POST['r_uid'];
    $bid = $_POST['r_bid'];
    $startDate = $_POST['r_devolucion'];
    $finalDate = $_POST['r_devuelto'];
    $realDate = $_POST['r_rdevolucion'];
    $query = "UPDATE _33_reservations SET inital_date = '$startDate', book_id = '$bid', partner_id = '$uid',
    return_date = '$finalDate', real_return_date = '$realDate', reserved_on = now() where reservation_id = '$r_id' ";
    $result = $conn -> query($query);
    if($result)$data = array('success' => 'update complete','data' => $_POST);
    else $data = array('fail' => $conn -> error,'data' => $_POST);
    echo json_encode($data);
}else die('No se recibieron los datos');
?>