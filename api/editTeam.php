<?php
include("connection.php");

$id = $_GET['ID'];
$ammount = $_GET['ammount'];
$op = $_GET['op'] == 'add' ? '+' : '-' ;

$do = "points = points $op $ammount";

$sql = "UPDATE teams SET $do WHERE ID = $id";

$result = mysqli_query($connection, $sql);
if ($result) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "error", "message" => "Failed to insert data"));
}
?>