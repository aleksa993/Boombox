<?php
//session_start();

$mysqli = new mysqli('localhost', 'root', 'huaweiu8500', 'boombox') or die(mysqli_error($mysqli));

$id = 0;
$name = '';
$password = '';
$update = false;

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $mysqli->query("INSERT INTO data (name, password) VALUES ('$name','$password')")or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: admin.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: admin.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if (is_iterable($result) == 1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $password = $row['password'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $mysqli->query("UPDATE data SET name='$name', password='$password' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: admin.php');
}