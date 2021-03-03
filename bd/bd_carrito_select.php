<?php
function imprimirCarritoGuest($result)
{
    while ($fila = $result->fetch_assoc()) {
        $portada ="http://localhost/biblioteca/img/splatterbook.svg";
        if (!empty($fila['imageName'])) {
            $portada = $_SERVER['DOCUMENT_ROOT'] . "/biblioteca/img/" . $fila['imageName'];
        }
        $currentbook = $fila['book_id'];
        echo $currentbook;
        ?>
<tr>
    <td>
        <img class="uk-preserve-width uk-border-circle" src="<?php echo $portada; ?>" width="70" alt="">
    </td>
    <td><?php echo $fila['title']; ?></td>
    <td><?php echo $fila['author']; ?></td>
    <td><?php echo $fila['precio']; ?></td>
    <td><input type="number" class='uk-input' value="<?php echo $fila['cantidad']; ?>" max='99' min='1'></td>
    <td><?php echo $fila['subtotal']; ?></td>
    <td>
        <form action="" class="form-book" id="form<?php echo $fila['book_id'];?>">
            <input type="hidden" name="" value='<?php echo $fila['book_id'] ?>'>
            <input type="hidden" name="" value='<?php echo $fila['title'] ?>'>
            <input type="hidden" name="" value='<?php echo $fila['author'] ?>'>
            <input type="hidden" name="" value='<?php echo $fila['user_id'] ?>'>
            <input type="hidden" name="" value='<?php echo $fila['member_type'] ?>'>
            <button class='uk-button uk-button-secondary' type='button' uk-icon='icon:cart'></button>
            <button class='uk-button uk-button-secondary' type='button' uk-icon='icon:trash'></button>
        </form>
    </td>
</tr>
<?php
} //fin while
} //fin function
?>

<?php
include 'bd_connect.php';
$query = "SELECT _33_book.book_id,_33_book.title, _33_book.author, _33_book.precio, _33_shop_car.cantidad, _33_shop_car.user_id, _33_shop_car.member_type,
(_33_book.precio * _33_shop_car.cantidad) as 'subtotal' FROM _33_shop_car INNER JOIN _33_book on _33_shop_car.book_id = _33_book.book_id ";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    imprimirCarritoGuest($result);
}
?>