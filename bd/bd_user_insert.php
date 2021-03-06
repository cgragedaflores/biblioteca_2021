<?php
   include 'bd_connect.php';
   $nombre    = $_POST['u_nombre'];
   $apellido = $_POST['u_apellido'];
   $dni = $_POST['u_nif'];
   $email = $_POST['u_email'];
   $telefono = $_POST['u_telefono'];
   $sql_query = "INSERT into _33_partners(dni,first_name,surname,email,passwd,member_type,phone_number,joined_on,partners_status)
   VALUES('$dni','$nombre','$apellido','$email','','partner','$telefono',NOW(),1)";
   if ($conn -> query($sql_query))die('Agregado correctamente');
   else die('Error en query'.$conn -> error);
?>