<?php
    include 'bd_connect.php';
    if(isset($_POST['login'])){
        $email = $_POST['u_email'];
        $password = $_POST['u_password'];
        echo $email, $password;
        $query = "SELECT * FROM _33_partners WHERE email = '$email' and passwd = '$password' ";
        $result = $conn -> query($query);
        if($result -> num_rows > 0){
            session_start();
            $array = $result -> fetch_assoc();
            echo $array['member_type'];
            $_SESSION['usuario'] = array();
            $_SESSION['usuario']['user_id']        = $array['user_id'];      
            $_SESSION['usuario']['dni']            = $array['dni'];      
            $_SESSION['usuario']['name']           = $array['first_name'];
            $_SESSION['usuario']['surname']        = $array['surname'];
            $_SESSION['usuario']['email']          = $array['email'];
            $_SESSION['usuario']['password']       = $array['password'];
            $_SESSION['usuario']['member_type']    = $array['member_type']; 
            $_SESSION['usuario']['phone_number']   = $array['phone_number'];
            $_SESSION['usuario']['joined_on']      = $array['joined_on'];
            $_SESSION['usuario']['partner_status'] = $array['partners_status'];
            $_SESSION['usuario']['address']        = $array['adress'];
            $_SESSION['usuario']['picture']        = $array['picture'];
            if($array['member_type'] === 'partner'){
                // header('Location: http://localhost/biblioteca/partner/index.php');
                
                header('Location: https://remotehost.es/student33/dwes/partner/index.php');
            }else if($array['member_type'] === 'admin'){
                // header('Location: http://localhost/biblioteca/admin/index.php');
                
                header('Location: https://remotehost.es/student33/dwes/admin/index.php');
            }

        }else{
            die('Usuario y Contraseña no encontrados');
        }
    }else{
        echo 'no se ha podido procesar correctamente';
    }
?>