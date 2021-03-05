<?php
include 'bd_connect.php';
if (isset($_POST['search'])) {
    $word = $_POST['search'];
    $query = "SELECT * FROM _33_book WHERE title LIKE '%$word%' OR author LIKE '%$word%' ";
} else {
    $query = "SELECT * FROM _33_book ORDER BY inserted_on DESC limit  5 ";
}
$result = $conn->query($query);
session_start();
if ($result->num_rows > 0) {
    if(empty($_SESSION)){
        imprimirLibros($result);
    }
    if($_SESSION['usuario']['member_type'] === 'admin'){
        imprimirLibrosAdmi($result);
    }
}
?>
<?php
function imprimirLibros($result)
{
    while ($fila = $result->fetch_assoc()) {
        $portada = "http://localhost/biblioteca/img/splatterbook.svg";
        if (!empty($fila['imageName'])) {
            //descomentar para RemoteHost
            //$portada = $_SERVER['DOCUMENT_ROOT'] . "/biblioteca/img/fron_page/" . $fila['imageName'];
            $portada = "http://localhost/biblioteca/img/front_page/" . $fila['imageName'];
        }
        ?>
<tr idLibro='<?php echo $fila['book_id'] ?>'>
    <td>
        <img class="uk-preserve-width uk-border-circle" src="<?php echo $portada; ?>" width="70" alt="">
    </td>
    <td><a class="uk-button uk-button-text book_item"><?php echo $fila['title']; ?></a></td>
    <td><?php echo $fila['author']; ?></td>
    <td><?php echo $fila['precio']; ?></td>
    <td>
        <button class='uk-button uk-button-secondary add-book-car' type='button' uk-icon='icon:cart'></button>
        <button class='uk-button uk-button-secondary add-book-reserve' type='button' uk-icon='icon:file'></button>
    </td>
</tr>
<?php
} //fin while
} //fin function
?>
<?php
function imprimirLibrosAdmi($result)
{
    while ($fila = $result->fetch_assoc()) {
        $portada = "http://localhost/biblioteca/img/splatterbook.svg";
        if (!empty($fila['imageName'])) {
            //descomentar para RemoteHost
            //$portada = $_SERVER['DOCUMENT_ROOT'] . "/biblioteca/img/fron_page/" . $fila['imageName'];
            $portada = "http://localhost/biblioteca/img/front_page/" . $fila['imageName'];
        }
        ?>
<tr idLibro='<?php echo $fila['book_id'] ?>'>
    <td>
        <img class="uk-preserve-width uk-border-circle" src="<?php echo $portada; ?>" width="70" alt="">
    </td>
    <td><a class="uk-button uk-button-text book_item"><?php echo $fila['title']; ?></a></td>
    <td><?php echo $fila['author']; ?></td>
    <td><?php echo $fila['precio']; ?></td>
    <td>
        <button class='uk-button uk-button-secondary delete-book-btn' type='button' uk-icon='icon:trash'></button>
    </td>
</tr>
<?php
} //fin while
} //fin function
?>