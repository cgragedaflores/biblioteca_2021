<?php
    include 'bd_connect.php';
    $book_id = $_POST['id'];
    $query = "SELECT * FROM _33_book WHERE book_id = '$book_id' ";
    $result = $conn -> query($query);
    if(!$result)die('Error en consulta'.$conn -> error);
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
            'editorial'   => $fila['editorial'],
            'isbn'        => $fila['isbn'],
            'fechaP'      => $fila['publication_date'],
            'location'    => $fila['location_id'],
            'precio'      => $fila['precio']
        );
    }
    $jsonString = json_encode($json_array[0]);
    echo $jsonString;
?>