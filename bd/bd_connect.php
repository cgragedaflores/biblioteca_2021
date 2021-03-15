<?php
// $servername = "localhost";
// $database = "_33_biblioteca";
// $username = "developer";
// $password = "root";
 $servername = "remotehost.es";
 $database = "dweslibrary";
 $username = "dwes1234";
 $password = "test1234.";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>