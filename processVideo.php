<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'boombox') or die(mysqli_error($mysqli));

$id = 0;
$name = '';
$location = '';
$update = false;


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM videos WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: admin.php");
}



