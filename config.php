<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'huaweiu8500');
define('DB_NAME', 'boombox');

//Pokusaj konekcije ka Mysql bazi//
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Provera konekcije
if($con === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
}else{
    //echo "connected";
}
?>