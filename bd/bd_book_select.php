<?php
include 'bd_connect.php';
if (isset($_POST['search'])) {
    $word = $_POST['search'];
    $query = "SELECT * FROM _33_book WHERE title LIKE '%$word%' OR author LIKE '%$word%' ";
} else {
    $query = "SELECT * FROM _33_book ORDER BY inserted_on DESC limit  5 ";
}
if ($result = $conn->query($query)) {
    $json_array = array();
    
    if ($result->num_rows > 0) {
        session_start();
        while ($fila = $result->fetch_assoc()) {
                $json_array[] = array(
                    'tipoMiembro' => $_SESSION['usuario']['member_type'],
                    'idLibro' => $fila['book_id'],
                    'portada' => $fila['imageName'],
                    'titulo' => $fila['title'],
                    'autor' => $fila['author'],
                    'precio' => $fila['precio']
                );
        }
        $jsonString = json_encode($json_array);
        echo $jsonString;
    } else {
        die('No se Encotraron Elementos');
    }
} else {
    die('Error de Consulta' . $conn->error);
}
