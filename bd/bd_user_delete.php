<?php
    include 'bd_connect.php';
    $user_id = $_POST['id'];
    $query = "DELETE FROM _33_partners where user_id = '$user_id' ";
    if($conn -> query($query))die('Eliminado correctamente');
    else die('Error consulta'.$conn -> error );
?>