<?php
include("connection.php");

$number = $_GET['number'];
$name = $_GET['name'];
$color = $_GET['color'];
$points = 0;

$sql = "INSERT INTO teams (number, name, color, points) VALUES ($number, '$name', '$color', $points)";
$result = mysqli_query($connection, $sql);
if ($result) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "error", "message" => "Failed to insert data"));
}

?>
