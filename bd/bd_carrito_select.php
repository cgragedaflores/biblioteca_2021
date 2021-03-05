<?php
header('Content-Type: application/json;');
include 'bd_connect.php';
$query = "SELECT _33_book.book_id,_33_book.title, _33_book.author,_33_book.imageName, _33_book.precio, _33_shop_car.cantidad, _33_shop_car.user_id, _33_shop_car.member_type,
(_33_book.precio * _33_shop_car.cantidad) as 'subtotal' FROM _33_shop_car INNER JOIN _33_book on _33_shop_car.book_id = _33_book.book_id ";
$result = $conn->query($query);
$json_array = array();
if ($result-> num_rows > 0) {
    while($fila = $result -> fetch_assoc()){
        $portada = 'splatterbook.svg';
        if(!$fila['imageName'] === ''){
            $portada = 'front_page'.$fila['imageName'];
        }
        $json_array[] = array(
            'idLibro'     => $fila['book_id'],
            'portada'     => $portada,
            'titulo'      => $fila['title'],
            'autor'       => $fila['author'],
            'precio'      => $fila['precio'],
            'cantidad'    => $fila['cantidad'],
            'idUsuario'   => $fila['user_id'],
            'tipoMiembro' => $fila['member_type'],
            'subtotal'    => $fila['subtotal']
        );
    }
    $jsonString = json_encode($json_array);
    echo $jsonString;
    }else{
        echo 'carrito vacio';
    }
?>