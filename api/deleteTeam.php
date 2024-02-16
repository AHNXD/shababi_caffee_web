<?php
    include("connection.php");

    $id = $_GET['ID'];

    $sql = "DELETE FROM teams WHERE ID = $id";

    $result = mysqli_query ($connection,$sql);

    if ($result) {
        $count = mysqli_affected_rows($connection);
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Failed to delete data"));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to delete data"));
    }
?>