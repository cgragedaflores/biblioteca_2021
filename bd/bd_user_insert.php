<?php
    include 'bd_connect.php';
    if(isset($_POST['u_register'])){
        $email = $_POST['u_email'];
        $password = $_POST['u_passwd'];
        $nif = $_POST['u_nif'];
        $name = $_POST['u_name'];
        $sql_query = "INSERT INTO _33_partners(dni,first_name,email,passwd,member_type,joined_on,partners_status)
        VALUES('$nif','$name','$email','$password','partner',NOW(),1)";
        if($conn -> query($sql_query)){
            echo 'insertado correctamente';
            header('Location: http://localhost/biblioteca/index.php');
        }else{
            die('Error consulta '.$conn -> error);
        }
        
    }
?>