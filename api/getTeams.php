
<?php
    include("connection.php");
    
    $sql = "SELECT * FROM teams";

    $result = mysqli_query($connection, $sql);
    $teams = $result->fetch_all(MYSQLI_ASSOC);
    
    if ($result) {
        echo json_encode(array("status" => "success" , "teams" => $teams));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to insert data"));
    }
?>

