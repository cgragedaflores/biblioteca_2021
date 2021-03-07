<?php
header('Content-Type: application/json;');
include 'bd_connect.php';
$user_id = $_POST['id'];
$query = "DELETE FROM _33_partners where user_id = '$user_id' ";
$result = $conn -> query($query);
if($result)$data = array('success' => 'delete complete','data' => $_POST);
    else $data = array('fail' => $conn -> error,'data' => $_POST);
    echo json_encode($data);
