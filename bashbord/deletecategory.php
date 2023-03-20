<?php
include_once 'includess/conniction.php';
$id = $_POST['id'];
$query = "DELETE from categories where id = $id";
$result = mysqli_query($link, $query);
if ($result) {
    header('Location:cateygories.php');
}else{
include_once 'erorr.php';
}

?>