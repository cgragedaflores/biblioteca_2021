<?php
include 'bd_connect.php';

if (isset($_POST['search'])) {
    $word = $_POST['search'];
    $query = "SELECT * FROM _33_book WHERE title LIKE '%$word%' OR author LIKE '%$word%' ";
}else{
    $query = "SELECT * FROM _33_book limit 5 ";
}
$result = $conn->query($query);
if ($result->num_rows > 0) {
    if(empty($_SESSION)){
        session_start();
        imprimirLibroAdmin($result);
    }else{
        imprimirLibroAdmin($result);
    }
    
}
?>
<?php
function imprimirLibroGuest($result)
{
    while ($fila = $result->fetch_assoc()) {
        $portada ="http://localhost/biblioteca/img/splatterbook.svg";
        if (!empty($fila['imageName'])) {
            $portada = $_SERVER['DOCUMENT_ROOT'] . "/biblioteca/img/" . $fila['imageName'];
        }
        $currentBook = $fila['book_id'];
        ?>
<tr >
    <td>
        <img class="uk-preserve-width uk-border-circle" src="<?php echo $portada; ?>" width="70" alt="">
    </td>
    <td><?php echo $fila['title']; ?></td>
    <td><?php echo $fila['author']; ?></td>
    <td><?php echo $fila['precio']; ?></td>
    <td>
        <form action="" id="form-book<?php echo $currentBook?>">
            <input type="hidden" value="<?php echo $currentBook?>" id="book_id">
            <button class='uk-button uk-button-secondary' type='button' uk-icon='icon:cart'></button>
            <button class='uk-button uk-button-secondary' type='button' uk-icon='icon:file'></button>
        </form>
    </td>
</tr>
<?php
} //fin while
} //fin function
?>
<?php
function imprimirLibroAdmin($result)
{
    while ($fila = $result->fetch_assoc()) {
        $portada ="http://localhost/biblioteca/img/splatterbook.svg";
        if (!empty($fila['imageName'])) {
            $portada = $_SERVER['DOCUMENT_ROOT'] . "/biblioteca/img/" . $fila['imageName'];
        }
        $currentBook = $fila['book_id'];
        echo $portada;
        ?>
<tr >
    <td>
        <img class="uk-preserve-width uk-border-circle" src="<?php echo $portada; ?>" width="70" alt="">
    </td>
    <td><?php echo $fila['title']; ?></td>
    <td><?php echo $fila['author']; ?></td>
    <td><?php echo $fila['precio']; ?></td>
    <td>
        <form action="" id="form-book<?php echo $currentBook?>">
            <input type="hidden" value="<?php echo $currentBook?>" id="book_id">
            <button class='uk-button uk-button-secondary' type='button' uk-icon='icon:trash'></button>
        </form>
    </td>
</tr>
<?php
} //fin while
} //fin function
?>
