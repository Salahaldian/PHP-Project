<?php
include_once 'includess/conniction.php';
$id = $_POST['id'];
$query = "DELETE from store where id = '$id'";
$result = mysqli_query($link, $query);
if ($result) {
    header('Location:store.php');
}

?>
