<?php

include_once "includess/conniction.php";
$id=$_POST['id'];
echo $id;

$query="DELETE from Managers where id = $id";
$result=mysqli_query($link,$query);
if ($result){
    header('location:show_manager.php');
}