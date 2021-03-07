<?php
header('Content-Type: application/json;');
include 'bd_connect.php';
$query = "SELECT _33_reservations.reservation_id, _33_reservations.book_id, _33_reservations.partner_id,_33_reservations.inital_date,
_33_reservations.return_date, _33_reservations.real_return_date,_33_partners.email, _33_book.title
FROM _33_reservations INNER JOIN _33_book on _33_reservations.book_id = _33_book.book_id
INNER JOIN _33_partners on _33_partners.user_id = _33_reservations.partner_id order by reserved_on desc";
if (isset($_POST['search'])) {
    $email =$_POST['search'];
    $query = "SELECT _33_reservations.reservation_id, _33_reservations.book_id, _33_reservations.partner_id,_33_reservations.inital_date,
    _33_reservations.return_date, _33_reservations.real_return_date,_33_partners.email, _33_book.title
    FROM _33_reservations INNER JOIN _33_book on _33_reservations.book_id = _33_book.book_id
    INNER JOIN _33_partners on _33_partners.user_id = _33_reservations.partner_id 
    WHERE _33_reservations.partner_id = _33_partners.user_id and _33_partners.email LIKE '%$email%' order by reserved_on desc";
}
 if(isset($_POST['uid'])){
     $uid = $_POST['uid'];
     $query = "SELECT _33_reservations.reservation_id, _33_reservations.book_id, _33_reservations.partner_id,_33_reservations.inital_date,
     _33_reservations.return_date, _33_reservations.real_return_date,_33_partners.email, _33_book.title
     FROM _33_reservations INNER JOIN _33_book on _33_reservations.book_id = _33_book.book_id
     INNER JOIN _33_partners on _33_partners.user_id = _33_reservations.partner_id 
     WHERE _33_reservations.partner_id = '$uid' order by reserved_on desc"; 
 }
 session_start();
$result = $conn->query($query);
$json_array = array();
if ($result->num_rows > 0) {
    while ($fila = $result->fetch_assoc()) {
        $json_array[] = array(
            'memberType' => $_SESSION['usuario']['member_type'],
            'idReserva' => $fila['reservation_id'],
            'idLibro' => $fila['book_id'],
            'idUsuario' => $fila['partner_id'],
            'fechaInicio' => $fila['inital_date'],
            'fechaFin' => $fila['return_date'],
            'fechaReal' => $fila['real_return_date'],
            'tituloLibro' => $fila['title'],
            'emailUsuario' => $fila['email'],
        );
    }
    ;
    echo json_encode($json_array);
} else {
    echo 'carrito vacio';
}
