<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shababi_caffee";
function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}
try{
        $msg;
        $connection = new mysqli($servername, $username, $password, $database);
        if (!$connection) die("". mysqli_connect_error());
        $msg = "Connected successfully";
}catch(Exception $e){
        $msg = "". $e->getMessage();
}
?>