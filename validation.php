<?php

session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'boombox');

$name = $_POST['name'];
$pass = $_POST['password'];

$s = " select * from data where name = '$name' && password = '$pass'";


$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $pass;

    header('location:home.php');
}
else{
    $_SESSION['errMsg'] = "Uneli ste pogresne podatke ili niste registrovani.";
    header('location:login.php?=error2');
    
}//header("Location: login.php?=diff_error");


?>
