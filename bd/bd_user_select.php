<?php
include 'bd_connect.php';
if (isset($_POST['search-user'])) {
    $word = $_POST['search-user'];
    $query = "SELECT * FROM _33_partners WHERE email LIKE '%$word%' OR first_name LIKE '%$word%' ";
} else {
    $query = "SELECT * FROM _33_partners ORDER BY joined_on DESC limit  5 ";
}
$result = $conn->query($query);
session_start();
if ($result->num_rows > 0) {
    imprimirUsuarios($result);
}
?>
<?php
function imprimirUsuarios($result)
{
    while ($fila = $result->fetch_assoc()) {
        $portada = "http://localhost/biblioteca/img/user.png";
        if (!empty($fila['picture'])) {
            //descomentar para RemoteHost
            //$portada = $_SERVER['DOCUMENT_ROOT'] . "/biblioteca/img/fron_page/" . $fila['imageName'];
            $portada = "http://localhost/biblioteca/img/front_page/" . $fila['picture'];

        }
        $date = date_create($fila['joined_on']);
        ?>
<tr idUsuario='<?php echo $fila['user_id'] ?>'>
    <td>
        <img class="uk-preserve-width uk-border-circle" src="<?php echo $portada; ?>" width="50" alt="">
    </td>
    <td><?php echo $fila['first_name']; ?></td>
    <td class="uk-text-truncate"><a class="uk-button uk-button-text user_item"><?php echo $fila['email']; ?></a></td>
    <td><?php echo $fila['member_type']; ?></td>
    <td><?php echo date_format($date, 'l jS F Y'); ?></td>
    <td>
        <button class='uk-button uk-button-secondary delete-user-btn' type='button' uk-icon='icon:trash'></button>
    </td>
</tr>
<?php
} //fin while
} //fin function
?>